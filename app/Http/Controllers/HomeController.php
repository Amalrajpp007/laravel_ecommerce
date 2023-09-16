<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Session;
use Stripe;

class HomeController extends Controller
{
public function redirect(){
    if(Auth::id()){
if(Auth::user()->userType=='1'){
    $total_products=Product::all()->count();
    $total_orders=Order::all()->count();
    $total_users=User::all()->count();
    $total_delivered=Order::where('delivery_status','Delivered')->count();
    $total_processing=Order::where('delivery_status','Processing')->count();
    $total_revenue=0;
    $orders=Order::all();
    foreach($orders as $order){
        $total_revenue= $total_revenue+$order->price;
    }
    return View('admin.dashboard',compact('total_products','total_orders','total_users','total_delivered','total_processing','total_revenue'));
}else{
    $products=Product::orderBy('id','desc')->paginate(6);
    return View('home.userpage',compact('products'));
}
    }else{
        return View('welcome');
    }
}

public function index(){
    $products=Product::orderBy('id','desc')->paginate(6);
    return view('home.userpage',compact('products'));
}
public function viewProduct($id){
    $product=Product::find($id);
    return view('home.product_details',compact('product'));
}
public function addToCart($id){
    if(Auth::id()){

    
    $product=Product::find($id);
    return view('home.add_to_cart',compact('product'));
    }
    else{
        return redirect('login');
    }
}
public function storeCartItem($id,Request $request){
    $product=Product::find($id);
    $user=Auth::user();
    $cart= new Cart;
    $cart->name=$user->name;
    $cart->email=$user->email;
    $cart->phone=$user->phone;
    $cart->address=$user->address;
    $cart->product_title=$product->title;
    $cart->price=$product->d_price;
    $cart->quantity=$request->quantity;
    $cart->category=$product->category;
    $cart->image=$product->image;
    $cart->product_id=$product->id;
    $cart->user_id=$user->id;

    $cart->save();

    $quantity=$product->quantity;
    $purchased=$request->quantity;
    $product->quantity=$quantity-$purchased;
    $product->update();
    return redirect('/view_cart');
}
public function viewCartItems(){
    if(Auth::id()){

    
    $user_id=Auth::user()->id;
    $products=Cart::Where('user_id', $user_id)->paginate(12);
    return view('home.view_cart',compact('products'));
    }
    else{
        return redirect('login');
    }
}
public function removeCartItems($id){
    $product=Cart::find($id);
    $product->delete();
    return redirect()->back();
}
public function ordercash(){
    $user=Auth::user();
    $user_id=$user->id;
    $data=Cart::where('user_id','=',$user_id)->get();

    foreach($data as $d){
        $order=new Order;
        $order->name=$d->name;
        $order->email=$d->email;
        $order->phone=$d->phone;
        $order->address=$d->address;
        $order->user_id=$d->user_id;
        $order->product_title=$d->product_title;
        $order->price=$d->price;
        $order->quantity=$d->quantity;
        $order->image=$d->image;
        $order->product_id=$d->product_id;
        $order->payment_status='Cash on delivery';
        $order->delivery_status='Processing';
        $order->save();
        $cart_id=$d->id;
        $cart=cart::find($cart_id);
        $cart->delete();
    }
   
   
    return redirect()->back()->with('message',"Order placed we will cotact you soon");
}
public function stripe($totalprice){
    return view('home.stripe',compact('totalprice'));

}
public function stripePost(Request $request,$totalprice)
{
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    Stripe\Charge::create ([
            "amount" => $totalprice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com." 
    ]);

    $user=Auth::user();
    $user_id=$user->id;
    $data=Cart::where('user_id','=',$user_id)->get();

    foreach($data as $d){
        $order=new Order;
        $order->name=$d->name;
        $order->email=$d->email;
        $order->phone=$d->phone;
        $order->address=$d->address;
        $order->user_id=$d->user_id;
        $order->product_title=$d->product_title;
        $order->price=$d->price;
        $order->quantity=$d->quantity;
        $order->image=$d->image;
        $order->product_id=$d->product_id;
        $order->payment_status='Paid';
        $order->delivery_status='Processing';
        $order->save();
        $cart_id=$d->id;
        $cart=cart::find($cart_id);
        $cart->delete();
    }
  
    Session::flash('success', 'Payment successful. we will contact you soon!');
  
       
       
       
        return redirect()->back();
   
}
public function viewOrder(){
    if (Auth::id()){

        $user=Auth::user();
        $user_id= $user->id;
   $orders=Order::where('user_id',$user_id)->get();
   ;
    return view('home.orders',compact('orders'));
    }
    else{
        return redirect('login');
    }
}
public function cancel($id){
$order=Order::find($id);
$order->delivery_status='Canceled';
$order->update();
return redirect()->back();
}
public function search_products(Request $request){
    $search=$request->search;
    $products=Product::where('title','LIKE',"%$search%")->orWhere('category','LIKE',"%$search%")
    ->orWhere('description','LIKE',"%$search%")->paginate(6);
   
    return View('home.userpage',compact('products'));
    
}
}
