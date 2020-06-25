@extends('layouts.master')
@include('front.menutop')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="task">
                <h4 class="color" style="text-align: center;font-weight: bold;">Detail</h4>
            </div>
        </div>
    </div>
</div>
<div class="detail">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <img class="imgdt" src="{{ $products->image }}" alt="">
            </div>
            <div class="col-12 col-md-1 endbor">
            </div>
            <div class="col-12 col-md-7 bor">
                <h3 class="namepr">{{ $products->name }}</h3>
                <h5 style="font-weight: bold; color: #f6a225;text-align: center">-- Giá: {{ $products->price }} Đ --</h5>
                <li> Màn hình: {{ $products->screen }}</li>
                <li> Pin: {{ $products->pin }}</li>
                <li> Thẻ SD: {{ $products->card }}</li>
                <li> CPU: {{ $products->cpu }}</li>
                <li> Camera: {{ $products->camera }}</li>
                <li> Hệ điều hành: {{ $products->hdh }}</li>
                <li> Tính năng: {{ $products->desc }}</li>
                <div class="quantity">
                    <form action="{{route('addToCart')}}" method="post" role="form">
                        @csrf
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="product_id" value="{{ $products->id }}">
                        <input type="hidden" name="product_name" value="{{ $products->name }}">
                        <input type="hidden" name="price" value="{{ $products->price }}">
                        <input type="number" class="ipwid" name="quantity" value="{{ $products->quantity }}">
                        <input type="submit" name="submit" class="btn btn-info" value="Add to Cart">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('front.footer')
