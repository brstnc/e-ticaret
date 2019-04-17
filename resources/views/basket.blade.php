@extends('layouts.partials.master')
@section('title', 'Sepet Sayfası')
@section('content')
<div class="container">
        <div class="bg-content">
            <h2>Sepet</h2>
            @if(count(Cart::content())>0)
            <table class="table table-bordererd table-hover">
                <tr>
                    <th colspan="2">Ürün</th>
                    <th>Adet Tutarı</th>
                    <th>Adet</th>
                    <th>Tutar</th>
                </tr>
                @foreach(Cart::content() as $productCart)
                <tr>
                    <td style="width: 120px;">
                        <img src="http://lorempixel.com/120/100/food/2">
                    </td>
                        <td>
                            {{ $productCart->name }}
                            <form action="{{ route('basket.delete', $productCart->rowId) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger btn-xs" value="Sepetten Kaldır">
                            </form>
                        </td>
                    <td>{{ $productCart->price }} ₺</td>
                    <td>
                        <a href="#" class="btn btc-xs btn-default">-</a>
                        <span style="padding: 10px 20px">{{ $productCart->qty }}</span>
                        <a href="#" class="btn btc-xs btn-default">+</a>
                    </td>
                    <td class="text-right">
                        {{ $productCart->subtotal }} ₺
                    </td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="4" class="text-right">Alt Toplam</th>
                    <td class="text-right">{{ Cart::subtotal() }} ₺</td>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">KDV</th>
                    <td class="text-right">{{ Cart::tax() }} ₺</td>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Toplam</th>
                    <td class="text-right">{{ Cart::total() }} ₺</td>
                </tr>
            </table>
                <div>
                    <a href="#" class="btn btn-info pull-left">Sepeti Boşalt</a>
                    <a href="#" class="btn btn-success pull-right btn-lg">Ödeme Yap</a>
                </div>
            @else
                <p>Sepetinizde ürün bulunmamakta. <a href="{{ route('homepage') }}" class="btn btn-info pull-right">Alışveriş Yap</a></p>
            @endif

        </div>
    </div>
@endsection