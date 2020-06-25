@extends('front.welcome')
@section('content')
<div class="content">
    @foreach ($brands as $brand)
    <div class="container text-white" style="margin-top:80px !important">
        <h2 class="widget-title"><span>{{ $brand->name }}</span></h2>

        <div class="row">
            @foreach ($brand->products as $product)
            <div class="col-md-3 col-sm-6 col-xs-12 ahover" style="margin-top:50px; padding: 10px;">
                <img style="width: 100%" src="{{ $product->image }}" alt="">
                <p class="ten text-center">{{ $product->name}}</p>
                <p class="price"><b>Price:</b> {{ $product->price}} Đ</p>
                <a href="{{ route('front.show', $product->id) }}" class="btn btn-warning " style="color: #000;">Detail</a>
                <a href="{{ route('addToCart') }}" class="btn">
                    <form action="{{route('addToCart')}}" method="post" role="form">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="product_name" value="{{ $product->name }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <input type="hidden" name="quantity" value="1" id="quantity">
                        <button type="submit" class="btn btn-primary">
                            Add to cart
                        </button>
                    </form>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
@endsection
