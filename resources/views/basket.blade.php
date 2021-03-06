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
                        <img width="120" src="/E-Ticaret/laravel/public/uploads/products/{{ $productCart->options->img }}">
                    </td>
                        <td>
                            {{ $productCart->name }}
                            <form action="{{ route('basket.delete', $productCart->rowId) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger btn-xs" value="Sepetten Kaldır">
                            </form>
                        </td>
                    <td>{{ number_format($productCart->price )}} ₺</td>
                    <td>
                        <span style="padding: 10px 20px">{{ $productCart->qty }}</span>
                    </td>
                    <td class="text-right">
                        {{ number_format($productCart->subtotal) }} ₺
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
                    <a href="{{ route('payment') }}" class="btn btn-success pull-right btn-lg">Ödeme Yap</a>
                    <form action="{{ route('basket.clear') }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-info btn-lg" value="Sepeti Boşalt">
                    </form>
                </div>
            @else
                <p>Sepetinizde ürün bulunmamakta. <a href="{{ route('homepage') }}" class="btn btn-info pull-right">Alışveriş Yap</a></p>
            @endif

        </div>
    </div>
@endsection