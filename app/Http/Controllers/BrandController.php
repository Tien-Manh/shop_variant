<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Brand;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Pagination\Paginator;
class BrandController extends Controller
{
    public function index(Request $rq){
        $numpage = 10;
        $breadcrumb = [
            ['link' => '/', 'name' =>__('Home')],
            ['link' => 'javascript:void()', 'name' => __('Brands')],
        ];
        if ($rq->ajax()){
            $rq->pagenum ? $numpage = $rq->pagenum : $numpage;
            if ($rq->search){
                $brands = Brand::where('name', 'like', '%'.$rq->search.'%')
                    ->orwhere('slug', 'like', '%'.$rq->search.'%')->orderBy('id', 'desc')->paginate($numpage);
            }
            else{
                $brands = Brand::orderBy('id', 'desc')->paginate($numpage);
            }
            return view('pages.brands.ajax-filter')->with('brands', $brands)->render();
        }
        else{
            $brands = Brand::orderBy('id', 'desc')->paginate($numpage);
            return view('pages.brands.index', compact('brands', 'breadcrumb'));
        }
    }
    public function add(Request  $rq){
        $breadcrumb = [
            ['link' => '/', 'name' =>__('Home')],
            ['link' => route('index-brands'), 'name' => __('Brands')],
            ['link' => 'javascript:void()', 'name' =>__('Add Brands')]
        ];
        return view('pages.brands.add', compact('breadcrumb'));
    }
    public function saveAdd(Request $rq){
        $rules = [
            'name' => 'required|max:50|unique:brands,name',
            'slug' => 'required|max:50|unique:brands,slug',
            'status' => 'required',
            'photo' => 'dimensions:ratio=1/1',
        ];
        $messages = Helpers::switchLanguage('vi');
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()){
            $path = '';
            if ($rq->hasFile('photo')){
                $path = $rq->photo->store('admin/brands', 'public');
            }
            $brand = new Brand();
            $brand->name = $rq->name;
            $brand->slug = Helpers::to_slug($rq->slug);
            $brand->status = $rq->status;
            $brand->logo = $path;
            $brand->save();
            return response()->json([
                "type" => 'insert',
                'success' => true,
                'message' => __('Add') . ' ' . __('Brands') . ' '. __('success') . ' !'
            ]);
        }
        else{
            return response()->json([
                'type' => 'insert',
                'success' => false,
                'messages' => $check->errors(),
                'message' => __('Add') . ' ' . __('Brands') . ' '. __('error') . ' !'
            ]);
        }
    }
    public function update($id){
        if ($id){
            $breadcrumb = [
                ['link' => '/', 'name' =>__('Home')],
                ['link' => route('index-brands'), 'name' => __('Brands')],
                ['link' => 'javascript:void()', 'name' =>__('Update Brands')]
            ];
            $brand = Brand::find($id);
            return view('pages.brands.edit', compact('brand', 'breadcrumb'));
        }
    }
    public function saveUpdate(Request $rq){
        $rules = [
            'name' => 'required|max:50|unique:brands,name,'.$rq->id.',id',
            'slug' => 'required|max:50|unique:brands,slug,'.$rq->id.',id',
            'status' => 'required',
            'photo' => 'dimensions:ratio=1/1',
        ];
        $messages = Helpers::switchLanguage('vi');
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()){
            $brand = Brand::find($rq->id);
            if ($rq->hasFile('photo')){
                $path = $rq->photo->store('admin/brands', 'public');
                @unlink(public_path('storage/' . $brand->logo));
                $brand->logo = $path;
            }
            $brand->name = $rq->name;
            $brand->slug =  Helpers::to_slug($rq->slug);
            $brand->status = $rq->status;
            $brand->save();
            return response()->json([
                "type" => 'update',
                'success' => true,
                'message' => __('Update') . ' ' . __('Brands') . ' '. __('success') . ' !'
            ]);
        }
        else{
            return response()->json([
                'type' => 'update',
                'success' => false,
                'messages' => $check->errors(),
                'message' => __('Update') . ' ' . __('Brands') . ' '. __('error') . ' !'
            ]);
        }
    }
    public function delete(Request $rq, $id){
        if ($id){
            $currentPage = (int)$rq->page;
            $brand = Brand::find($id);
            @unlink(public_path('storage/' . $brand->photo));
            $brand->delete();
            $getTatalPage = Brand::orderBy('id')->paginate($rq->pagenum)->lastPage();
            if ($rq->search != '' ){
                $getTatalPage = Brand::where('title', 'like', '%'.$rq->search.'%')
                    ->orwhere('slug', 'like', '%'.$rq->search.'%')->orderBy('id', 'desc')->paginate($rq->pagenum)->lastPage();
                if ($currentPage > $getTatalPage -1){
                    Paginator::currentPageResolver(function () use ($getTatalPage) {
                        return $getTatalPage;
                    });
                }
                $brands = Brand::where('title', 'like', '%'.$rq->search.'%')
                    ->orwhere('slug', 'like', '%'.$rq->search.'%')->orderBy('id', 'desc')->paginate($rq->pagenum);
            }
            else{
                if ($currentPage > $getTatalPage -1){
                    Paginator::currentPageResolver(function () use ($getTatalPage ) {
                        return $getTatalPage;
                    });
                }
                $brands = Brand::orderBy('id', 'desc')->paginate($rq->pagenum);
            }
            return response()->json([
                'success' => true,
                'message' => __('Delete') . ' ' . __('Brands') .   ' ID '. $id .' ' . __('success') . ' !',
                'messages' => view('pages.brands.ajax-filter')->with('brands', $brands)->render()
            ]);
        }
    }
    public function switchAjax($id){
        $brand = Brand::find($id);
        if($brand->status == 0){
            $brand->status = 1;
        }
        else{
            $brand->status = 0;
        }
        $brand->save();
        return response()->json([
            'np_' => $brand->status,
            'message' => __('Update') . ' ' . __('Status') . ' '. __('success') . ' !'
        ]);
    }
}
