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
                                <img class="img-responsive" style="min-width: 100%"
                                     src="{{ $product->detail->product_img !=null ? '/E-Ticaret/laravel/public/uploads/products/'.$product->detail->product_img
                                 : 'http://via.placeholder.com/640x400?text=UrunResmi' }}">
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
                        <a href="{{route('product', $products_opportunity->slug)}}">
                            <img class="img-responsive" style="min-width: 100%"
                                 src="{{ $products_opportunity->detail->product_img !=null ? '/E-Ticaret/laravel/public/uploads/products/'.$products_opportunity->detail->product_img
                                 : 'http://via.placeholder.com/640x400?text=UrunResmi' }}"><br>
                            <p><a href="{{route('product', $products_opportunity->slug)}}">{{$products_opportunity->product_name}}</a></p>
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
                                <a href="{{route('product', $featured->slug)}}">
                                    <img class="img-responsive" style="min-width: 100%"
                                         src="{{ $featured->detail->product_img !=null ? '/E-Ticaret/laravel/public/uploads/products/'.$featured->detail->product_img
                                 : 'http://via.placeholder.com/640x400?text=UrunResmi' }}">
                                </a>
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
                                <a href="{{route('product', $bestselling->slug)}}">
                                    <img class="img-responsive" style="min-width: 100%"
                                         src="{{ $bestselling->detail->product_img !=null ? '/E-Ticaret/laravel/public/uploads/products/'.$bestselling->detail->product_img
                                 : 'http://via.placeholder.com/640x400?text=UrunResmi' }}">
                                </a>
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
                                <a href="{{route('product', $reduced->slug)}}">
                                    <img class="img-responsive" style="min-width: 100%"
                                         src="{{ $reduced->detail->product_img !=null ? '/E-Ticaret/laravel/public/uploads/products/'.$reduced->detail->product_img
                                 : 'http://via.placeholder.com/640x400?text=UrunResmi' }}">
                                </a>
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