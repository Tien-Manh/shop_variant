<?php

namespace App\Http\Controllers\Fronts;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cate;
use App\Models\Comment;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Post;
use App\Models\PrdetailAttvalue;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\User;
use App\Models\UserShip;
use App\Models\WishList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Validator;

class ProductShopController extends Controller
{
    public function index(Request $rq)
    {
        $products = Product::where('status', 1)->orderBy('id', 'desc')->paginate(12);
        $posts = Post::whereHas('cates', function ($query) {
            $query->where('type', 'cate post');
        })->where('status', 1)->orderBy('id', 'desc')->inRandomOrder()->limit(3)->get();
        if ($rq->ajax()) {
            if ($rq->attrValue) {
                $id = PrdetailAttvalue::where('attribute_id', $rq->attrId)->where('attribute_value_id', $rq->attrValue)->pluck('product_detail_id')->toArray();
                $product = Product::find($rq->productId);
                $productDetail = ProductDetail::whereIn('id', $id)->where('product_id', $rq->productId)->first();
                return view('pages-front.shops.box-ajax')
                    ->with('productDetail', $productDetail)
                    ->with('product', $product)->render();
            }
            if ($rq->filter == true) {
                $products = Product::where(function ($query) use ($rq) {
                    if ($rq->keySearch != null) {
                        $query->where('title', 'like', '%' . $rq->keySearch . '%');
                    }
                    if ($rq->priceStart != null && $rq->priceEnd != null) {
                        $query->whereHas('productDetail', function ($query) use ($rq) {
                            if ($rq->priceEnd == 0) {
                                $query->whereBetween('price', [$rq->priceStart, ProductDetail::max('price')]);
                            } else {
                                $query->whereBetween('price', [$rq->priceStart, $rq->priceEnd]);
                            }
                        });
                    }
                    if ($rq->size != null) {
                        $query->whereHas('productDetail', function ($query) use ($rq) {
                            $query->whereHas('attributeValues', function ($query) use ($rq) {
                                $query->where('attribute_value_id', $rq->size);
                            });
                        });
                    }
                    if ($rq->color != null) {
                        $query->whereHas('productDetail', function ($query) use ($rq) {
                            $query->whereHas('attributeValues', function ($query) use ($rq) {
                                $query->where('attribute_value_id', $rq->color);
                            });
                        });
                    }
                })->where('status', 1)->orderBy('id', 'desc')->paginate(12);
                return view('pages-front.shops.ajax-index', compact('products'))->render();
            }
        }
        return view('pages-front.shops.index', compact('products', 'posts'));
    }

    public function cateProducts(Request $rq, $slug)
    {
        $cate = Cate::where('type', 'cate product')->where('slug', $slug)->first();
        if (!$cate) {
            return view('pages-front.errors.error-not-found');
        }
        if ($rq->ajax()){
            if ($rq->filter == true) {
                $products = Product::whereHas('cates', function ($query) use ($cate){
                    $query->where('cate_id', $cate->id);
                })->where(function ($query) use ($rq) {
                    if ($rq->keySearch != null) {
                        $query->where('title', 'like', '%' . $rq->keySearch . '%');
                    }
                    if ($rq->priceStart != null && $rq->priceEnd != null) {
                        $query->whereHas('productDetail', function ($query) use ($rq) {
                            if ($rq->priceEnd == 0) {
                                $query->whereBetween('price', [$rq->priceStart, ProductDetail::max('price')]);
                            } else {
                                $query->whereBetween('price', [$rq->priceStart, $rq->priceEnd]);
                            }
                        });
                    }
                    if ($rq->size != null) {
                        $query->whereHas('productDetail', function ($query) use ($rq) {
                            $query->whereHas('attributeValues', function ($query) use ($rq) {
                                $query->where('attribute_value_id', $rq->size);
                            });
                        });
                    }
                    if ($rq->color != null) {
                        $query->whereHas('productDetail', function ($query) use ($rq) {
                            $query->whereHas('attributeValues', function ($query) use ($rq) {
                                $query->where('attribute_value_id', $rq->color);
                            });
                        });
                    }
                })->where('status', 1)->orderBy('id', 'desc')->paginate(12);
                return view('pages-front.shops.ajax-index', compact('products'))->render();
            }
        }
        $posts = Post::whereHas('cates', function ($query) {
            $query->where('type', 'cate post');
        })->where('status', 1)->inRandomOrder()->limit(3)->get();
        $products = Product::whereHas('cates', function ($query) use ($cate){
            $query->where('cate_id', $cate->id);
        })->where('status', 1)->orderBy('id', 'desc')->paginate(12);
        return view('pages-front.shops.index', compact('products', 'posts'));
    }

    public function brandProducts(Request $rq, $slug)
    {
        $brand = Brand::where('slug', $slug)->first();
        if (!$brand) {
            return view('pages-front.errors.error-not-found');
        }
        if ($rq->ajax()){
            if ($rq->filter == true) {
                $products = Product::where('brand_id', $brand->id)
                    ->where(function ($query) use ($rq) {
                    if ($rq->keySearch != null) {
                        $query->where('title', 'like', '%' . $rq->keySearch . '%');
                    }
                    if ($rq->priceStart != null && $rq->priceEnd != null) {
                        $query->whereHas('productDetail', function ($query) use ($rq) {
                            if ($rq->priceEnd == 0) {
                                $query->whereBetween('price', [$rq->priceStart, ProductDetail::max('price')]);
                            } else {
                                $query->whereBetween('price', [$rq->priceStart, $rq->priceEnd]);
                            }
                        });
                    }
                    if ($rq->size != null) {
                        $query->whereHas('productDetail', function ($query) use ($rq) {
                            $query->whereHas('attributeValues', function ($query) use ($rq) {
                                $query->where('attribute_value_id', $rq->size);
                            });
                        });
                    }
                    if ($rq->color != null) {
                        $query->whereHas('productDetail', function ($query) use ($rq) {
                            $query->whereHas('attributeValues', function ($query) use ($rq) {
                                $query->where('attribute_value_id', $rq->color);
                            });
                        });
                    }
                })->where('status', 1)->orderBy('id', 'desc')->paginate(12);
                return view('pages-front.shops.ajax-index', compact('products'))->render();
            }
        }
        $posts = Post::whereHas('cates', function ($query) {
            $query->where('type', 'cate post');
        })->where('status', 1)->inRandomOrder()->limit(3)->get();
        $products = Product::where('status', 1)->where('brand_id', $brand->id)->orderBy('id', 'desc')->paginate(12);
        return view('pages-front.shops.index', compact('products', 'posts'));
    }

    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (!$product) {
            return view('pages-front.errors.error-not-found');
        }
        $relatedProduct = Product::where('status', 1)->where('id', '!=', $product->id)->inRandomOrder()->limit(4)->get();
        return view('pages-front.shops.index-detail', compact('product', 'relatedProduct'));
    }

    public function blogs()
    {
        $blogs = Post::whereHas('cates', function ($query) {
            $query->where('type', 'cate post');
        })->where('status', 1)->orderBy('id', 'desc')->paginate(9);
        return view('pages-front.blogs.index', compact('blogs'));
    }

    public function postFaq($slug)
    {
        $blog = Post::where('slug', $slug)->first();
        if (!$blog) {
            return view('pages-front.errors.error-not-found');
        }
        return view('pages-front.blogs.faq', compact('blog'));
    }

    public function blogDetail($slug)
    {
        $blog = Post::where('slug', $slug)->first();
        if (!$blog) {
            return view('pages-front.errors.error-not-found');
        }
        $comments = Comment::where('post_id', $blog->id)->get();
        $blog->increment('views');
        $nextBlog = Post::whereHas('cates', function ($query) {
            $query->where('type', 'cate_post');
        })->where('id', '>', $blog->id)->first();
        $prevBlog = Post::whereHas('cates', function ($query) {
            $query->where('type', 'cate post');
        })->where('status', 1)->where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
        if (!$nextBlog) {
            $nextBlog = Post::whereHas('cates', function ($query) {
                $query->where('type', 'cate post');
            })->where('status', 1)->first();
        }
        if (!$prevBlog) {
            $prevBlog = Post::whereHas('cates', function ($query) {
                $query->where('type', 'cate post');
            })->where('status', 1)->orderBy('id', 'desc')->first();
        }
        return view('pages-front.blogs.detail', compact('blog', 'nextBlog', 'prevBlog', 'comments'));
    }

    public function pickChoze(Request $rq)
    {
        $attrName = $rq->attrId;
        $attrValue = $rq->attrValue;
        $productDetailId = ProductDetail::where('product_id', $rq->productId)->get()->pluck('id')->toArray();
        $ids = [-1];
        foreach ($productDetailId as $pr) {
            $productIds = PrdetailAttvalue::where(function ($query) use ($attrName, $attrValue, $pr) {
                foreach ($attrName as $key => $val) {
                    if ($key == 0) {
                        $query->where('attribute_id', $val)->where('attribute_value_id', $attrValue[$key])->where('product_detail_id', $pr);
                    } else {
                        $query->orwhere('attribute_id', $val)->where('attribute_value_id', $attrValue[$key])->where('product_detail_id', $pr);
                    }
                }
            })->get();
            if (count($productIds) == count($attrName)) {
                $ids = $productIds->unique('product_detail_id')->pluck('product_detail_id')->toArray();
                break;
            }
        }
        $getPrDetail = ProductDetail::where('status', 1)->where('id', $ids[0])->first();
        $flag = false;
        if (Auth::user()){
            $getwishList = WishList::where('product_id', $getPrDetail->id)->where('user_id', Auth::user()->id)->first();
            if ($getwishList){
                $flag = true;
            }
        }
        if ($getPrDetail) {
            $getPriceSell = Coupon::getSaleProduct($getPrDetail->id);
            $getPrDetail->sell_price = number_format($getPriceSell, 0, 0, '.');
            $getPrDetail->price = number_format($getPrDetail->price, 0, 0, '.');
            $getPrDetail->photo_thumb = asset('storage/' . $getPrDetail->photo_thumb);
            $getPrDetail->add_cart = route('add.cart', [$getPrDetail->id]);
            return response()->json([
                'message' => __('Out of stock'),
                'product' => $getPrDetail->toArray(),
                'getwishList' => $flag
            ]);
        } else {
            return response()->json([
                'message' => __('Out of stock')
            ]);
        }
    }

    public function discountStatus($discount)
    {
        $total = $this->getSumPrice();
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

    public function getDiscountTotal($discoun)
    {
        $total = $this->getSumPrice();
        if (!$discoun) {
            $message = [false, __('Code does not exist')];
        } else {
            $message = $this->discountStatus($discoun);
        }
        if ($discoun->type == 'percent price') {
            $discountTotal = ($discoun->price_value * $total) / 100;
            $discountText = $discoun->price_value . ' %';
        } else {
            $discountTotal = $discoun->price_value;
            $discountText = number_format($discoun->price_value, 0, 0, '.') . ' VNĐ';
        }
        $total = $total - $discountTotal;
        return collect([
            'total' => $total,
            'discountText' => $discountText,
            'message' => $message
        ]);
    }

    public function showCart(Request $rq)
    {
        $carts = session()->get('cartShop');
        $coucode = session()->get('discount');
        if ($rq->ajax()) {
            $subTotal = $this->getSumPrice();
            $total = $subTotal;
            if ($rq->discoun) {
                $discoun = Coupon::whereNotNull('code')->where('code', $rq->discoun)->where('status', 1)->first();
                $discountText = '';
                $message = $this->getDiscountTotal($discoun)->get('message');
                if ($message[0] == true) {
                    $total = $this->getDiscountTotal($discoun)->get('total');
                    $discountText = $this->getDiscountTotal($discoun)->get('discountText');
                    session()->put('discount', $discoun->code);
                    session()->save();
                }
                $html = '<span class="text-success">' . __($message[1]) . ': ' . $discountText . '</span>
                                       <i style="cursor: pointer; width: 20px; height: 20px; background-color: #111111; color: white; border-radius: 50%;
                                       text-align: center; line-height: 20px; float: right" class="fa fa-close code-rm"></i>';
                if ($message[0] == false) {
                    $html = '<span class="text-danger">' . __($message[1]) . '</span>';
                }
                return response()->json([
                    'flag' => $message[0],
                    'message' => $html,
                    'total' => number_format($total, 0, 0, '.') . ' VNĐ',
                    'subTotal' => number_format($subTotal, 0, 0, '.') . ' VNĐ'
                ]);
            } else {
                session()->pull('discount');
                session()->save();
                return response()->json([
                    'total' => number_format($total, 0, 0, '.') . ' VNĐ',
                    'subTotal' => number_format($subTotal, 0, 0, '.') . ' VNĐ'
                ]);
            }
        }
        return view('pages-front.carts.index', compact('carts', 'coucode'));
    }

    public function updateCart(Request $rq)
    {
        $getCart = session()->get('cartShop');
        foreach ($getCart as $key => $item) {
            if ($rq->data[$key]['quantity'] == 0) {
                unset($getCart[$key]);
            } else {
                $getCart[$key]['quantity'] = $rq->data[$key]['quantity'];
            }
            $sortCart = array_values($getCart);
        }
        session()->put('cartShop', $sortCart);
        session()->save();
        return response()->json();
    }

    public function checkOut(Request $rq)
    {
        $getPriceCurr = Http::get('https://free.currconv.com/api/v7/convert?q=USD_VND&compact=ultra&apiKey=1b6d379ff4defc72f6fa');
        $getCurrenly = filter_var($getPriceCurr->body(), FILTER_SANITIZE_NUMBER_INT);
        $userAdress = [];
        if (Auth::user()) {
            $userAdress = UserShip::where('user_id', Auth::user()->id)->get();
        }
        $discount_code = session()->get('discount');
        $carts = session()->get('cartShop');
        $subTotal = $this->getSumPrice();
        $total = $subTotal;
        $html = '';
        if (isset($discount_code)) {
            $discoun = Coupon::whereNotNull('code')->where('code', $discount_code)->where('status', 1)->first();
            $message = $this->getDiscountTotal($discoun)->get('message');
            $discountText = '';
            if ($message[0] == true) {
                $total = $this->getDiscountTotal($discoun)->get('total');
                $discountText = $this->getDiscountTotal($discoun)->get('discountText');
            }
            $html = '
            <span class="text-success">' . __($message[1]) . ': ' . $discountText . '</span>';
            if ($message[0] == false) {
                $html = '
            <span class="text-danger">' . __($message[1]) . '</span>';
            }
        }
        $total_pay = number_format(($total / $getCurrenly), 2, '.', '');
        $sub_total_pay = number_format(($subTotal / $getCurrenly), 2, '.', '');
        return view('pages-front.carts.checkout', compact('carts', 'html', 'total', 'subTotal', 'userAdress', 'total_pay', 'sub_total_pay'));
    }

    public function checkOutSave(Request $rq)
    {
        $getCart = session()->get('cartShop');
        $discount_code = session()->get('discount');
        $subTotal = $this->getSumPrice();
        $total = $subTotal;
        if (isset($discount_code)) {
            $discoun = Coupon::whereNotNull('code')->where('code', $discount_code)->where('status', 1)->first();
            if ($discoun) {
                $message = $this->getDiscountTotal($discoun)->get('message');
                if ($message[0] == true) {
                    $total = $this->getDiscountTotal($discoun)->get('total');
                }
            }
        }
        $user = User::find(Auth::user()->id);
        $user->address = $rq->address ?: $user->address;
        $user->address2 = $rq->address2 ?: $user->address2;
        $user->phone = $rq->phone ?: $user->phone;
        $user->phone = $rq->phone ?: $user->phone;
        $user->country = $rq->country ?: $user->country;
        $order_code = "RTX-" . Carbon::now()->timestamp . '-' . str_replace(".", '', $rq->ip());
        $order = new Order();
        $order->order_code = $order_code;
        $order->customer_id = Auth::user()->id;
        $order->order_date = Carbon::now();
        $order->sub_total = $subTotal;
        $order->total = $total;
        $order->payment_id = $rq->payment_id ?: NULL;
        $order->payment_method = $rq->payment_id ? 'paypal' : 'cod';
        $order->messages = $rq->message;
        $order->ship_to_address = $rq->ship_address;
        $order->payment_status = $rq->payment_id ? 'paid' : 'unpaid';
        $order->save();
        foreach ($getCart as $rf) {
            $product = ProductDetail::find($rf['id']);
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
        session()->pull('discount');
        session()->pull('cartShop');
        session()->save();
        session()->flash('msg', __('Order successful thank you'));
        if ($rq->payment_id) {
            return response()->json();
        }
        return redirect()->back()->with('msg', __('Order successful thank you'));
    }

    public function commentSave(Request $rq){
        if (Auth::user()){
            $newCmt = new Comment();
            $newCmt->user_id = Auth::user()->id;
            $newCmt->post_id = $rq->blog_id;
            $newCmt->comment = $rq->comment;
            $newCmt->save();
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }

    public function showWishList(){
        if (Auth::user()){
            $wishlist =  WishList::where('user_id', Auth::user()->id)->pluck('product_id');
            $productsDetails = ProductDetail::whereIn('id', $wishlist)->where('status', 1)->get();
            return view('pages-front.shops.wishlist', compact('productsDetails'));
        }
        else{
            return view('pages-front.shops.wishlist');
        }
    }
    public function saveWishList($id){
        if (Auth::user()){
            $wishlist = WishList::where('user_id', Auth::user()->id)->where('product_id', $id);
            if ($wishlist->get()->count() > 0){
                $wishlist->delete();
                $img = asset('front_asset/img/icon/heart.png');
                $flag = false;
            }
            else{
                $wishlist = new WishList();
                $wishlist->user_id = Auth::user()->id;
                $wishlist->product_id = $id;
                $wishlist->save();
                $img = asset('front_asset/img/icon/heart-like.png');
                $flag = true;
            }
            return response()->json([
                'img' => $img,
                'flag' => $flag
            ]);
        }
        else{
            return response()->json();
        }
    }
    public function userOrder()
    {
        $orders = Order::where('customer_id', Auth::user()->id)->get();
        return view('pages-front.users.order', compact('orders'));
    }

    public function contactUs()
    {
        return view('pages-front.contacts.index');
    }

    public function sendContact(Request $rq)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ];
        $messages = Helpers::switchLanguage(session()->get('locale'));
        $chek = Validator::make($rq->all(), $rules, $messages);
        if ($chek->passes()) {
            $name = $rq->name;
            $email = $rq->email;
            $message_g = $rq->message;
            Mail::send('pages-front.contacts.mail', compact('name', 'email', 'message_g'), function ($mail) use ($rq) {
                $mail->to($rq->email)->subject(__('Enquiry from E-commerece Website'));
            });
            return redirect()->back()->with('message', __('Thanks for your enquiry. We will get back to you soon. !'));
        } else {
            return redirect()->back()->withErrors($chek)->withInput();
        }
    }

    public function addShipAddress(Request $rq)
    {
        if (!Auth::user()) {
            return response()->json(['text' => __('You must be logged in to use !')]);
        }
        $rules = ['text' => 'required'];
        $messages = Helpers::switchLanguage(session()->get('locale'));
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()) {
            $fh = 0;
            if ($rq->check) {
                $fh = 1;
                UserShip::where('user_id', Auth::user()->id)->where('is_default', '1')->update([
                    'is_default' => 0
                ]);
            }
            $shipAdress = new UserShip();
            $shipAdress->user_id = Auth::user()->id;
            $shipAdress->address = $rq->text;
            $shipAdress->is_default = $fh;
            $shipAdress->save();
            return response()->json(['data' => $shipAdress]);
        } else {
            return response()->json($check->errors());
        }
    }

    public function addCart(Request $rq, $id)
    {
        $productDetail = ProductDetail::find($id);
        $product = $productDetail->product;
        $price = Coupon::getSaleProduct($productDetail->id);
        if ($price == 0) {
            $price = $productDetail->price;
        }
        $item = [
            'id' => $productDetail->id,
            'name' => $product->title,
            'image' => $productDetail->photo_thumb,
            'quantity' => $rq->value ?: 1,
            'price' => $price,
            'sub_quantity' => $productDetail->sub_quantity
        ];
        $this->addItemToCart($item);
        return response()->json([
            'message' => true,
            'product' => $item,
            'total' => number_format($this->getTotalcart(), 0, 0, '.'),
            'price_sum' => number_format($this->getSumPrice(), 0, 0, '.') . ' VNĐ'
        ]);
    }

    public function addItemToCart($item)
    {
        $getCart = session()->get('cartShop');
        if ($getCart == null) {
            session()->push('cartShop', $item);
            session()->save();
        } else {
            $flag = false;
            foreach ($getCart as $key => $i) {
                if ($i['id'] == $item['id']) {
                    $getCart[$key]['quantity'] += 1;
                    session()->put('cartShop', $getCart);
                    session()->save();
                    $flag = true;
                    break;
                }
            }
            if ($flag == false) {
                session()->push('cartShop', $item);
                session()->save();
            }
        }
    }

    public function clearCart()
    {
        session()->pull('cartShop', 'default');
        session()->save();
    }

    public function deleteOnecart($id)
    {
        $getId = session()->get('cartShop');
        for ($i = 0; $i < count($getId); $i++) {
            if ($getId[$i]['id'] == $id) {
                unset($getId[$i]);
                $newGetid = array_values($getId);
                session()->put('cartShop', $newGetid);
                session()->save();
                break;
            }
        }
        return response()->json();
//        return response()->json([
//            'total' => number_format($this->getTotalcart(), 0, 0, '.'),
//            'price_sum' => number_format($this->getSumPrice(), 0, 0, '.') . ' VNĐ'
//        ]);
    }

    public static function getTotalcart()
    {
        $getCart = session()->get('cartShop');
        if ($getCart == null) {
            $getCart = [];
        }
        return count($getCart);
    }

    public static function getSumPrice()
    {
        $price = 0;
        $getCart = session()->get('cartShop');
        if ($getCart != null) {
            foreach ($getCart as $item) {
                $price += ($item['price'] * $item['quantity']);
            }
        }
        return $price;
    }
}
