@extends('admin.layouts.master')
@section('title', 'Sipariş Düzenleme')
@section('content')
        <h1 class="page-header">Sipariş Düzenleme</h1>

    <form method="post" action="{{ route('admin.order.save', $entry->id) }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name_lastname">Kullanıcı</label>
                    <input type="text" class="form-control" width="15px" name="name_lastname" id="name_lastname" placeholder="Kullanıcı Adı" value="{{ old('name_lastname', $entry->name_lastname)}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tel_number">Telefon</label>
                    <input type="tel" class="form-control" name="tel_number" id="tel_number" placeholder="Telefon" value="{{ old('tel_number', $entry->tel_number)}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mob_tel_number">Cep Telelfonu</label>
                    <input type="tel" class="form-control" name="mob_tel_number" id="mob_tel_number" placeholder="Cep Telefonu" value="{{ old('mob_tel_number', $entry->mob_tel_number)}}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address">Adres</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Adres" value="{{ old('address', $entry->address)}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Durum</label>
                    <select name="status" class="form-control" id="status">
                        <option {{ old('status', $entry->status) == 'Siparişiniz alındı' ? 'selected' : '' }}>Siparişiniz alındı</option>
                        <option {{ old('status', $entry->status) == 'Ödeme onaylandı' ? 'selected' : '' }}>Ödeme onaylandı</option>
                        <option {{ old('status', $entry->status) == 'Kargoya verildi' ? 'selected' : '' }}>Kargoya verildi</option>
                        <option {{ old('status', $entry->status) == 'Sipariş tamamlandı' ? 'selected' : '' }}>Sipariş tamamlandı</option>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Kaydet</button>
    </form>
        <h3>Sipariş (SP-{{ $entry->id }})</h3>
        <table class="table table-bordererd table-hover">
            <tr>
                <th colspan="2">Ürün</th>
                <th>Tutar</th>
                <th>Adet</th>
                <th>Ara Toplam</th>
            </tr>
            @foreach($entry->basket->basket_products as $basket_product)
                <tr>
                    <td style="width: 120px;">
                        <img class="img-responsive" style="min-width: 100%"
                             src="{{ $basket_product->product->detail->product_img !=null ? '/E-Ticaret/laravel/public/uploads/products/'.$basket_product->product->detail->product_img
                                 : 'http://via.placeholder.com/120x100?text=UrunResmi' }}">
                    </td>
                    <td>{{ $basket_product->product->product_name }}</td>
                    <td>{{ $basket_product->piece }} ₺</td>
                    <td>{{ $basket_product->amount }}</td>
                    <td>{{ $basket_product->piece * $basket_product->amount }} ₺</td>
                </tr>
            @endforeach
            <tr>
                <th colspan="4" class="text-right">Ara Toplam</th>
                <th colspan="2">{{ $entry->order_amount }} ₺</th>
            </tr>
            <tr>
                <th colspan="4" class="text-right">KDV</th>
                <th colspan="2">{{ $entry->order_amount * ((100+config('cart.tax'))/100) - $entry->order_amount }} ₺</th>
            </tr>
            <tr>
                <th colspan="4" class="text-right">Toplam Tutar (KDV Dahil)</th>
                <th colspan="2">{{ $entry->order_amount * ((100+config('cart.tax'))/100) }} ₺</th>
            </tr>

        </table>
@endsection
