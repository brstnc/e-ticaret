@extends('layouts.partials.master')
@section('title', 'AnaSayfa')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Kategoriler</div>
                    <div class="list-group categories">
                        @foreach($categories as $category)
                        <a href="{{ route('category', $category->slug) }}" class="list-group-item">
                            <i class="fa fa-arrow-circle-o-right"></i>
                            {{ $category->category_name }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @for($i=0;$i<count($products_slider);$i++)
                        <li data-target="#carousel-example-generic" data-slide-to= {{$i}} class="{{$i == 0 ? 'active': ''}}"></li>
                        @endfor
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        @foreach($products_slider as $index => $product)
                            <div class="item {{$index == 0 ? 'active' : ''}}">
                                <img src="http://via.placeholder.com/640x400?text=UrunResmi" alt="...">
                                <div class="carousel-caption">
                                    {{$product->product_name}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default" id="sidebar-product">
                    <div class="panel-heading">Günün Fırsatı</div>
                    <div class="panel-body">
                        <a href="{{route('product', $products_opportunity->product_name)}}">
                            <img src="http://via.placeholder.com/640x700?text=UrunResmi" class="img-responsive">
                            {{$products_opportunity->product_name}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Öne Çıkan Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($products_featured as $featured)
                            <div class="col-md-3 product">
                                <a href="{{route('product', $featured->slug)}}"><img src="http://via.placeholder.com/640x400?text=UrunResmi"></a>
                                <p><a href="{{route('product', $featured->slug)}}">{{$featured->product_name}}</a></p>
                                <p class="price">{{$featured->price}} ₺</p>
                            </div>
                        @endforeach
                    </div>
            </div>
        </div>
        <hr>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Çok Satan Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($products_bestselling as $bestselling)
                            <div class="col-md-3 product">
                                <a href="{{route('product', $bestselling->slug)}}"><img src="http://via.placeholder.com/640x400?text=UrunResmi"></a>
                                <p><a href="{{route('product', $bestselling->slug)}}">{{$bestselling->product_name}}</a></p>
                                <p class="price">{{$bestselling->price}} ₺</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">İndirimli Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($products_reduced as $reduced)
                            <div class="col-md-3 product">
                                <a href="{{route('product', $reduced->slug)}}"><img src="http://via.placeholder.com/640x400?text=UrunResmi"></a>
                                <p><a href="{{route('product', $reduced->slug)}}">{{$reduced->product_name}}</a></p>
                                <p class="price">{{$reduced->price}} ₺</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection