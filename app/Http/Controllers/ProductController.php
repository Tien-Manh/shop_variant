<?php

namespace App\Http\Controllers;
use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\Cate;
use App\Models\Log;
use App\Models\PrdetailAttvalue;
use App\Models\ProductAttribute;
use App\Models\Product;
use App\Models\Attribute;
use App\Helpers\Helpers;
use App\Models\ProductDetail;
use App\Models\ProductPhoto;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class  ProductController extends Controller
{
    public function index(Request $rq){
        $numpage = 10;
        $breadcrumb = [
            ['link' => '/', 'name' =>__('Home')],
            ['link' => 'javascript:void()', 'name' => __('Products')],
        ];
        if ($rq->ajax()){
            if ($rq->product_id){
                $product = Product::find($rq->product_id);
                if ($rq->attrName){
                    $attrValue = $rq->attrValue;
                    $productDetailId =ProductDetail::where('product_id', $rq->product_id)->get()->pluck('id')->toArray();
                    $productDetail = [];
                    foreach ($productDetailId as $pr){
                        $productIds = PrdetailAttvalue::where('product_detail_id', $pr)->get()->pluck('attribute_value_id')->toArray();
                        sort($productIds);
                        sort($attrValue);
                        if ($productIds == $attrValue){
                            $productDetail = ProductDetail::find($pr);
                            break;
                        }
                    }
                    return view('pages.products.show-detail')->with('productDetail', $productDetail)->with('product', $product)->render();
                }
                else{
                    $productDetail = ProductDetail::where('is_default', 1)->where('product_id', $rq->product_id)->first();
                }
                return view('pages.products.show-detail')->with('productDetail', $productDetail)->with('product', $product)->render();
            }
            $rq->pagenum ? $numpage = $rq->pagenum : $numpage;
            if ($rq->search){
                $products = Product::where('title', 'like', '%'.$rq->search.'%')
                    ->orwhere('sku', 'like', '%'.$rq->search.'%')->orderBy('id')->paginate($numpage);
            }
            else{
                $products = Product::orderBy('id', 'desc')->paginate($numpage);
            }
            return view('pages.products.ajax-filter')->with('products', $products)->render();
        }
        else{
            $products = Product::orderBy('id', 'desc')->paginate($numpage);
            return view('pages.products.index', compact('products', 'breadcrumb'));
        }
    }
    public function add(){
        $breadcrumb = [
            ['link' => '/', 'name' =>__('Home')],
            ['link' => route('index-products'), 'name' => __('Products')],
            ['link' => 'javascript:void()', 'name' =>__('Add Product')]
        ];
        $cates = Cate::where('type', 'cate product')->where('parent_id', 0)->get();
        $brands = Brand::all();
        $attributes = Attribute::all();
        return view('pages.products.add', compact('cates', 'brands', 'attributes', 'breadcrumb'));
    }
    public function allAjaxAttributeValue(Request  $rq){
        $data = AttributeValue::where('attribute_id', $rq->attr_id)->get();
        $nameAttr = Attribute::find($rq->attr_id);
        $html = '<optgroup delete-id="'.$nameAttr->id.'" label="'.$nameAttr->name.'">';
        if(count($data) > 0){
            foreach ($data as $val){
                $html .= '<option value="'.$val->id.'" >'.$val->value.'</option>';
            }
        }
        else{
            $html .= '<option>Not result data</option>';
        }
        $html .= '</optgroup>';
        return response()->json([
            'data' => $html
        ]);
    }
    public function saveAdd(Request $rq){
        $rules = [
            'title' => 'required|max:100|unique:products,title',
            'slug' => 'required|max:100|unique:products,slug',
            'cate_id' => 'required',
            'invoice.*.quantity' => 'required',
            'invoice.*.cost' => 'required',
            'invoice.*.price' => 'required',
        ];
        $messages = Helpers::switchLanguage(session()->get('locale'));
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()){
            foreach ($rq->invoice as $key => $val){
                foreach ($rq->invoice as $key1 => $val1){
                    if (isset($val['attribute_value'])  && isset($val1['attribute_value']) && ($val['attribute_value'] == $val1['attribute_value']) && ($key1 != $key)){
                        return response()->json([
                            'type' => 'insert',
                            'success' => false,
                            'messages' => '',
                            'message' => __('Value attribute already exists')
                        ]);
                    }
                }
            }
            $product = new Product();
            $product->title = $rq->title;
            $product->slug = Helpers::to_slug($rq->slug);
            $product->sku = $rq->sku;
            $product->brand_id = $rq->brand_id;
            $product->content = $rq->contents;
            $product->status = $rq->active;
            if ($product->save()){
                $product->cates()->attach($rq->cate_id);
                if ($rq->attribute){
                    foreach ($rq->attribute as $attr){
                        $productAttribute = new ProductAttribute();
                        $productAttribute->product_id = $product->id;
                        $productAttribute->attribute_id = $attr;
                        $productAttribute->save();
                    }
                }
                if ($rq->has('files_img')) {
                    foreach ($rq->files_img as $file_) {
                            $paths = $file_->store('admin/products_images', 'public');
                            $productPhoto = new ProductPhoto();
                            $productPhoto->product_id = $product->id;
                            $productPhoto->photo = $paths;
                            $productPhoto->save();
                    }
                }
                foreach ($rq->invoice as $val){
                    $is_default = isset($val['is_default']) ? 1: 0;
                    $path = isset($val['file_thumb']) ? $val['file_thumb']->store('admin/products', 'public') : null;
                    $productDetail = new ProductDetail();
                    $productDetail->product_id = $product->id;
                    $productDetail->sku = $val['sku_detail'];
                    $productDetail->status = $val['active_product_detail'];
                    $productDetail->quantity = $val['quantity'];
                    $productDetail->sub_quantity = $val['quantity'];
                    $productDetail->cost = $val['cost'];
                    $productDetail->price = $val['price'];
                    $productDetail->sell_price = $val['sell_price'] ?  $val['sell_price'] : 0;
                    $productDetail->is_default = $is_default;
                    $productDetail->photo_thumb = $path;
                    $productDetail->save();
                    if ($val['attribute_value']){
                        foreach ($val['attribute_value'] as $attrVal){
                            $attr_id = AttributeValue::find($attrVal);
                            $productAttribute = new PrdetailAttvalue();
                            $productAttribute->attribute_id = $attr_id->attribute_id;
                            $productAttribute->product_detail_id = $productDetail->id;
                            $productAttribute->attribute_value_id = $attrVal;
                            $productAttribute->save();
                        }
                    }
                }
                Log::pushLog('Add Products ID: ' . $product->id);
            }
            return response()->json([
                "type" => 'insert',
                'success' => true,
                'message' => __('Add') . ' ' . __('Products') . ' '. __('success') . ' !'
            ]);
        }
        else{
            return response()->json([
                'type' => 'insert',
                'success' => false,
                'messages' => $check->errors(),
                'message' => __('Add') . ' ' . __('Products') . ' '. __('error') . ' !'
            ]);
        }
    }
    public function update($id){
        if ($id){
            $breadcrumb = [
                ['link' => '/', 'name' =>__('Home')],
                ['link' => route('index-products'), 'name' => __('Products')],
                ['link' => 'javascript:void()', 'name' =>__('Update Product')]
            ];
            $cates = Cate::where('type', 'cate product')->where('parent_id', 0)->get();
            $attributes = Attribute::all();
            $product = Product::find($id);
            $photos = $product->productsImages;
            $listPhotos = [];
            foreach ($photos as $photo){
                if (file_exists(\Storage::disk('public')->path($photo->photo))){
                    $sizes = \Storage::disk('public')->size($photo->photo);
                }
                else{
                    $sizes = 0;
                }
                $filename = substr($photo->photo, strlen('admin/products_images/'), strlen($photo->photo));
                $listPhotos[] = ['id' => $photo->id, 'name'=>$filename, 'size'=>$sizes, 'path'=>asset('storage/' .$photo->photo)];
            }
            return view('pages.products.edit', compact('cates','attributes', 'listPhotos',  'product', 'breadcrumb'));
        }
    }
    public function saveUpdate(Request $rq){
        $rules = [
            'title' => 'required|max:120|unique:products,title,'.$rq->id.',id',
            'slug' => 'required|max:120|unique:products,slug,'.$rq->id.',id',
            'cate_id' => 'required',
            'invoice.*.quantity' => 'required',
            'invoice.*.cost' => 'required',
            'invoice.*.price' => 'required',
        ];
        $messages = Helpers::switchLanguage('vi');
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()){
            foreach ($rq->invoice as $key => $val){
                foreach ($rq->invoice as $key1 => $val1){
                    if (isset($val['attribute_value'])  && isset($val1['attribute_value']) && ($val['attribute_value'] == $val1['attribute_value']) && ($key1 != $key)){
                        return response()->json([
                            'type' => 'update',
                            'success' => false,
                            'messages' => '',
                            'message' => __('Value attribute already exists')
                        ]);
                    }
                }
            }
            $product = Product::find($rq->id);
            $product->title = $rq->title;
            $product->slug = Helpers::to_slug($rq->slug);
            $product->sku = $rq->sku;
            $product->brand_id = $rq->brand_id;
            $product->content = $rq->contents;
            $product->status = $rq->active;
            $product->save();
            Log::pushLog('Update Products ID: ' . $product->id);
            $product->cates()->sync($rq->cate_id);
            if (isset($rq->attribute)){
                $ProductAttributes = ProductAttribute::where('product_id', $product->id)->whereNotIn('attribute_id', $rq->attribute);
                $productDetailIds = ProductDetail::where('product_id', $product->id)->get()->pluck('id')->toArray();
                $getIdsProductAttribute = $ProductAttributes->get()->pluck('attribute_id')->toArray();
                PrdetailAttvalue::whereIn('product_detail_id', $productDetailIds)->whereIn('attribute_id', $getIdsProductAttribute)->delete();
                $ProductAttributes->delete();
                foreach ($rq->attribute as $attr){
                    if (ProductAttribute::where('product_id', $product->id)->where('attribute_id', $attr)->doesntExist()){
                        $proAttribute = new ProductAttribute();
                        $proAttribute->product_id = $product->id;
                        $proAttribute->attribute_id = $attr;
                        $proAttribute->save();
                    }
                }
            }
            else{
               ProductAttribute::where('product_id', $product->id)->delete();
            }
            $productDetailIdsArray = [];
            $newQuantity = [];
            foreach ($rq->invoice as $inVoi){
                if (isset($inVoi['attribute_value'])){
                    PrdetailAttvalue::where('product_detail_id', $inVoi['product_detail_id'])
                        ->whereNotIn('attribute_value_id', $inVoi['attribute_value'])->delete();
                    foreach ($inVoi['attribute_value'] as $attrVal){
                        if (PrdetailAttvalue::where('product_detail_id', $inVoi['product_detail_id'])->where('attribute_value_id', $attrVal)->doesntExist()){
                            $attriButeId = AttributeValue::find($attrVal);
                            $prDetailAttributeVal = new PrdetailAttvalue();
                            $prDetailAttributeVal->product_detail_id = $inVoi['product_detail_id'];
                            $prDetailAttributeVal->attribute_value_id = $attrVal;
                            $prDetailAttributeVal->attribute_id = $attriButeId->attribute_id;
                            $prDetailAttributeVal->save();
                        }
                    }
                }
                else{
                  PrdetailAttvalue::where('product_detail_id', $inVoi['product_detail_id'])->delete();
                }
                $is_default = isset($inVoi['is_default']) ? 1: 0;
                $path = isset($inVoi['file_thumb']) ? $inVoi['file_thumb']->store('admin/products', 'public') : null;
                if (!isset($inVoi['product_detail_id'])){
                    $productDetail = new ProductDetail();
                }
                else{
                    $productDetail = ProductDetail::find($inVoi['product_detail_id']);
                }
                $productDetail->product_id = $product->id;
                $productDetail->sku = $inVoi['sku_detail'];
                $productDetail->status = $inVoi['active_product_detail'];
                if (isset($inVoi['is_update'])){
                    $productDetail->sub_quantity = ($productDetail->sub_quantity + $inVoi['quantity']);
                    $productDetail->quantity = ($productDetail->quantity + $inVoi['quantity']);
                    $newQuantity['quantity_' . $productDetail->id] = $productDetail->sub_quantity;
                }
                $productDetail->cost = $inVoi['cost'];
                $productDetail->price = $inVoi['price'];
                $productDetail->sell_price = $inVoi['sell_price'] ?  $inVoi['sell_price'] : 0 ;
                $productDetail->is_default = $is_default;
                if ($path != null && $productDetail->id){
                    @unlink(public_path('storage/'. $productDetail->photo_thumb));
                    $productDetail->photo_thumb = $path;
                }
                $productDetail->save();
                array_push($productDetailIdsArray, $productDetail->id);
            }
            $deleteProductDetails = ProductDetail::where('product_id', $product->id)->whereNotIn('id', $productDetailIdsArray);
            $deleteImages = $deleteProductDetails->get()->pluck('photo_thumb')->toArray();
            foreach ($deleteImages as $imaGe){
                @unlink(public_path('storage/'. $imaGe));
            }
            $deleteProductDetails->delete();
            if ($rq->files_ids){
                $photos = ProductPhoto::where('product_id', $product->id)->whereNotIn('id', $rq->files_ids);
                $photosArr = $photos->get()->pluck('photo')->toArray();
                foreach ($photosArr as $photo){
                    @unlink(public_path('storage/' .$photo));
                }
                $photos->delete();
            }
            if ($rq->has('files_img')) {
                foreach ($rq->files_img as $file_) {
                    $paths = $file_->store('admin/products_images', 'public');
                    $productPhoto = new ProductPhoto();
                    $productPhoto->product_id = $product->id;
                    $productPhoto->photo = $paths;
                    $productPhoto->save();
                }
            }
            return response()->json([
                "type" => 'update',
                'success' => true,
                'quantity' => $newQuantity,
                'message' => __('Update') . ' ' . __('Products') . ' '. __('success') . ' !'
            ]);
        }
        else{
            return response()->json([
                'type' => 'update',
                'success' => false,
                'messages' => $check->errors(),
                'message' => __('Update') . ' ' . __('Products') . ' '. __('error') . ' !'
            ]);
        }
    }
    public function delete(Request $rq, $id){
        if ($id){
            $currentPage = (int)$rq->page;
            $product = Product::find($id);
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
            $product->cates()->detach($product->cates);
            $product->delete();
            Log::pushLog('Delete Products ID: ' . $product->id);
            $getTatalPage = Product::orderBy('id')->paginate($rq->pagenum)->lastPage();
            if ($rq->search != '' ){
                $getTatalPage = Product::where('title', 'like', '%'.$rq->search.'%')
                    ->orwhere('slug', 'like', '%'.$rq->search.'%')->orderBy('id')->paginate($rq->pagenum)->lastPage();
                if ($currentPage > $getTatalPage -1){
                    Paginator::currentPageResolver(function () use ($getTatalPage) {
                        return $getTatalPage;
                    });
                }
                $products = Product::where('title', 'like', '%'.$rq->search.'%')
                    ->orwhere('slug', 'like', '%'.$rq->search.'%')->orderBy('id', 'desc')->paginate($rq->pagenum);
            }
            else{
                if ($currentPage > $getTatalPage -1){
                    Paginator::currentPageResolver(function () use ($getTatalPage ) {
                        return $getTatalPage;
                    });
                }
                $products = Product::orderBy('id','desc')->paginate($rq->pagenum);
            }
            return response()->json([
                'success' => true,
                'message' => __('Delete') . ' ' . __('Products') .   ' ID '. $id .' ' . __('success') . ' !',
                'messages' => view('pages.products.ajax-filter')->with('products', $products)->render()
            ]);
        }
    }

    public function switchAjax($id){
        $product = Product::find($id);
        if($product->status == 0){
            $product->status = 1;
        }
        else{
            $product->status = 0;
        }
        $product->save();
        Log::pushLog('Update Products ID: ' . $product->id);
        return response()->json([
            'np_' => $product->status,
            'message' => __('Update') . ' ' . __('Status') . ' '. __('success') . ' !'
        ]);
    }
}
