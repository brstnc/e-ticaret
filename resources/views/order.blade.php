@extends('layouts.partials.master')
@section('title', 'Ürün Detay Sayfası')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Sipariş (SP-{{ $order->id }})</h2>
            <table class="table table-bordererd table-hover">
                <tr>
                    <th colspan="2">Ürün</th>
                    <th>Tutar</th>
                    <th>Adet</th>
                    <th>Ara Toplam</th>
                    <th>Durum</th>
                </tr>
                @foreach($order->basket->basket_products as $basket_product)
                <tr>
                    <td style="width: 120px;">
                        <img class="img-responsive" style="min-width: 100%"
                             src="{{ $basket_product->product->detail->product_img !=null ? '/E-Ticaret/laravel/public/uploads/products/'.$basket_product->product->detail->product_img
                                 : 'http://via.placeholder.com/640x400?text=UrunResmi' }}">
                    </td>
                    <td>{{ $basket_product->product->product_name }}</td>
                    <td>{{ $basket_product->piece }} ₺</td>
                    <td>{{ $basket_product->amount }}</td>
                    <td>{{ $basket_product->piece * $basket_product->amount }} ₺</td>
                    <td>
                        {{ $basket_product->status }}
                    </td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="4" class="text-right">Ara Toplam</th>
                    <th colspan="2">{{ $order->order_amount }} ₺</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">KDV</th>
                    <th colspan="2">{{ $order->order_amount * ((100+config('cart.tax'))/100) - $order->order_amount }} ₺</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Toplam Tutar (KDV Dahil)</th>
                    <th colspan="2">{{ $order->order_amount * ((100+config('cart.tax'))/100) }} ₺</th>
                </tr>

            </table>
        </div>
    </div>
@endsection