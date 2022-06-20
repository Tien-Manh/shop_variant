<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class AuthController extends Controller
{
    public function login(){
        if (Auth::user() == true && Auth::user()->role <= 2 && Auth::user()->status == 1){
            if (redirect()->back()->getTargetUrl() == route('login')){
                return redirect()->route('admin.cp');
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return view('pages.auths.login');
        }
    }

    public  function userLogin(){
        if (Auth::user() == true){
            if (redirect()->back()->getTargetUrl() == route('user.login')){
                return redirect()->route('home');
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return view('pages-front.users.login');
        }
    }
    public function userPostLogin(Request $rq){
        if (Auth::attempt(['email' => $rq->login_email, 'password' => $rq->login_password], $rq->remember)
            || Auth::attempt(['user_name' => $rq->login_email, 'password' => $rq->login_password], $rq->remember)
        ){
            if (Auth::user()->status == 0){
                Auth::logout();
                return redirect()->route('user.login')->with('msg_login', __('Your account has been locked !'));
            }
            else{
                return redirect()->route('home');
            }
        }
        elseif ($rq->login_email == '' || $rq->login_password == ''){
            return redirect()->back()->with('msg_login', __('No account or password entered !'));
        }
        else{
            return redirect()->route('user.login')->with('msg_login', __('Wrong username or password !'));
        }
    }

    public function postLogin(Request $rq){
       if (Auth::attempt(['email' => $rq->login_email, 'password' => $rq->login_password, 'role'=> [0,1,2]], $rq->remember)
       || Auth::attempt(['user_name' => $rq->login_email, 'password' => $rq->login_password, 'role'=> [0,1,2]], $rq->remember)
       ){
           if (Auth::user()->status == 0){
               Auth::logout();
               return redirect()->route('login')->with('msg_login', __('Your account has been locked !'));
           }
           else{
               return redirect()->route('admin.cp');
           }
       }
       elseif ($rq->login_email == '' || $rq->login_password == ''){
           return redirect()->back()->with('msg_login', __('No account or password entered !'));
       }
       else{
           return redirect()->route('login')->with('msg_login', __('Wrong username or password !'));
       }
    }
    public function logout(){
        $isMember = false;
        if (Auth::user()->role >=3){
            $isMember = true;
        }
        Auth::logout();
        if ($isMember){
            return redirect()->route('home');
        }
        else{
            return redirect()->route('login');
        }
    }

    public function rsPassword(){
        return view('pages.auths.reset');
    }
    public function rsPasswordUser(){
        return view('pages-front.user.reset');
    }
    public function postRsPassword(Request $rq){
        $rule = [
            'forgot_email' => 'required|email'
        ];
        $messages = Helpers::switchLanguage(session()->get('locale'));
        $check = Validator::make($rq->all(), $rule, $messages);
        if ($check->passes()){
            $email = $rq->forgot_email;
            $user = User::where('email', $email)->first();
            if (!$user){
                return redirect()->back()->with('msg_rs', __('A link has been sent to your email. Please access your email') . ' !');
            }
            PasswordReset::where('email', $email)->delete();
            $token = sha1(Str::random(40) . uniqid());
            $now = Carbon::now();
            $newEmail = new PasswordReset();
            $newEmail->email = $email;
            $newEmail->token = $token;
            $newEmail->created_at = $now;
            $newEmail->save();
            $url = route('rs-token', [$token]);
            Mail::send('pages.auths.sendmail', compact('url', 'user'), function ($message) use ($user){
                $message->to($user->email, $user->name);
                $message->subject(__('Request a password reset'));
            });
            return redirect()->back()->with('msg_rs', __('A link has been sent to your email. Please access your email') . ' !');
        }
        else{
            return redirect()->back()->withErrors($check);
        }
    }
    public function rsToken($token){
        $pwToken = PasswordReset::where('token', $token)->first();
//        if (!$pwToken){
//            $msg_rs = 'Đường đẫn không tồn tại !';
//            return view('pages.auths.errors', compact('msg_rs'));
//        }
//        $day = Carbon::createFromFormat('Y-m-d H:i:s', $pwToken->created_at);
//        $now = Carbon::now();
//        $dif = $now->diffInHours($day);
//        if ($dif >= 24){
//            PasswordReset::where('token', $token)->delete();
//            return view('pages.auths.errors')->with('msg_rs', 'Link đã hết hạn !');
//        }
        return view('pages.auths.form-rspassword', compact('token'));
    }
    public function rsPwd(Request $rq){
        $pwToken = PasswordReset::where('token', $rq->token)->first();
        if (!$pwToken){
            $msg_rs = 'Link đã hết hạn !';
            return view('pages.auths.errors', compact('msg_rs'));
        }
        $day = Carbon::createFromFormat('Y-m-d H:i:s', $pwToken->created_at);
        $now = Carbon::now();
        $dif = $now->diffInHours($day);
        if ($dif >= 24){
            PasswordReset::where('token', $rq->token)->delete();
            return view('pages.auths.errors')->with('msg_rs', __('Link has expired !'));
        }
        $rule = [
            'new_password' => 'required|min:5|max:50',
            'comfirm_password' => 'required|same:new_password'
        ];
        $messages = Helpers::switchLanguage(session()->get('locale'));
        $check = Validator::make($rq->all(), $rule, $messages);
        if ($check->passes()){
            $user = User::where('email', $pwToken->email)->first();
            $user->password = Hash::make($rq->new_password);
            $user->save();
            return redirect()->back()->with('msg_rs', __('Change password successfully !'));
        }
        else{
            return redirect()->back()->withErrors($check->errors());
        }
    }


    public function resignUser(){
        return view('pages-front.users.resign');
    }

    public function resignSaveUser(Request $rq){
        $rules = [
            'resign_name' => 'required|min:5|max:20',
            'resign_username' => 'required|min:5|max:30|unique:users,user_name',
            'resign_email' => 'required|email|unique:users,email',
            'resign_password' => 'required|min:6|max:40',
            'confirm_password' => 'required|same:resign_password',
        ];
        $messages = Helpers::switchLanguage(session()->get('locale'));
        $chek = Validator::make($rq->all(), $rules, $messages);
        if ($chek->passes()){
            $user = new User();
            $user->name = $rq->resign_name;
            $user->user_name = $rq->resign_username;
            $user->email = $rq->resign_email;
            $user->password = Hash::make($rq->resign_password);
            $user->save();
            return redirect()->back()->with('msg_resign', __('Sign up for a personal account') . ' !');
        }
        else{
            return redirect()->back()->withErrors($chek)->withInput();
        }
    }
}
