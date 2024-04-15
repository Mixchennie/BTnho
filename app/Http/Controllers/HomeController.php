<?php

namespace App\Http\Controllers;
use App\Models;
use App\Models\Product;
use App\Models\Cart2;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $products = Product::all()->where('new','=',1);
        $allProducts = Product::all();
           
        
        //dd($products);
        return view('index',compact('products','allProducts'));    
    }
    public function getProductType($id){
        $producttype = Product::find($id);
        return view('product_type',compact('producttype'));
    }
    //thêm 1 sản phẩm có id cụ thể vào model cart rồi lưu dữ liệu của model cart vào 1 session có tên cart (session được truy cập bằng thực thể Request)
   public function addToCart(Request $request,$id){
      
        $product=Product::find($id);
        //dd(($request->session()->has('cart')) );
        $oldCart=$request->session()->has('cart')?$request->session()->get('cart'):null;
        if(!is_null($oldCart)){
            $cart=$oldCart;
        }        
        else  { 
            $cart = new Cart2();
        }
        $cart->add($product,$id);
        $cart->items[$id]["item"]["qty"] = 1;
        $request->session()->put('cart',$cart);
        // dd($cart); 

        return redirect()->back();
    }
    public function listCart(Request $request){
             
        //dd(($request->session()->has('cart')) );
        // $carts=$request->session()->has('cart')?$request->session()->get('cart'):null;
        // $carts = Session::get('cart'); 
        $oldCart=Session::get('cart'); //session cart được tạo trong method addToCart của PageController
        // $cart=new Cart2();
        $cart=$oldCart;
        return view("list-cart", ['cart'=>Session::get('cart'),'productCarts'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
    }
    public function updateCart(Request $request, $productId){
        $cart = session()->get('cart');
        $quantity = $request->input('product-qty');
        if(isset( $cart->items[$productId])) {
            
            if($cart->items[$productId]['item']['promotion_price']==0){
                $old_total_price_of_product =   $cart->items[$productId]['item']['unit_price'] * $cart->items[$productId]['item']['qty']; 
                $new_total_price_of_product =   $cart->items[$productId]['item']['unit_price'] * $quantity; 
            }            
            else {
                $old_total_price_of_product =   $cart->items[$productId]['item']['promotion_price'] * $cart->items[$productId]['item']['qty'];
                $new_total_price_of_product =   $cart->items[$productId]['item']['promotion_price'] * $quantity;
            }
            $cart->items[$productId]["item"]["qty"] = $quantity;
            $cart->totalPrice = $cart->totalPrice - $old_total_price_of_product + $new_total_price_of_product;
session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Giỏ hàng đã được cập nhật');
        }

        // return redirect()->back()->with('error', 'Sản phẩm không tồn tại trong giỏ hàng');
    
    }
    public function checkout(){
        $oldCart=Session::get('cart'); //session cart được tạo trong method addToCart của PageController
        // $cart=new Cart2();
        $cart=$oldCart;
        return view("checkout", ['cart'=>Session::get('cart'),'productCarts'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
    }
} 