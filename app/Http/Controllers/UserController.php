<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Log;
use App\Models\User;
use App\Models\UserShip;
use File;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    public function index(Request $rq)
    {
        $numpage = 10;
        $breadcrumb = [
            ['link' => '/', 'name' => __('Home')],
            ['link' => 'javascript:void()', 'name' => __('Accounts')],
        ];
        if ($rq->ajax()) {
            $rq->pagenum ? $numpage = $rq->pagenum : $numpage;
            if ($rq->search) {
                $users = User::where('name', 'like', '%' . $rq->search . '%')
                    ->orwhere('user_name', 'like', '%' . $rq->search . '%')
                    ->orwhere('email', 'like', '%' . $rq->search . '%')->orderBy('id')->paginate($numpage);
            } else {
                $users = User::orderBy('id', 'desc')->paginate($numpage);
            }
            return view('pages.users.ajax-filter')->with('users', $users)->render();
        } else {
            $users = User::orderBy('id', 'desc')->paginate($numpage);
            return view('pages.users.index', compact('users', 'breadcrumb'));
        }
    }

    public function add()
    {
        $breadcrumb = [
            ['link' => '/', 'name' => __('Home')],
            ['link' => route('index-users'), 'name' => __('Accounts')],
            ['link' => 'javascript:void()', 'name' => __('Add Account')]
        ];
        return view('pages.users.add', compact('breadcrumb'));
    }

    public function saveAdd(Request $rq)
    {
        $rules = [
            'fullname' => 'required|min:3|max:20',
            'username' => 'required|min:3|max:30|unique:users,user_name',
            'email' => 'required|email|unique:users,email',
            'status' => 'required',
            'role' => 'required',
            'password' => 'required|min:5|max:40'
        ];
        $messages = Helpers::switchLanguage(session()->get('locale'));
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()) {
            $path = '';
            if ($rq->hasFile('photo')) {
                $path = $rq->photo->store('admin/users', 'public');
            }
            $user = new User();
            $user->name = $rq->fullname;
            $user->user_name = $rq->username;
            $user->email = $rq->email;
            $user->password = Hash::make($rq->password);
            $user->role = $rq->role;
            $user->status = $rq->status;
            $user->photo = $path;
            $user->save();
            Log::pushLog('Add Accounts ID: ' . $user->id);
            return response()->json([
                "type" => 'insert',
                'success' => true,
                'message' => __('Add') . ' ' . __('Accounts') . ' ' . __('success') . ' !'
            ]);
        } else {
            return response()->json([
                'type' => 'insert',
                'success' => false,
                'messages' => $check->errors(),
                'message' => __('Add') . ' ' . __('Accounts') . ' ' . __('error') . ' !'
            ]);
        }
    }

    public function update($id)
    {
        if ($id) {
            $breadcrumb = [
                ['link' => '/', 'name' => __('Home')],
                ['link' => route('index-users'), 'name' => __('Accounts')],
                ['link' => 'javascript:void()', 'name' => __('Update Account')]
            ];
            $user = User::find($id);
            return view('pages.users.edit', compact('user', 'breadcrumb'));
        }
    }

    public function saveUpdate(Request $rq)
    {
        $rules = [
            'fullname' => 'required|min:3|max:20',
            'username' => 'required|min:3|max:30|unique:users,user_name,' . $rq->id . ',id',
            'email' => 'required|email|unique:users,email,' . $rq->id . ',id',
            'status' => 'required',
            'password' => 'nullable|min:5|max:40'
        ];
        $messages = Helpers::switchLanguage(session()->get('locale'));
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()) {
            $user = User::find($rq->id);
            if ($rq->hasFile('photo')) {
                $path = $rq->photo->store('admin/users', 'public');
                @unlink(public_path('storage/' . $user->photo));
                $user->photo = $path;
            }
            $user->name = $rq->fullname;
            $user->user_name = $rq->username;
            $user->email = $rq->email;
            if ($rq->password != null) {
                $user->password = Hash::make($rq->password);
            }
            if (isset($rq->role)) {
                $user->role = $rq->role;
            }
            $user->status = $rq->status;
            $user->save();
            Log::pushLog('Update Accounts ID: ' . $user->id);
            return response()->json([
                "type" => 'update',
                'success' => true,
                'message' => __('Update') . ' ' . __('Accounts') . ' ' . __('success') . ' !'
            ]);
        } else {
            return response()->json([
                'type' => 'update',
                'success' => false,
                'messages' => $check->errors(),
                'message' => __('Update') . ' ' . __('Accounts') . ' ' . __('error') . ' !'
            ]);
        }
    }

    public function profile($id)
    {
        $breadcrumb = [
            ['link' => '/', 'name' => __('Home')],
            ['link' => route('index-users'), 'name' => __('Accounts')],
            ['link' => 'javascript:void()', 'name' => __('Profile')]
        ];
        $user = User::find($id);
        return view('pages.users.profile', compact('user', 'breadcrumb'));
    }

    public function changePassword(Request $rq)
    {
        $rules = [
            'password' => 'required',
            'new_password' => 'required|min:6|max:50',
            'confirm_new_password' => 'required|same:new_password'
        ];
        $messages = Helpers::switchLanguage('vi');
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()) {
            $user = User::find($rq->id);
            if (Hash::check($rq->password, $user->password)) {
                $user->password = Hash::make($rq->new_password);
                $user->save();
                return response()->json([
                    "type" => 'update',
                    'success' => true,
                    'message' => __('Update') . ' ' . __('Password') . ' ' . __('success') . ' !'
                ]);
            } else {
                return response()->json([
                    'type' => 'update',
                    'success' => false,
                    'errorpassword' => __('Incorrect password !')
                ]);
            }
        } else {
            return response()->json([
                'type' => 'update',
                'success' => false,
                'messages' => $check->errors(),
                'message' => __('Update') . ' ' . __('Password') . ' ' . __('error') . ' !'
            ]);
        }
    }

    public function saveImageUser(Request $rq)
    {
        $rules = ['photo' => 'required'];
        $messages = Helpers::switchLanguage('vi');
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()) {
            $user = User::find($rq->id);
            if ($rq->hasFile('photo')) {
                $path = $rq->photo->store('admin/users', 'public');
                @unlink(public_path('storage/' . $user->photo));
                $user->photo = $path;
            }
            $user->save();
            return response()->json([
                "type" => 'update',
                'success' => true,
                'message' => __('Update') . ' ' . __('Photo') . ' ' . __('success') . ' !'
            ]);
        } else {
            return response()->json([
                'type' => 'update',
                'success' => false,
                'messages' => $check->errors(),
                'message' => __('Update') . ' ' . __('Photo') . ' ' . __('error') . ' !'
            ]);
        }
    }

    public function delete(Request $rq, $id)
    {
        if ($id) {
            $currentPage = (int)$rq->page;
            $user = User::find($id);
            @unlink(public_path('storage/' . $user->photo));
            $user->delete();
            Log::pushLog('Delete Accounts ID: ' . $id);
            $getTatalPage = User::orderBy('id')->paginate($rq->pagenum)->lastPage();
            if ($rq->search != '') {
                $getTatalPage = User::where('name', 'like', '%' . $rq->search . '%')
                    ->orwhere('user_name', 'like', '%' . $rq->search . '%')
                    ->orwhere('email', 'like', '%' . $rq->search . '%')->orderBy('id')->paginate($rq->pagenum)->lastPage();
                if ($currentPage > $getTatalPage - 1) {
                    Paginator::currentPageResolver(function () use ($getTatalPage) {
                        return $getTatalPage;
                    });
                }
                $users = User::where('name', 'like', '%' . $rq->search . '%')
                    ->orwhere('user_name', 'like', '%' . $rq->search . '%')
                    ->orwhere('email', 'like', '%' . $rq->search . '%')->orderBy('id', 'desc')->paginate($rq->pagenum);
            } else {
                if ($currentPage > $getTatalPage - 1) {
                    Paginator::currentPageResolver(function () use ($getTatalPage) {
                        return $getTatalPage;
                    });
                }
                $users = User::orderBy('id', 'desc')->paginate($rq->pagenum);
            }
            return response()->json([
                'success' => true,
                'message' => __('Delete') . ' ' . __('Accounts') . ' ID ' . $id . ' ' . __('success') . ' !',
                'messages' => view('pages.users.ajax-filter')->with('users', $users)->render()
            ]);
        }
    }

    public function switchAjax($id)
    {
        $user = User::find($id);
        if ($user->status == 0) {
            $user->status = 1;
        } else {
            $user->status = 0;
        }
        $user->save();
        Log::pushLog('Update Accounts ID: ' . $id);
        return response()->json([
            'np_' => $user->status,
            'message' => __('Update') . ' ' . __('Status') . ' ' . __('success') . ' !'
        ]);
    }

    public function userProfile()
    {
        $user = User::find(Auth::user()->id);
        $shipto = UserShip::where('user_id', Auth::user()->id)->where('is_default', 1)->first();
        return view('pages-front.users.profile', compact('user', 'shipto'));
    }

    public function userProfileImg(Request $rq)
    {
        $user = User::find(Auth::user()->id);
        if ($rq->hasFile('file')) {
            $path = $rq->file->store('admin/users', 'public');
            @unlink(public_path('storage/' . $user->photo));
            $user->photo = $path;
        }
        $user->save();
        return redirect()->back()->with('msg', __('Update photo success'));
    }

    public function userProfileInfo(Request $rq)
    {
        $user = User::find(Auth::user()->id);
        $userShip = UserShip::where('user_id', $user->id)->where('is_default', 1)->first();
        $userShip->address = $rq->shipto;
        $userShip->save();
        $user->name = $rq->name;
        $user->phone = $rq->phone;
        $user->country = $rq->country;
        $user->address = $rq->address;
        $user->address2 = $rq->address2;
        $user->save();
        return redirect()->back()->with('msg', __('Update profile success'));
    }

    public function userProfileChangePassword(Request $rq){
        $rules = [
            'password' => 'required',
            'new_password' => 'required|min:6|max:50',
            'confirm_new_password' => 'required|same:new_password'
        ];
        $messages = Helpers::switchLanguage('vi');
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()) {
            $user = User::find(Auth::user()->id);
            if (Hash::check($rq->password, $user->password)) {
                $user->password = Hash::make($rq->new_password);
                $user->save();
                return redirect()->back()->with('msg', __('Change password successfully !'))->with('msg-r', true);
            }
            else return redirect()->back()->with('msg-err', __('Incorrect password !'))->with('msg-r', true);
        }
        else{
            return redirect()->back()->withErrors($check)->withInput()->with('msg-r', true);
        }
    }
}
