@extends('layouts.partials.master')
@section('title', 'Satış Sayfası')
@section('content')
<div class="container">
        <div class="bg-content">
            <h2>Ödeme</h2>
            <form action="{{route('pay')}}" method="post">
                {{ csrf_field() }}
            <div class="row">
                <div class="col-md-5">
                    <h3>Ödeme Bilgileri</h3>
                    <div class="form-group">
                        <label for="card_no">Kredi Kartı Numarası</label>
                        <input type="text" class="form-control kredikarti" id="card_no" name="card_number" style="font-size:20px;" required>
                    </div>
                    <div class="form-group">
                        <label for="cardexpiredatemonth">Son Kullanma Tarihi</label>
                        <div class="row">
                            <div class="col-md-6">
                                Ay
                                <select name="cardexpiredatemonth" id="cardexpiredatemonth" class="form-control" required>
                                    @for($i=1;$i<13;$i++)
                                        <option>{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-6">
                                Yıl
                                <select name="cardexpiredateyear" class="form-control" required>
                                    @for($i=2020;$i<2030;$i++)
                                        <option>{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cardcvv2">CVV (Güvenlik Numarası)</label>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control kredikarti_cvv" name="cardcvv2" id="cardcvv2" required>
                            </div>
                        </div>
                    </div>
                    <form>
                        <div class="form-group">
                            <div class="checkbox">
                                <label><input type="checkbox" checked> Ön bilgi3500 ₺lendirme formunu okudum ve kabul ediyorum.</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label><input type="checkbox" checked> Mesafeli satış sözleşmesini okudum ve kabul ediyorum.</label>
                            </div>
                        </div>
                    </form>
                    <button type="submit" class="btn btn-success btn-lg">Ödeme Yap</button>
                </div>
                <div class="col-md-7">
                    <h4>Ödenecek Tutar</h4>
                    <span class="price">{{ Cart::total() }} <small>₺</small></span>

                    <h4>İletişim ve Fatura bilgileri</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name_lastname">Ad Soyad</label>
                                <input type="text" class="form-control" name="name_lastname" id="name_lastname" value="{{ auth()->user()->name_lastname }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name_lastname">Adres</label>
                                <input type="text" class="form-control" name="adress" id="adress" value="{{ $detail->address }}" required>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tel_number">Telefon</label>
                                <input type="tel" class="form-control telefon" name="tel_number" id="tel_number" value="{{ $detail->tel_number }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="mob_tel_number">Cep Telefonu</label>
                                <input type="tel" class="form-control telefon" name="mob_tel_number" id="mob_tel_number" value="{{ $detail->mob_tel_number }}" required>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
    <script>
        $('.kredikarti').mask('0000-0000-0000-0000', { placeholder: "____-____-____-____" });
        $('.kredikarti_cvv').mask('000', { placeholder: "___" });
        $('.telefon').mask('(000) 000-00-00', { placeholder: "(___) ___-__-__" });
    </script>
@endsection