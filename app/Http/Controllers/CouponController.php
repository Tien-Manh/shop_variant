<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Cate;
use App\Models\Coupon;
use App\Models\ItemCoupon;
use App\Models\Log;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Validator;

class CouponController extends Controller
{
    public function index(Request $rq){
        $breadcrumb = [
            ['link' => '/', 'name' => __('Home')],
            ['link' => 'javascript:void()', 'name' => __('Coupons')],
        ];
        $numpage = 10;
        if ($rq->ajax()){
            $rq->pagenum ? $numpage = $rq->pagenum : $numpage;
            if ($rq->search){
                $coupons = Coupon::where('name', 'like', '%'.$rq->search.'%')->orderBy('id')->paginate($numpage);
            }
            else{
                $coupons = Coupon::orderBy('id', 'desc')->paginate($numpage);
            }
            return view('pages.coupons.ajax-filter')->with('coupons', $coupons)->render();
        }
        else{
            $coupons = Coupon::orderBy('id', 'desc')->paginate($numpage);
            return view('pages.coupons.index', compact('coupons', 'breadcrumb'));
        }

    }

    public function add(Request $rq){
        $breadcrumb = [
            ['link' => '/', 'name' => __('Home')],
            ['link' => route('index-coupons'), 'name' => __('Coupons')],
            ['link' => 'javascript:void()', 'name' =>__('Add Coupon')]
        ];
        if ($rq->ajax()){
            $result = null;
            $ids = [];
            if ($rq->ids){
                $ids = $rq->ids;
            }
            if ($rq->type == 'products'){
                if ($rq->getIds){
                    $ids_ = $rq->getIds;
                    $ndatas = __('Products') . ':  ';
                    $notifis = Coupon::join('item_coupons', 'coupons.id', '=', 'item_coupons.coupon_id')
                        ->where('item_id', $ids_)->where('type_coupon', 'products')
                        ->whereDate('date_end', '>', Carbon::now())->get();
                    if (count($notifis) > 0){
                        $ndatas .=  Product::find($ids_)->title . ', ';
                        $ndatas = rtrim($ndatas, ', ') . ' '.  __('Already exist will be deleted after saving');
                        return response()->json(
                            $ndatas
                        );
                    }
                    else{
                        return response()->json(
                            ''
                        );
                    }
                }
                if ($rq->product){
                    $result = Product::whereNotIn('id', $ids)->where('title', 'like', '%'.$rq->product.'%')->orderBy('id', 'desc')->select('title', 'id')->limit(10)->get();
                }
                else{
                    $result = Product::whereNotIn('id', $ids)->orderBy('id', 'desc')->select('title', 'id')->limit(20)->get();
                }
            }
            if ($rq->type == 'categories'){
                if ($rq->getIds){
                    $ids_ = $rq->getIds;
                    $ndatas = __('Categories') . ':  ';
                    $notifis = Coupon::join('item_coupons', 'coupons.id', '=', 'item_coupons.coupon_id')
                        ->where('cate_id', $ids_)->where('type_coupon', 'categories')
                        ->whereDate('date_end', '>', Carbon::now())->get();
                    if (count($notifis) > 0){
                        $ndatas .=  Cate::find($ids_)->title . ', ';
                        $ndatas = rtrim($ndatas, ', ') . ' '. __('Already exist will be deleted after saving');
                        return response()->json(
                            $ndatas
                        );
                    }
                    else{
                        return response()->json(
                            ''
                        );
                    }
                }
                if ($rq->categorie){
                    $result = Cate::where('type', 'cate product')->whereNotIn('id', $ids)->where('title', 'like', '%'.$rq->categorie.'%')->orderBy('id', 'desc')->select('title', 'id')->limit(5)->get();
                }
                else{
                    $result = Cate::where('type', 'cate product')->whereNotIn('id', $ids)->orderBy('id', 'desc')->select('title', 'id')->limit(10)->get();
                }
            }
            return response()->json(
                $result
            );
        }
        return view('pages.coupons.add', compact('breadcrumb'));
    }

    public function saveAdd(Request $rq){
        $rules = [
            'name' => 'required|unique:coupons,name'
        ];
        if ($rq->type_coupon_code == 'percent price'){
            $rules['price'] = 'required|numeric|min:0|max:100';
        }
        else{
            $rules['price'] = 'required';
        }
        if ($rq->type_coupon == 'total order'){
           $rules['code'] = 'required';
        }
        else{
            $rules['items'] = 'required';
        }
        $messages = Helpers::switchLanguage(session()->get('locale'));
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()){
            $coupon = new Coupon();
            $coupon->name = $rq->name;
            $coupon->status = $rq->status;
            $coupon->description = $rq->description;
            $coupon->type_coupon = $rq->type_coupon;
            $coupon->type = $rq->type_coupon_code;
            $coupon->price_value = $rq->price;
            $coupon->date_start = NULL;
            $coupon->date_end = NULL;
            if($rq->date_start){
                $newData = explode(' ', $rq->date_start);
                if (isset($newData[0])){
                    $dateStart = date('Y-m-d', strtotime($newData[0]));
                    $coupon->date_start = $dateStart;
                }
                else{
                    $coupon->date_start = NULL;
                }
                if (isset($newData[2])){
                    $dateEnd = date('Y-m-d', strtotime($newData[2]));
                    $coupon->date_end = $dateEnd;
                }
                else{
                    $coupon->date_end = NULL;
                }
            }
            if ($rq->type_coupon == 'total order'){
                $coupon->code = $rq->code;
                $coupon->amount_code = $rq->amount_code;
                $coupon->total_order_min = $rq->total_min;
                $coupon->price_order_max = $rq->total_max;
                $coupon->save();
            }
            else{
                $coupon->save();
                if ($rq->type_coupon == 'products'){
                    $coupon_ = Coupon::join('item_coupons', 'coupons.id', '=', 'item_coupons.coupon_id')
                        ->where('type_coupon', 'products')->whereDate('date_end', '>', Carbon::now())->whereIn('item_id', $rq->items)->get()->pluck('item_id');
                    ItemCoupon::whereIn('item_id', $coupon_)->delete();
                    foreach ($rq->items as $id_){
                        $productCoupon = new ItemCoupon();
                        $productCoupon->item_id = $id_;
                        $productCoupon->coupon_id = $coupon->id;
                        $productCoupon->save();
                    }
                }
                else{
                    $coupon_ = Coupon::join('item_coupons', 'coupons.id', '=', 'item_coupons.coupon_id')
                        ->where('type_coupon', 'categories')->whereDate('date_end', '>', Carbon::now())->whereIn('cate_id', $rq->items)->get()->pluck('cate_id');
                    ItemCoupon::whereIn('cate_id', $coupon_)->delete();
                    foreach ($rq->items as $id_){
                        $productCoupon = new ItemCoupon();
                        $productCoupon->cate_id = $id_;
                        $productCoupon->coupon_id = $coupon->id;
                        $productCoupon->save();
                    }
                }
            }
            Log::pushLog('Add Counpons ID: ' .$coupon->id);
            return response()->json([
                'type' => 'insert',
                'success' => true,
                'message' => __('Add') . ' ' . __('Coupons') . ' '. __('success') . ' !'
            ]);
        }
        else{
            return response()->json([
                'type' =>'insert',
                'success' => false,
                'messages' => $check->errors(),
                'message' => __('Add') . ' ' . __('Coupons') . ' '. __('error') . ' !'
            ]);
        }
    }

    public function update(Request $rq, $id){
        $breadcrumb = [
            ['link' => '/', 'name' => __('Home')],
            ['link' => route('index-coupons'), 'name' => __('Coupons')],
            ['link' => 'javascript:void()', 'name' =>__('Update Coupon')]
        ];
        $coupon = Coupon::find($rq->id);
        $items = [];
        if ($coupon->type_coupon == 'products'){
             $items = Product::whereIn('id', $coupon->itemCoupon->pluck('item_id'))->get();
        }
        elseif ($coupon->type_coupon == 'categories'){
            $items = Cate::whereIn('id', $coupon->itemCoupon->pluck('cate_id'))->get();
        }
        if ($rq->ajax()){
            $result = null;
            $ids = [];
            if ($rq->ids){
                $ids = $rq->ids;
            }
            if ($rq->type == 'products'){
                 if ($rq->getIds){
                    $ids_ = $rq->getIds;
                    $ndatas = __('Product') . ':  ';
                     $notifis = Coupon::join('item_coupons', 'coupons.id', '=', 'item_coupons.coupon_id')
                         ->where('item_id', $ids_)->where('type_coupon', 'products')
                         ->where('coupon_id', '!=', $id)
                         ->whereDate('date_end', '>', Carbon::now())->get();
                    if (count($notifis) > 0){
                        $ndatas .=  Product::find($ids_)->title . ', ';
                        $ndatas = rtrim($ndatas, ', ') . ' '.  __('Already exist will be deleted after saving');
                        return response()->json(
                            $ndatas
                        );
                    }
                    else{
                        return response()->json(
                            ''
                        );
                    }
                }
                if ($rq->product){
                    $result = Product::whereNotIn('id', $ids)->where('title', 'like', '%'.$rq->product.'%')->orderBy('id', 'desc')->select('title', 'id')->limit(5)->get();
                }
                else{
                    $result = Product::whereNotIn('id', $ids)->orderBy('id', 'desc')->select('title', 'id')->limit(10)->get();
                }
            }
            if ($rq->type == 'categories'){
                 if ($rq->getIds){
                    $ids_ = $rq->getIds;
                    $ndatas = __('Categories') . ':  ';
                     $notifis = Coupon::join('item_coupons', 'coupons.id', '=', 'item_coupons.coupon_id')
                         ->where('cate_id', $ids_)->where('type_coupon', 'categories')
                         ->where('coupon_id', '!=', $id)
                         ->whereDate('date_end', '>', Carbon::now())->get();
                    if (count($notifis) > 0){
                        $ndatas .=  Cate::find($ids_)->title . ', ';
                        $ndatas = rtrim($ndatas, ', ') . ' '.  __('Already exist will be deleted after saving');
                        return response()->json(
                            $ndatas
                        );
                    }
                    else{
                        return response()->json(
                            ''
                        );
                    }
                }
                if ($rq->categorie){
                    $result = Cate::where('type', 'cate product')->whereNotIn('id', $ids)->where('title', 'like', '%'.$rq->categorie.'%')->orderBy('id', 'desc')->select('title', 'id')->limit(5)->get();
                }
                else{
                    $result = Cate::where('type', 'cate product')->whereNotIn('id', $ids)->orderBy('id', 'desc')->select('title', 'id')->limit(10)->get();
                }
            }
            return response()->json(
                $result
            );
        }
        return view('pages.coupons.edit', compact('coupon', 'items', 'breadcrumb'));
    }

    public function saveUpdate(Request $rq){
        $rules = [
            'name' => 'required|unique:coupons,name,'.$rq->id.',id',
            'price' => 'required'
        ];
        if ($rq->type_coupon == 'total order'){
            $rules['code'] = 'required';
        }
        else{
            $rules['items'] = 'required';
        }
        $messages = Helpers::switchLanguage('vi');
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()){
            $coupon = Coupon::find($rq->id);
            $coupon->name = $rq->name;
            $coupon->status = $rq->status;
            $coupon->description = $rq->description;
            $coupon->type_coupon = $rq->type_coupon;
            $coupon->type = $rq->type_coupon_code;
            $coupon->date_start = NULL;
            $coupon->date_end = NULL;
            $coupon->price_value = $rq->price;
            if ($rq->date_start){
                $newData = explode(' ', $rq->date_start);
                if (isset($newData[0])){
                    $dateStart = date('Y-m-d', strtotime($newData[0]));
                    $coupon->date_start = $dateStart;
                }
                else{
                    $coupon->date_start = NULL;
                }
                if (isset($newData[2])){
                    $dateEnd = date('Y-m-d', strtotime($newData[2]));
                    $coupon->date_end = $dateEnd;
                }
                else{
                    $coupon->date_end = NULL;
                }
            }
            if ($rq->type_coupon == 'total order'){
                $coupon->code = $rq->code;
                $coupon->amount_code = $rq->amount_code;
                $coupon->total_order_min = $rq->total_min;
                $coupon->price_order_max = $rq->total_max;
                $coupon->save();
            }
            else{
                $coupon->save();
                if ($rq->type_coupon == 'products'){
                    $coupon_ = Coupon::join('item_coupons', 'coupons.id', '=', 'item_coupons.coupon_id')
                        ->where('type_coupon', 'products')->whereDate('date_end', '>', Carbon::now())->whereIn('item_id', $rq->items)->where('coupon_id', '!=', $coupon->id)->get()->pluck('item_id');
                    ItemCoupon::whereIn('item_id', $coupon_)->delete();
                    ItemCoupon::whereNotIn('item_id',  $rq->items)->where('coupon_id', $coupon->id)->delete();
                    foreach ( $rq->items as $id_){
                        $productCoupon = new ItemCoupon();
                        $productCoupon->item_id = $id_;
                        $productCoupon->coupon_id = $coupon->id;
                        $productCoupon->save();
                    }
                }
                else{
                    $coupon_ = Coupon::join('item_coupons', 'coupons.id', '=', 'item_coupons.coupon_id')
                        ->where('type_coupon', 'categories')->whereDate('date_end', '>', Carbon::now())->whereIn('cate_id', $rq->items)->where('coupon_id', '!=', $coupon->id)->get()->pluck('cate_id');
                    ItemCoupon::whereIn('cate_id', $coupon_)->delete();
                    ItemCoupon::whereNotIn('cate_id',  $rq->items)->where('coupon_id', $coupon->id)->delete();
                    foreach ( $rq->items as $id_){
                        $productCoupon = new ItemCoupon();
                        $productCoupon->cate_id = $id_;
                        $productCoupon->coupon_id = $coupon->id;
                        $productCoupon->save();
                    }
                }
            }
            Log::pushLog('Update Counpons ID: ' .$coupon->id);
            return response()->json([
                'type' => 'update',
                'success' => true,
                'message' => __('Update') . ' ' . __('Coupons') . ' '. __('success') . ' !'
            ]);
        }
        else{
            return response()->json([
                'type' =>'update',
                'success' => false,
                'messages' => $check->errors(),
                'message' => __('Update') . ' ' . __('Coupons') . ' '. __('error') . ' !'
            ]);
        }
    }

    public function delete(Request $rq, $id){
        if ($id){
            $currentPage = (int)$rq->page;
            $coupon = Coupon::find($id);
            $coupon->delete();
            ItemCoupon::where('coupon_id', $id)->delete();
            Log::pushLog('Delete Counpons ID: ' .$id);
            $getTatalPage = Coupon::orderBy('id')->paginate($rq->pagenum)->lastPage();
            if ($rq->search != '' ){
                $getTatalPage = Coupon::where('name', 'like', '%'.$rq->search.'%')
                    ->orwhere('description', 'like', '%'.$rq->search.'%')->orderBy('id')->paginate($rq->pagenum)->lastPage();
                if ($currentPage > $getTatalPage -1){
                    Paginator::currentPageResolver(function () use ($getTatalPage) {
                        return $getTatalPage;
                    });
                }
                $coupons = Coupon::where('name', 'like', '%'.$rq->search.'%')
                    ->orwhere('description', 'like', '%'.$rq->search.'%')->orderBy('id')->paginate($rq->pagenum);
            }
            else{
                if ($currentPage > $getTatalPage -1){
                    Paginator::currentPageResolver(function () use ($getTatalPage ) {
                        return $getTatalPage;
                    });
                }
                $coupons = Coupon::orderBy('id', 'desc')->paginate($rq->pagenum);
            }
            return response()->json([
                'success' => true,
                'message' => __('Delete') . ' ' . __('Coupons') .   ' ID '. $id .' ' . __('success') . ' !',
                'messages' => view('pages.coupons.ajax-filter')->with('coupons', $coupons)->render()
            ]);
        }
    }

    public function switchAjax($id){
        $coupon = Coupon::find($id);
        if($coupon->status == 0){
            $coupon->status = 1;
        }
        else{
            $coupon->status = 0;
        }
        $coupon->save();
        Log::pushLog('Update Counpons ID: ' .$coupon->id);
        return response()->json([
            'np_' => $coupon->status,
            'message' =>__('Update') . ' ' . __('Status') . ' '. __('success') . ' !'
        ]);
    }

}
