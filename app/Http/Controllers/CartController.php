<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cart_datas = session()->get('carts');
        $total_price = 0;
        foreach($cart_datas as $cart_data){
            $total_price += $cart_data['price'] * $cart_data['quantity'];
        }
        return view('front.cart',compact('cart_datas','total_price'));
    }

    public function addToCart(Request $request){
        $carts = session()->get('carts');

        $product_id = $request->get('product_id');
        // if cart is empty then this the first product
        if(!$carts) {
            $carts = array(
                $product_id => $request->only('product_id',
                                              'product_name',
                                              'price', 'quantity'));
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($carts[$product_id])) {
            $carts[$product_id]['quantity'] = $carts[$product_id]['quantity'] + 1;
        }else{
            $carts[$product_id] = $request->only('product_id',
                                                 'product_name',
                                                 'price', 'quantity');
        }

        session()->put('carts', $carts);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function deleteItem($product_id = null){
        $carts = session()->get('carts');
        unset( $carts[$product_id]);
        session()->put('carts', $carts);
        return back()->with('message','Deleted Success!');
    }

    public function updateQuantity($product_id, $action){
        $carts = session()->get('carts');
        if(isset($carts[$product_id])){
            if($action == 'asc')
                $carts[$product_id]['quantity'] = $carts[$product_id]['quantity'] + 1;
            if($action == 'desc')
                $carts[$product_id]['quantity'] = $carts[$product_id]['quantity'] - 1;
        }
        session()->put('carts', $carts);
        return back()->with('message','Update quantity Success!');
    }
}
