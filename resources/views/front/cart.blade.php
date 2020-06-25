@extends('layouts.master')
@include('front.menutop')
<div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <td>Item</td>
                <td>Name</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Total</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart_datas as $cart_data)
            <tr>
                <td><a href="">
                    <img src="{{ url(get_image_product($cart_data['product_id'])) }}" alt="" style="width: 100px;">
                </a></td>
                <td class="cart_name">
                    <h4><a href="">{{$cart_data['product_name'] }}</a></h4>
                </td>
                <td class="cart_price">
                    <p>{{ $cart_data['price'] }} Đ</p>
                </td>
                <td class="cart_quantity">
                    <div class="cart_quantity_button">
                        @if($cart_data['quantity'] >= 1)
                            <a class="cart_quantity_down" href=""> - </a>
                        @endif
                        <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart_data['quantity'] }}" autocomplete="off" min="1" size="2">
                        <a class="cart_quantity_up" href=""> + </a>
                    </div>
                </td>
                <td class="cart_total">
                    <p class="cart_total_price">$ {{$cart_data['price'] * $cart_data['quantity'] }}</p>
                </td>
                <td class="cart_delete">
                    <a class="cart_quantity_delete" href="{{url('/cart/deleteItem',$cart_data['product_id'])}}"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('front.index') }}" class="btn btn-success float-right">Tiếp tục mua hàng</a>
</div>
{{-- {{ route('cart.update-quantity', ['product_id' => $cart_data['product_id'], 'action' => 'desc']) }} --}}
{{-- {{ route('cart.update-quantity', ['product_id' => $cart_data['product_id'], 'action' => 'asc']) }} --}}
@include('front.footer')
