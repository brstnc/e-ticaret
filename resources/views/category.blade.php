@extends('layouts.partials.master')
@section('title', $category->category_name)
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('homepage') }}">Anasayfa</a></li>
            <li class="active">{{ $category->category_name }}</li>
        </ol>
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $category->category_name }}</div>
                    <div class="panel-body">
                        <h3>Alt Kategoriler</h3>
                        <div class="list-group categories">
                            @foreach( $low_categories as $low_category)
                            <a href="{{route('category', $low_category->slug)}}" class="list-group-item">
                                <i class="fa fa-arrow-circle-o-right"></i>
                                {{$low_category->category_name}}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="products bg-content">
                    Ürünler
                    <hr>
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-3 product">
                                <a href="{{ route('product', $product->slug) }}"><img src="http://via.placeholder.com/640x400?text=UrunResmi"></a>
                                <p><a href="{{ route('product', $product->slug) }}">{{ $product->product_name }}</a></p>
                                <p class="price">{{ $product->price }} ₺</p>
                                <p><a href="#" class="btn btn-theme">Sepete Ekle</a></p>
                            </div>
                        @endforeach
                    </div>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection