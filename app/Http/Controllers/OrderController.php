<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Coupon;
use App\Models\Log;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PrdetailAttvalue;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Validator;

class OrderController extends Controller
{

    public function index(Request $rq)
    {
        $numpage = 10;
        $breadcrumb = [
            ['link' => '/', 'name' => __('Home')],
            ['link' => 'javascript:void()', 'name' => __('Order')],
        ];
        if ($rq->ajax()) {
            $rq->pagenum ? $numpage = $rq->pagenum : $numpage;
            if ($rq->search) {
                $userId = User::where('name', 'like', '%' . $rq->search . '%')->pluck('id');
                $orders = Order::where('order_code', 'like', '%' . $rq->search . '%')
                    ->orwhereIn('customer_id', $userId)->orwhereIn('user_id', $userId)
                    ->orderBy('id', 'desc')->paginate($numpage);
            } else {
                $orders = Order::orderBy('id', 'desc')->paginate($numpage);
            }
            return view('pages.orders.ajax-filter')->with('orders', $orders)->render();
        } else {
            $orders = Order::orderBy('id', 'desc')->paginate($numpage);
            return view('pages.orders.index', compact('orders', 'breadcrumb'));
        }
    }

    public function discountStatus($discount, $total)
    {
        $daynow = Carbon::now();
        $flag = false;
        switch ($discount) {
            case ($discount->date_start != null && $discount->date_start > $daynow) :
                return [$flag, __('Code not activated')];
            case  ($discount->date_end != null && $discount->date_end < $daynow->subDay(1)):
                return [$flag, __('Code has expired')];
            case ($discount->amount_code == 0):
                return [$flag, __('Code has 0 uses left')];
            case ($discount->total_order_min != null && $discount->total_order_min > $total):
                return [$flag, __('Code only applies to orders over: ') . number_format($discount->total_order_min, 0, 0, '.') . ' VNĐ'];
            case ($discount->price_order_max != null && $discount->price_order_max < $total):
                return [$flag, __('Code only applies to orders under: ') . number_format($discount->price_order_max, 0, 0, '.') . ' VNĐ'];
            default:
                $flag = true;
                return [$flag, __('Use code successfully')];
        }
    }

    public function sumTotal($q)
    {
        $total = 0;
        if (isset($q)) {
            foreach ($q as $rf) {
                $product = ProductDetail::find($rf['product_detail_id']);
                if ($product && isset($rf['quantity'])) {
                    if ($rf['quantity'] > $product->sub_quantity){
                        $rf['quantity'] = $product->sub_quantity;
                    }
                    $getSell = Coupon::getSaleProduct($product->id);
                    if ($getSell > 0 && $getSell < $product->price) {
                        $total += $getSell * $rf['quantity'];
                    } else {
                        $total += $product->price * $rf['quantity'];
                    }
                }
            }
        }
        return $total;
    }

    function replaceItems($items)
    {
        $newItems = [];
        if (isset($items['invoice'])) {
            foreach ($items['invoice'] as $item) {
                if (!isset($newItems[$item['product_detail_id']])) {
                    $newItems[$item['product_detail_id']] = $item;
                } else {
                    if (isset($item['quantity'])){
                        $newItems[$item['product_detail_id']]['quantity'] += $item['quantity'];
                    }
                }
            }
        }
        return array_values($newItems);
    }

    public function handleTotal(Request $rq, $type = '')
    {
        $items = $this->replaceItems($rq->all());
        $message = [false, ''];
        $subTotal = $this->sumTotal($items);
        $discountTotal = 0;
        $discount_code = '';
        $total = $subTotal;
        $discountText = '';
        if ($rq->discount != 'undefined') {
            $discount = Coupon::whereNotNull('code')->where('code', $rq->discount)->where('status', 1)->first();
            if (!$discount) {
                $message = [false, __('Code does not exist')];
            } else {
                $discount_code = $discount->code;
                $getFlag = $this->discountStatus($discount, $subTotal);
                $message = $getFlag;
                if ($getFlag[0] == true) {
                    if ($discount->type == 'percent price') {
                        $discountTotal = ($discount->price_value * $total) / 100;
                        $discountText = $discount->price_value . ' %';
                    } else {
                        $discountTotal = $discount->price_value;
                        $discountText = number_format($discount->price_value, 0, 0, '.') . ' VNĐ';
                    }
                    $total = $subTotal - $discountTotal;
                }
            }
        }
        if ($type == 'save') {
            return [$total, $subTotal];
        }
        return view('pages.coupons.ajax.check-discount')->with('total', $total)
            ->with('message', $message)->with('subtotal', $subTotal)->with('discountText', $discountText)
            ->with('distotal', $discountTotal)->with('discount_code', $discount_code)->render();
    }

    public function add(Request $rq)
    {
        $breadcrumb = [
            ['link' => '/', 'name' => __('Home')],
            ['link' => route('index-orders'), 'name' => __('Orders')],
            ['link' => 'javascript:void()', 'name' => __('Add Order')]
        ];
        if ($rq->ajax()) {
            if ($rq->type == 1) {
                if ($rq->customer) {
                    $customers = User::where('status', 1)->where('name', 'like', '%' . $rq->customer . '%')->orderBy('id', 'desc')->select('name', 'id')->limit(5)->get();
                } else {
                    $customers = User::where('status', 1)->orderBy('id', 'desc')->select('name', 'id')->limit(10)->get();
                }
                return response()->json(
                    $customers
                );
            }
            if ($rq->type == 2) {
                if ($rq->product) {
                    $product = Product::where('status', 1)->where('title', 'like', '%' . $rq->product . '%')->orwhere('sku', 'like', '%' . $rq->product . '%')->orderBy('id', 'desc')->select('title', 'id')->limit(5)->get();
                } else {
                    $product = Product::where('status', 1)->orderBy('id', 'desc')->select('title', 'id')->limit(10)->get();
                }
                return response()->json(
                    $product
                );
            }
            if ($rq->attrName) {
                $attrName = $rq->attrName;
                $attrValue = $rq->attrValue;
                $productDetailId = ProductDetail::where('product_id', $rq->product_id)->get()->pluck('id')->toArray();
                $ids = [];
                foreach ($productDetailId as $pr) {
                    $productIds = PrdetailAttvalue::where('product_detail_id', $pr)->where(function ($query) use ($attrName, $attrValue) {
                        foreach ($attrName as $key => $val) {
                            if ($key == 0) {
                                $query->where('attribute_id', $val)->where('attribute_value_id', $attrValue[$key]);
                            } else {
                                $query->orwhere('attribute_id', $val)->where('attribute_value_id', $attrValue[$key]);
                            }
                        }
                    })->get();
                    if (count($productIds) == count($attrName)) {
                        $ids = $productIds->unique('product_detail_id')->pluck('product_detail_id')->toArray();
                    }
                }
                if ($ids != []) {
                    if ($rq->product_detail_id == $ids[0]) {
                        return [];
                    }
                    $getPrDetail = ProductDetail::where('status', 1)->where('id', $ids[0])->first();
                    return view('pages.orders.ajax.views')->with('views', $getPrDetail)->render();
                } else {
                    if ($rq->product_detail_id == -1) {
                        return [];
                    }
                    $view = '<div class="alert alert-danger" role="alert" id="pr" data-pr-detail="-1">
                                          ' . __('Product is not value') . '
                                    </div>';
                }
                return response()->json($view);
            }
            if ($rq->id) {
                $product = Product::find($rq->id);
                $getPrDetail = $product->productDetail()->where('is_default', 1)->first();
                $html = view('pages.orders.ajax.lists')->with('product', $product)->render();
                $view = view('pages.orders.ajax.views')->with('views', $getPrDetail)->render();
                return response()->json([
                    $html,
                    $view
                ]);
            }
        }
        return view('pages.orders.add', compact('breadcrumb'));
    }

    public function saveAdd(Request $rq)
    {
        $rules = [
            'customer' => 'required',
            'invoice.*.product' => 'required',
            'invoice.*.quantity' => 'required|numeric|min:1',
            'invoice.*.product_detail_id' => 'gt:0',
        ];
        $messages = Helpers::switchLanguage(session()->get('locale'));
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()) {
            $items = $this->replaceItems($rq->all());
            if ($rq->discount != 'undefined') {
                $getTotalAll = $this->handleTotal($rq, 'save');
                $total = $getTotalAll[0];
                $subtotal = $getTotalAll[1];
            } else {
                $total = $this->sumTotal($items);
                $subtotal = $total;
            }

            $order_code = "RTX-" . Carbon::now()->timestamp . '-' . str_replace(".", '', $rq->ip());
            $order = new Order();
            $order->order_code = $order_code;
            $order->user_id = Auth::user()->id;
            $order->customer_id = $rq->customer;
            $order->order_date = Carbon::now();
            $order->sub_total = $subtotal;
            $order->total = $total;
            $order->payment_method = $rq->payment_methods;
            $order->messages = $rq->messages;
            $order->payment_status = $rq->payment_status;
            $order->save();
            foreach ($items as $rf) {
                $product = ProductDetail::find($rf['product_detail_id']);
                $getSell = Coupon::getSaleProduct($product->id);
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $product->id;
                $orderDetail->sub_price = $getSell;
                $orderDetail->price = $product->price;
                $orderDetail->quantity = $rf['quantity'];
                $orderDetail->save();
                $product->sub_quantity = $product->sub_quantity - $rf['quantity'];
                $product->save();
            }
            if ($rq->discount != 'undefined') {
                $discount = Coupon::whereNotNull('code')->where('code', $rq->discount)->where('status', 1)->first();
                if ($discount->amount_code != null && $discount->amount_code > 0) {
                    $discount->amount_code -= 1;
                    $discount->save();
                }
            }
            Log::pushLog('Add Orders ID: ' . $order->id);
            return response()->json([
                'type' => 'insert',
                'success' => true,
                'message' => __('Add') . ' ' . __('Order') . ' ' . __('success') . ' !'
            ]);
        } else {
            return response()->json([
                'type' => 'insert',
                'success' => false,
                'messages' => $check->errors(),
                'message' => __('Add') . ' ' . __('Order') . ' ' . __('error') . ' !'
            ]);
        }

    }

    public function update(Request $rq, $id)
    {
        $breadcrumb = [
            ['link' => '/', 'name' => __('Home')],
            ['link' => route('index-orders'), 'name' => __('Orders')],
            ['link' => 'javascript:void()', 'name' => __('Update Order')]
        ];
        $order = Order::find($id);
        $orderDetails = OrderDetail::where('order_id', $id)->get();
        if ($rq->ajax()) {
            if ($rq->type == 1) {
                if ($rq->customer) {
                    $customers = User::where('name', 'like', '%' . $rq->customer . '%')->orderBy('id', 'desc')->select('name', 'id')->limit(5)->get();
                } else {
                    $customers = User::orderBy('id', 'desc')->select('name', 'id')->limit(10)->get();
                }
                return response()->json(
                    $customers
                );
            }
            if ($rq->type == 2) {
                if ($rq->product) {
                    $product = Product::where('title', 'like', '%' . $rq->product . '%')->orwhere('sku', 'like', '%' . $rq->product . '%')->orderBy('id', 'desc')->select('title', 'id')->limit(5)->get();
                } else {
                    $product = Product::orderBy('id', 'desc')->select('title', 'id')->limit(10)->get();
                }
                return response()->json(
                    $product
                );
            }
            if ($rq->attrName) {
                $attrName = $rq->attrName;
                $attrValue = $rq->attrValue;
                $productDetailId = ProductDetail::where('product_id', $rq->product_id)->get()->pluck('id')->toArray();
                $ids = [];
                foreach ($productDetailId as $pr) {
                    $productIds = PrdetailAttvalue::where('product_detail_id', $pr)->where(function ($query) use ($attrName, $attrValue) {
                        foreach ($attrName as $key => $val) {
                            if ($key == 0) {
                                $query->where('attribute_id', $val)->where('attribute_value_id', $attrValue[$key]);
                            } else {
                                $query->orwhere('attribute_id', $val)->where('attribute_value_id', $attrValue[$key]);
                            }
                        }
                    })->get();
                    if (count($productIds) == count($attrName)) {
                        $ids = $productIds->unique('product_detail_id')->pluck('product_detail_id')->toArray();
                    }
                }
                if ($ids != []) {
                    if ($rq->product_detail_id == $ids[0]) {
                        return [];
                    }
                    $getPrDetail = ProductDetail::find($ids[0]);
                    $view = '
                        <div class="card m-0" id="pr" data-pr-detail="' . $getPrDetail->id . '">
                            <div class="card-body p-0">
                                <div class="row">
                                <div class="col-md-5">
                                    <img  src="' . asset('storage/' . $getPrDetail->photo_thumb) . '" class="img-fluid photo_thumb" alt="">
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <p class="col-5 m-0"">' . __('Cost') . '</p>
                                            <span class="item-price col-7 cost">' . number_format($getPrDetail->cos, 0, 0, '.') . ' VND</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <p class="col-5 m-0">' . __('Quantity') . '</p>
                                            <span class="item-price col-7 quantity">' . number_format($getPrDetail->quantity, 0, 0, '.') . ' DV</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <p class="col-5 m-0">' . __('Sub quantity') . '</p>
                                            <span class="item-price col-7 sub_quantity">' . number_format($getPrDetail->sub_quantity, 0, 0, '.') . ' DV</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <p class="col-5 m-0">' . __('Price') . '</p>
                                            <span class="item-price col-7 price">' . number_format($getPrDetail->price, 0, 0, '.') . ' VND</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <p class="col-5 m-0">' . __('Sell price') . '</p>
                                            <span class="item-price col-7 sell_price" price-default="' . $getPrDetail->sell_price . '">' . number_format($getPrDetail->sell_price, 0, 0, '.') . ' VND</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                        </div>
                    </div>
               ';
                } else {
                    if ($rq->product_detail_id == -1) {
                        return [];
                    }
                    $view = '<div class="alert alert-danger" role="alert" id="pr" data-pr-detail="-1">
                                          ' . __('Product is not value') . '
                                    </div>';
                }
                return response()->json($view);
            }
            if ($rq->id) {
                $product = Product::find($rq->id);
                $getPrDetail = $product->productDetail()->where('is_default', 1)->first();
                $view = '
                        <div class="card m-0" id="pr" data-pr-detail="' . $getPrDetail->id . '">
                            <div class="card-body p-0">
                                <div class="row">
                                <div class="col-md-5">
                                    <img  src="' . asset('storage/' . $getPrDetail->photo_thumb) . '" class="img-fluid photo_thumb" alt="">
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <p class="col-5 m-0">' . __('Cost') . '</p>
                                            <span class="item-price col-7 cost">' . number_format($getPrDetail->cos, 0, 0, '.') . ' VND</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <p class="col-5 m-0">' . __('Quantity') . '</p>
                                            <span class="item-price col-7 quantity">' . number_format($getPrDetail->quantity, 0, 0, '.') . ' DV</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <p class="col-5 m-0">' . __('Sub quantity') . '</p>
                                            <span class="item-price col-7 sub_quantity">' . number_format($getPrDetail->sub_quantity, 0, 0, '.') . ' DV</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <p class="col-5 m-0">' . __('Price') . '</p>
                                            <span class="item-price col-7 price">' . number_format($getPrDetail->price, 0, 0, '.') . ' VND</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <p class="col-5 m-0">' . __('Sell price') . '</p>
                                            <span class="item-price col-7 sell_price" price-default="' . $getPrDetail->sell_price . '">' . number_format($getPrDetail->sell_price, 0, 0, '.') . ' VND</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                        </div>
                    </div>
               ';
                $html = '<div class="mb-2"><div data-pr="' . $product->id . '" class="product-color-options mt-0 mb-0" name="kl">';
                foreach ($product->productAttributes as $at) {
                    if (count($at->attrbuteValues()) > 0) {
                        $html .= '<h6>' . mb_strtoupper($at->attributes->name) . '</h6>';
                    } else {
                        $html = '<div><div data-pr-detail="0" class="product-color-options mt-0 mb-0">';
                    }
                    $html .= '<ul class="list-unstyled mb-0">';
                    foreach ($at->attrbuteValues() as $af) {
                        if (isset($af)) {
                            $selected = '';
                            if ($at->productDetailDefault() != null and $at->productDetailDefault()->attribute_value_id == $af->id) {
                                $selected = 'selected';
                            }
                            if ($at->attributes->name == 'color' || $at->attributes->name == 'colors') {
                                $html .= '<li data-id="' . $af->id . '" data-attribute="' . $at->attributes->id . '" class="d-inline-block ' . $selected . '">
                                               <div class="color-option b-' . $af->value . '">
                                                    <div class="filloption bg-' . $af->value . '"></div>
                                                </div>
                                        </li>';
                            } else {
                                $html .= '<li data-id="' . $af->id . '" data-attribute="' . $at->attributes->id . '" class="d-inline-block ' . $selected . '">
                                            <div class="color-option b-violet">
                                                <div class="filloption bg-violet text-center nj">
                                                    <span>' . $af->value . '</span>
                                                </div>
                                            </div>
                                        </li>';
                            }
                        }
                    }
                    $html .= '</ul>';
                }
                $html .= '</div></div>';
                return response()->json([
                    $html,
                    $view
                ]);
            }
        }
        return view('pages.orders.edit', compact('orderDetails', 'order', 'breadcrumb'));
    }

    public function saveUpdate(Request $rq)
    {
        dd($rq->all());
        $rules = [
            'customer' => 'required',
            'invoice.*.product' => 'required'
        ];
        $messages = Helpers::switchLanguage('vi');
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()) {
            $order = Order::find($rq->order_id);
            $order->user_id = 1;
            $order->customer_id = $rq->customer;
            $order->order_date = Carbon::now();
            $order->sub_total = 0;
            $order->total = 0;
            $order->payment_method = $rq->payment_methods;
            $order->messages = $rq->messages;
            $order->coupon = '';
            $order->payment_status = $rq->payment_status;
            $order->save();
            $total = 0;
            foreach ($rq->invoice as $rf) {
                if (!isset($rf['order_detail_id'])) {
                    $orderDetail = new OrderDetail();
                } else {
                    $orderDetail = OrderDetail::find($rf['order_detail_id']);
                }
                $product = ProductDetail::find($rf['product_detail_id']);
                $total += $product->sell_price * $rf['quantity'];
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $product->id;
                $orderDetail->sub_price = $product->price;
                $orderDetail->price = $product->price;
                $orderDetail->quantity = $rf['quantity'];
                $orderDetail->coupon = 0;
                $orderDetail->sku_item = $product->sku;
                $orderDetail->save();
                $product->sub_quantity = $product->sub_quantity - $rf['quantity'];
                $product->save();
            }
            $coup = '';
            $subtotal = $total;
            if ($rq->coupon) {
                $mess = $this->checkCoupon($rq->coupon, $total);
                $coup = $mess[0];
                $subtotal = $mess[1];
                $order->coupon = $mess[2];
            }
            $order->sub_total = $subtotal;
            $order->total = $total;
            $order->save();
            return response()->json([
                'type' => 'insert',
                'success' => true,
                'messcoupon' => $coup,
                'message' => __('Add order success')
            ]);
        } else {
            return response()->json([
                'type' => 'insert',
                'success' => false,
                'messages' => $check->errors(),
                'message' => __('Add order error')
            ]);
        }
    }

    public function delete(Request $rq, $id)
    {
        if ($id) {
            $currentPage = (int)$rq->page;
            $order = Order::find($id);
            $orderDetails = OrderDetail::where('order_id', $order->id);
            foreach ($orderDetails->get() as $item) {
                $product = ProductDetail::find($item->product_id);
                $product->sub_quantity += $item->quantity;
                $product->save();
            }
            $orderDetails->delete();
            $order->delete();
            Log::pushLog('Delete Orders ID: ' . $id);
            $getTatalPage = Order::orderBy('id')->paginate($rq->pagenum)->lastPage();
            if ($rq->search != '') {
                $getTatalPage = Order::where('order_code', 'like', '%' . $rq->search . '%')
                    ->orderBy('id')->paginate($rq->pagenum)->lastPage();
                if ($currentPage > $getTatalPage - 1) {
                    Paginator::currentPageResolver(function () use ($getTatalPage) {
                        return $getTatalPage;
                    });
                }
                $orders = Order::where('order_code', 'like', '%' . $rq->search . '%')
                    ->orderBy('id')->paginate($rq->pagenum);
            } else {
                if ($currentPage > $getTatalPage - 1) {
                    Paginator::currentPageResolver(function () use ($getTatalPage) {
                        return $getTatalPage;
                    });
                }
                $orders = Order::orderBy('id', 'desc')->paginate($rq->pagenum);
            }
            return response()->json([
                'success' => true,
                'message' => __('Delete') . ' ' . __('Order') . ' ID ' . $id . ' ' . __('success'),
                'messages' => view('pages.orders.ajax-filter')->with('orders', $orders)->render()
            ]);
        }
    }

    public function updateStatus(Request $rq)
    {
        if ($rq->id) {
            $order = Order::find($rq->id);
            if ($order->user_id == null){
                $order->user_id = Auth::user()->id;
            }
            $order->payment_status = $rq->value ? $rq->value : $order->payment_status;
            $order->status_method = $rq->value1 ? $rq->value1 : $order->status_method;
            $order->save();
            return response()->json([
                'message' => __('Update') . ' ' . __('Status') . ' ' . __('success') . ' !'
            ]);
        }
    }
}
