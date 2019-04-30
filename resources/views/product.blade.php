@extends('layouts.partials.master')
@section('title', $product->product_name)
@section('content')
<div class="container">
        <ol class="breadcrumb">
            <li><a href="{{route('homepage')}}">Anasayfa</a></li>
            @foreach($categories as $category)
                <li><a href="{{route('category', $category->slug)}}">{{$category->category_name}}</a></li>
            @endforeach
            <li class="active">{{ $product->product_name }}</li>
        </ol>
        <div class="bg-content">
            <div class="row">
                <div class="col-md-5">
                    <img class="img-responsive" style="min-width: 100%"
                         src="{{ $product->detail->product_img !=null ? '/E-Ticaret/laravel/public/uploads/products/'.$product->detail->product_img
                                 : 'http://via.placeholder.com/640x400?text=UrunResmi' }}">
                    <hr>
                </div>
                <div class="col-md-7">
                    <h1>{{ $product->product_name }}</h1>
                    <p class="price">{{ $product->price }} ₺</p>
                    <form action="{{ route('basket.add') }}" method="post">
                        {{ csrf_field()}}
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="submit" class="btn btn-theme" value="Sepete Ekle" >
                    </form>
                </div>
            </div>

            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#t1" data-toggle="tab">Ürün Açıklaması</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="t1">{{ $product->comment }}</div>
                </div>
            </div>

        </div>
    </div>
@endsection