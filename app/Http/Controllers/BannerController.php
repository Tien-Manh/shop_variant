<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Banner;
use Illuminate\Http\Request;
use Validator;

class BannerController extends Controller
{
    public function index(Request $rq){
        $numpage = 10;
        $breadcrumb = [
            ['link' => '/', 'name' =>__('Home')],
            ['link' => 'javascript:void()', 'name' => __('Slide')],
        ];
        if ($rq->ajax()){
            $rq->pagenum ? $numpage = $rq->pagenum : $numpage;
            if ($rq->search){
                $banners = Banner::where('title', 'like', '%'.$rq->search.'%')
                    ->orwhere('description', 'like', '%'.$rq->search.'%')->orderBy('id', 'desc')->paginate($numpage);
            }
            else{
                $banners = Banner::orderBy('id', 'desc')->paginate($numpage);
            }
            return view('pages.banners.ajax-filter')->with('banners', $banners)->render();
        }
        else{
            $banners = Banner::orderBy('id', 'desc')->paginate($numpage);
            return view('pages.banners.index', compact('banners', 'breadcrumb'));
        }
    }
    public function add(Request  $rq){
        $breadcrumb = [
            ['link' => '/', 'name' =>__('Home')],
            ['link' => route('index-cates'), 'name' => __('Slide')],
            ['link' => 'javascript:void()', 'name' =>__('Add image')]
        ];
        return view('pages.banners.add', compact('breadcrumb'));
    }
    public function saveAdd(Request $rq){
        $rules = [
            'photo' => 'required',
            'status' => 'required',
        ];
        $messages = Helpers::switchLanguage('vi');
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()){
            $path = '';
            if ($rq->hasFile('photo')){
                $path = $rq->photo->store('admin/banner', 'public');
            }
            $banner = new Banner();
            $banner->title = $rq->title;
            $banner->description = $rq->contents;
            $banner->url = $rq->link;
            $banner->status = $rq->status;
            $banner->photo = $path;
            $banner->save();
            return response()->json([
                "type" => 'insert',
                'success' => true,
                'message' => __('Add') . ' ' . __('Photo') . ' '. __('success') . ' !'
            ]);
        }
        else{
            return response()->json([
                'type' => 'insert',
                'success' => false,
                'messages' => $check->errors(),
                'message' => __('Add') . ' ' . __('Photo') . ' '. __('error') . ' !'
            ]);
        }
    }
    public function update($id){
        if ($id){
            $breadcrumb = [
                ['link' => '/', 'name' =>__('Home')],
                ['link' => route('index-cates'), 'name' => __('Slide')],
                ['link' => 'javascript:void()', 'name' =>__('Update image')]
            ];
            $banner = Banner::find($id);
            return view('pages.banners.edit', compact('banner', 'breadcrumb'));
        }
    }
    public function saveUpdate(Request $rq){
        $banner = Banner::find($rq->id);
        $rules = [
            'status' => 'required',
        ];
        if ($banner->photo == ''){
            $rules['photo'] = 'required';
        }
        $messages = Helpers::switchLanguage('vi');
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()){
            if ($rq->hasFile('photo')){
                $path = $rq->photo->store('admin/banner', 'public');
                @unlink(public_path('storage/' . $banner->photo));
                $banner->photo = $path;
            }
            $banner->title = $rq->title;
            $banner->description = $rq->contents;
            $banner->url = $rq->link;
            $banner->status = $rq->status;
            $banner->save();
            return response()->json([
                "type" => 'update',
                'success' => true,
                'message' => __('Update') . ' ' . __('Photo') . ' '. __('success') . ' !'
            ]);
        }
        else{
            return response()->json([
                'type' => 'update',
                'success' => false,
                'messages' => $check->errors(),
                'message' => __('Update') . ' ' . __('Photo') . ' '. __('error') . ' !'
            ]);
        }
    }
    public function delete(Request $rq, $id){
        if ($id){
            $currentPage = (int)$rq->page;
            $banner = Banner::find($id);
            @unlink(public_path('storage/' . $banner->photo));
            $banner->delete();
            $getTatalPage = Banner::orderBy('id', 'desc')->paginate($rq->pagenum)->lastPage();
            if ($rq->search != '' ){
                $getTatalPage = Banner::where('title', 'like', '%'.$rq->search.'%')
                    ->orwhere('descripton', 'like', '%'.$rq->search.'%')->orderBy('id', 'desc')->paginate($rq->pagenum)->lastPage();
                if ($currentPage > $getTatalPage -1){
                    Paginator::currentPageResolver(function () use ($getTatalPage) {
                        return $getTatalPage;
                    });
                }
                $banners = Banner::where('title', 'like', '%'.$rq->search.'%')
                    ->orwhere('descripton', 'like', '%'.$rq->search.'%')->orderBy('id', 'desc')->paginate($rq->pagenum);
            }
            else{
                if ($currentPage > $getTatalPage -1){
                    Paginator::currentPageResolver(function () use ($getTatalPage ) {
                        return $getTatalPage;
                    });
                }
                $banners = Banner::orderBy('id', 'desc')->paginate($rq->pagenum);
            }
            return response()->json([
                'success' => true,
                'message' => __('Delete') . ' ' . __('Slide') .   ' ID '. $id .' ' . __('success') . ' !',
                'messages' => view('pages.banners.ajax-filter')->with('banners', $banners)->render()
            ]);
        }
    }
    public function switchAjax($id){
        $banner = Banner::find($id);
        if($banner->status == 0){
            $banner->status = 1;
        }
        else{
            $banner->status = 0;
        }
        $banner->save();
        return response()->json([
            'np_' => $banner->status,
            'message' => __('Update') . ' ' . __('Status') . ' '. __('success') . ' !'
        ]);
    }
}
