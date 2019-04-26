@extends('layouts.partials.master')
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('homepage') }}">Anasayfa</a></li>
            <li class="active">Arama Sonucu</li>
        </ol>

        <div class="product bg-content">
            <div class="row">
                @if(count($products)==0)
                    <div class="col-md-12 text-center">
                        <p>Aradığınız ürün bulunamadı.</p>
                    </div>
                @endif
                @foreach($products as $product)
                    <div class="col-md-3">
                        <a href="{{ route('product', $product->slug) }}" >
                        <img src="http://via.placeholder.com/250x200?text=UrunResmi" alt="{{$product->product_name}}" >
                        </a>
                        <p>
                            <a href="{{ route('product', $product->slug) }}">
                                {{$product->product_name}}
                            </a>
                        </p>
                        <p class="price">{{ $product->price }}</p>
                    </div>
                @endforeach
            </div>
            {{ $products->appends(['search' => old('search')])->links() }}
        </div>
    </div>
@endsection