<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Cate;
use App\Models\Log;
use App\Models\PrdetailAttvalue;
use App\Models\ProductAttribute;
use Validator;
use File;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class CateController extends Controller
{
    public function index(Request $rq){
        $numpage = 10;
        $breadcrumb = [
            ['link' => '/', 'name' =>__('Home')],
            ['link' => 'javascript:void()', 'name' => __('Cates')],
        ];
        if ($rq->ajax()){
            $rq->pagenum ? $numpage = $rq->pagenum : $numpage;
            if ($rq->search){
                $cates = Cate::where('title', 'like', '%'.$rq->search.'%')
                    ->orwhere('slug', 'like', '%'.$rq->search.'%')->orderBy('id')->paginate($numpage);
            }
            else{
                $cates = Cate::orderBy('id', 'desc')->paginate($numpage);
            }
            return view('pages.cates.ajax-filter')->with('cates', $cates)->render();
        }
        else{
            $cates = Cate::orderBy('id', 'desc')->paginate($numpage);
            return view('pages.cates.index', compact('cates', 'breadcrumb'));
        }
    }
    public function add(Request  $rq){
        $breadcrumb = [
            ['link' => '/', 'name' =>__('Home')],
            ['link' => route('index-cates'), 'name' => __('Cates')],
            ['link' => 'javascript:void()', 'name' =>__('Add Cate')]
        ];
        if ($rq->ajax()){
            $cates = Cate::where('type', $rq->type)->where('parent_id', 0)->get();
            return view('pages.cates.ajax.cate-ajax')->with('cates', $cates)->render();
        }
        else{
            $cates = Cate::where('type', 'cate product')->where('parent_id', 0)->get();
        }
        return view('pages.cates.add', compact('cates', 'breadcrumb'));
    }
    public function saveAdd(Request $rq){
        $rules = [
            'title' => 'required|max:50|unique:cates,title',
            'slug' => 'required|max:50|unique:cates,slug',
            'status' => 'required',
            'type' => 'required',
        ];
        $messages = Helpers::switchLanguage(session()->get('locale'));
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()){
            $path = '';
            if ($rq->hasFile('photo')){
                $path = $rq->photo->store('admin/cates', 'public');
            }
            $cate = new Cate();
            $cate->title = $rq->title;
            $cate->slug = Helpers::to_slug($rq->slug);
            $cate->order_by = $rq->order_by;
            $cate->type = $rq->type;
            $cate->status = $rq->status;
            $cate->parent_id = $rq->parent_id;
            $cate->photo = $path;
            $cate->save();
            Log::pushLog('Add Cates ID: ' . $cate->id);
            return response()->json([
                "type" => 'insert',
                'success' => true,
                'cate' => '<option value=' .$cate->id. '>'.$cate->title.'</option>',
                'message' => __('Add') . ' ' . __('Cates') . ' '. __('success') . ' !'
            ]);
        }
        else{
            return response()->json([
                'type' => 'insert',
                'success' => false,
                'messages' => $check->errors(),
                'message' => __('Add') . ' ' . __('Cates') . ' '. __('error') . ' !'
            ]);
        }
    }
    public function update($id){
        if ($id){
            $breadcrumb = [
                ['link' => '/', 'name' =>__('Home')],
                ['link' => route('index-cates'), 'name' => __('Cates')],
                ['link' => 'javascript:void()', 'name' =>__('Update Cate')]
            ];
            $cateId = Cate::find($id);
            $cates = Cate::where('id', '<>', $id)->where('type', $cateId->type)->where('parent_id', 0)->get();
            return view('pages.cates.edit', compact('cates', 'cateId', 'breadcrumb'));
        }
    }
    public function saveUpdate(Request $rq){
        $rules = [
            'title' => 'required|max:50|unique:cates,title,'.$rq->id.',id',
            'slug' => 'required|max:50|unique:cates,slug,'.$rq->id.',id',
            'status' => 'required'
        ];
        $messages = Helpers::switchLanguage('vi');
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()){
            $cate = Cate::find($rq->id);
            if ($rq->hasFile('photo')){
                $path = $rq->photo->store('admin/cates', 'public');
                @unlink(public_path('storage/' . $cate->photo));
                $cate->photo = $path;
            }
            $cate->title = $rq->title;
            $cate->slug =  Helpers::to_slug($rq->slug);
            $cate->order_by = $rq->order_by;
            $cate->status = $rq->status;
             $cate->parent_id = $rq->parent_id;
            $cate->save();
            Log::pushLog('Update Cates ID: ' . $cate->id);
            return response()->json([
                "type" => 'update',
                'success' => true,
                'message' => __('Update') . ' ' . __('Cates') . ' '. __('success') . ' !'
            ]);
        }
        else{
            return response()->json([
                'type' => 'update',
                'success' => false,
                'messages' => $check->errors(),
                'message' => __('Update') . ' ' . __('Cates') . ' '. __('error') . ' !'
            ]);
        }
    }
    public function delete(Request $rq, $id){
        if ($id){
            $currentPage = (int)$rq->page;
            $cate = Cate::find($id);
            @unlink(public_path('storage/' . $cate->photo));
            if ($cate->type == 'cate post'){
                $post =  $cate->posts();
                $cate->posts()->detach($cate->posts);
                $post->delete();
            }
            else{
                $products =  $cate->products();
                foreach ($cate->products as $product){
                    $productDetails = $product->productDetail;
                    $productPhotos = $product->productsImages;
                    PrdetailAttvalue::wherein('product_detail_id', $productDetails->pluck('id')->toArray())->delete();
                    ProductAttribute::where('product_id', $product->id)->delete();
                    foreach ($productDetails->pluck('photo_thumb')->toArray() as $photo){
                        @unlink(public_path('storage/' . $photo));
                    }
                    foreach ($productPhotos->pluck('photo')->toArray() as $photo){
                        @unlink(public_path('storage/' . $photo));
                    }
                    $product->productDetail()->delete();
                    $product->productsImages()->delete();
                }
                $cate->products()->detach($cate->products);
                $products->delete();
            }
            $cate->delete();
            Log::pushLog('Delete Cates ID: ' . $id);
            $getTatalPage = Cate::orderBy('id')->paginate($rq->pagenum)->lastPage();
            if ($rq->search != '' ){
                $getTatalPage = Cate::where('title', 'like', '%'.$rq->search.'%')
                    ->orwhere('slug', 'like', '%'.$rq->search.'%')->orderBy('id')->paginate($rq->pagenum)->lastPage();
                if ($currentPage > $getTatalPage -1){
                    Paginator::currentPageResolver(function () use ($getTatalPage) {
                        return $getTatalPage;
                    });
                }
                $cates = Cate::where('title', 'like', '%'.$rq->search.'%')
                    ->orwhere('slug', 'like', '%'.$rq->search.'%')->orderBy('id', 'desc')->paginate($rq->pagenum);
            }
            else{
                if ($currentPage > $getTatalPage -1){
                    Paginator::currentPageResolver(function () use ($getTatalPage ) {
                        return $getTatalPage;
                    });
                }
                $cates = Cate::orderBy('id', 'desc')->paginate($rq->pagenum);
            }
            return response()->json([
                'success' => true,
                'message' => __('Delete') . ' ' . __('Cates') .   ' ID '. $id .' ' . __('success') . ' !',
                'messages' => view('pages.cates.ajax-filter')->with('cates', $cates)->render()
            ]);
        }
    }
    public function switchAjax($id){
        $cate = Cate::find($id);
        if($cate->status == 0){
            $cate->status = 1;
        }
        else{
            $cate->status = 0;
        }
        $cate->save();
        Log::pushLog('Update Cates ID: ' . $id);
        return response()->json([
            'np_' => $cate->status,
            'message' => __('Update') . ' ' . __('Status') . ' '. __('success') . ' !'
        ]);
    }
}
