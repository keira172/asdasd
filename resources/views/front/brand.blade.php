@extends('front.welcome')
@section('content')
<div class="content">
    <div class="container text-white" style="margin-top:80px !important">
        <h2 class="widget-title"><span>{{ $brand->name }}</span></h2>

        <div class="row">
            @foreach ($brand->products as $product)
            <div class="col-md-3 col-sm-6 col-xs-12 ahover" style="margin-top:50px; padding: 10px;">
                <img style="width: 100%" src="{{ $product->image }}" alt="">
                <p class="ten text-center">{{ $product->name}}</p>
                <p class="price"><b>Giá:</b> {{ $product->price}} Đ</p>
                <a href="{{ route('front.show', $product->id) }}" class="btn btn-info">Chi tiết</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

