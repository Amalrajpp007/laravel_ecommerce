<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use PDF;
use Notification;
use App\Notifications\sendEmailNotification;

class AdminController extends Controller
{
    public function addCategory(){
        $categories=Category::all();
        return view('admin.add_category')->with('categories',$categories);
    }
    public function storeCategory(Request $request){
       $data= $request->all();
       Category::create($data);
        return redirect()->back()->with('message','Category Added Successfully');
    }
    public function deleteCategory($id,Request $request){
       $data= Category::find($id);
       $data->delete();
        return redirect()->back()->with('message','Category Deleted Successfully');
    }
    public function addProduct(){
       $categories=Category::all();
        return view('admin.add_product')->with('categories',$categories);
    }
    public function storeProduct(Request $request){
      $product= new Product;
      $product->title=$request->title;
      $product->description=$request->description;
      $product->quantity=$request->quantity;
      $product->price=$request->price;
      $product->d_price=$request->d_price;
      $product->category=$request->category;
      $image=$request->image;
      $image_name=time().'.'.$image->getClientOriginalExtension();
      $image->move('products',$image_name);
      $product->image=$image_name;
      $product->save();
        return redirect()->back()->with('message',"Product Added Successfully");
    }
    public function viewProduct(){
        $products=Product::all();
         return view('admin.view_products')->with('products',$products);
     }
    public function deleteProduct($id){
        $product=Product::find($id);
        $product->delete();
         return redirect()->back();
     }
    public function editProduct($id){
        $product=Product::find($id);
        $categories=Category::all();
       
         return view('admin.edit_product',compact('product','categories'));
     }
     public function updateProduct(Request $request,$id){
        $product=Product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->d_price=$request->d_price;
        $product->category=$request->category;
        $image=$request->image;
        if($image){

       
        $image_name=time().'.'.$image->getClientOriginalExtension();
        $image->move('products',$image_name);
        $product->image=$image_name;
        }
        $product->update();
          return redirect()->back()->with('message',"Product Updated Successfully");
}

public function viewOrders(){
    $orders= Order::all();
    
     return view('admin.view_orders',compact('orders'));
 }
public function setAsDelivered($id){
    $order= Order::find($id);
    $order->delivery_status='Delivered';
    $order->payment_status='Paid';
    $order->update();

    
     return redirect()->back();
 }
public function printPdf($id){
   $order= Order::find($id);
   $pdf=PDF::loadView('admin.pdf',compact('order')); 
    return $pdf->download('order_details.pdf');
 }
public function send_email($id){
   $order= Order::find($id);
   
    return view('admin.send_email',compact('order'));
 }
public function send_user_email($id,Request $request){
   $order= Order::find($id);
   $details=[
    'greeting'=> $request->greeting,
    'firstline'=> $request->firstline,
    'body'=> $request->body,
    'button'=> $request->button,
    'url'=> $request->url,
    'lastline'=> $request->lastline,
   ];

   
   Notification::send($order,new sendEmailNotification($details));
   return redirect()->back()->with('message','send email successfully');
 }
 public function search_order(Request $request){
    $search=$request->search;
    
    $orders= Order::where('product_title','LIKE',"%$search%")->orWhere('name','LIKE',"%$search%")->orWhere('payment_status','LIKE',"%$search%")->get();
   
    return view('admin.view_orders',compact('orders'));
  }
}
