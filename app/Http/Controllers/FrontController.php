<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductBrand;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = ProductBrand::all();
        $product = Product::all();
        $order = Order::all();
        $orderdetail = OrderDetail::all();
        return view('front.content', [
            'brands'=>$brand,
            'products'=>$product,
            'orders'=>$order,
            'orderdetails'=>$orderdetail,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('front.detail', array('products'=>$product));
    }

    public function brand($id)
    {
        $brands = ProductBrand::all();
        $brand = ProductBrand::find($id);

        return view('front.brand', [
            'brands'=>$brands,
            'brand'=>$brand
        ]);
    }
}
