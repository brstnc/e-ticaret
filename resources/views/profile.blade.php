@extends('layouts.partials.master')
@section('title', 'AnaSayfa')
@section('content')

    <div class="container">
        <div class="row">
            <h1 class="sub-header">Profil</h1>
            <form method="post" action="{{route('profile.save', $entry->id)}}">
                {{ csrf_field() }}
                @include('layouts.partials.errors')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name_lastname">Ad Soyad</label>
                            <input type="text" class="form-control" name="name_lastname" id="name_lastname" placeholder="Ad Soyad" value="{{ old('name_lastname', $entry->name_lastname)}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="emai1">E-mail Adresi</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{old('email',$entry->email)}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tel">Telefon</label>
                            <input type="text" class="form-control telefon" name="tel" id="tel" placeholder="Telefon" value="{{old('tel', $entry->user_details->tel_number) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mob_tel">Cep Telefonu</label>
                            <input type="text" class="form-control telefon" name="mob_tel" id="mob_tel" placeholder="Cep Telefonu" value="{{old('mob_tel', $entry->user_details->mob_tel_number) }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address">Adres</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{old('address', $entry->user_details->address) }}">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </form>
        </div>
    </div>
@endsection