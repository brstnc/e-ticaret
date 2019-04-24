@extends('admin.layouts.master')
@section('title', 'Kullanıcı Düzenleme')
@section('content')
    <h1 class="page-header">Kullanıcı Düzenleme</h1>
    <h1 class="sub-header">Form</h1>
    <form method="post" action="{{route('admin.user.save', $entry->id)}}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name_lastname">Ad Soyad</label>
                    <input type="text" class="form-control" name="name_lastname" id="name_lastname" placeholder="Ad Soyad" value="{{$entry->name_lastname}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="emai1">E-mail Adresi</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{$entry->email}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tel">Telefon</label>
                    <input type="text" class="form-control telefon" name="tel" id="tel" placeholder="Telefon" value="{{ $entry->user_details->tel_number }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mob_tel">Cep Telefonu</label>
                    <input type="text" class="form-control telefon" name="mob_tel" id="mob_tel" placeholder="Cep Telefonu" value="{{ $entry->user_details->mob_tel_number }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="address">Adres</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{ $entry->user_details->address }}">
                </div>
            </div>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="admin" id="admin" value="1" {{ $entry->admin ? 'checked' : '' }}> Yönetici
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Kaydet</button>
    </form>
@endsection