<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Client;
use App\Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Session;
use App\Models\Order;
use App\Mail\SendMail;

class ClientController extends Controller
{
    //
    // hiện thị ở trang chủ
    public function home(){
        $sliders = slider::All()->where('status', 1);
        // $products = product::All()->where('status', 1);
        $products = Product::All()->where('status', 1);
        return view('client.home')->with('sliders', $sliders)->with('products', $products);
    }
    // hiển thị sản phẩm (với status = 1)
    public function shop(){
        $categories = Category::All();
        $products = Product::All()->where('status', 1);
        return view('client.shop')->with('categories', $categories)->with('products', $products);
        //return view('client.shop');
    }
    // thêm vào giỏ (button)
    public function addtocart($id){
        $product = Product::find($id);

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
         return back();

    }
    //update trong giỏ hàng
    public function update_qty(Request $request, $id){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateQty($request->id, $request->quantity);
        //$cart->update_qty($id, $request->quantity);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return back();
    }

    public function remove_from_cart($id){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
       
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }

        //dd(Session::get('cart'));
        return redirect('/cart');
    }
    // giỏ hàng
    public function cart(){
        if(!Session::has('cart')){
            return view('client.cart');
        }
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('client.cart', ['products' => $cart->items]);
    }
    // điều khiện thanh toán , phái có client
    public function checkout(){
        if(!Session::has('client')){
            return view('client.login');
        }

        if(!Session::has('cart')){
            return view('client.cart');
        }
        return view('client.checkout');
    }
    // 2 trang view login và signup
    public function login(){
        return view('client.login');
    }
    public function logout(){
        Session::forget('client');
        return redirect('/shop');
    }
    public function signup(){
        return view('client.signup');
    }
    // form tạo tài khoản với mail là bắt buộc nhập và password mật khẩu phải trên 3 ký tự
    public function create_account(Request $request){
        $this->validate($request, ['email' => 'email|required|unique:clients',
                                    'password' => 'required|min:3']);
        $client = new Client();
        $client->email = $request->input('email');
        // bcrypt là kiểu khoá dùng để mã hoá mật khẩu, có vẻ xịn xò hơn MD5 dù chậm hơn trong quá trình hash password ???
        // để tham khảo sau: https://kipalog.com/posts/Bam-va-luu-password-dung-cach
        $client->password = bcrypt($request->input('password'));

        $client->save();
        return back()->with('status', 'Tạo tài khoản thành công !');
    }
    //truy cập tài khoản sau khi đăng nhập
    public function access_account(Request $request){
        $this->validate($request, ['email' => 'email|required',
                                    'password' => 'required']);
        $client = Client::where('email', $request->input('email'))->first();
        if($client){
            if(Hash::check($request->input('password'), $client->password)){
                Session::put('client', $client);
                return redirect('/shop');
            }
            else{
                return back()->with('status', 'Mật khẩu không đúng !');
            }
        }
        else{
            return back()->with('status', 'Không có tài khoản với email này !');
        }
    }
    public function postcheckout(Request $request){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $payer_id = time();

        $order = new Order();
        $order->name = $request->input('name');
        $order->address = $request->input('address');
        $order->cart = serialize($cart);
       
        $order->payer_id = $payer_id;

        $order->save();
        Session::forget('cart');

        $orders = Order::where('payer_id', $payer_id)->get();

        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        // Gửi mail, khi người dùng post checkout thì hệ thống sẽ gửi mail luôn
        $email = Session::get('client')->email;
        Mail::to($email)->send(new SendMail($orders));
        return redirect('/cart')->with('status', 'Bạn đã đặt hàng thành công ! Vui lòng kiểm tra tại Email bạn đã đặt hàng');
    }
    public function orders(){
        $orders = Order::All();

        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('admin.orders')->with('orders', $orders);
    }
}
