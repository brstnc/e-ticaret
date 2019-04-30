@extends('admin.layouts.master')
@section('title', 'Sipariş Yönetimi')
@section('content')
    <h1 class="page-header">Sipariş Yönetimi</h1>
    <h2 class="sub-header">
        Sipariş Listesi
    </h2>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>Kullanıcı</th>
                <th>Sipariş Kodu</th>
                <th>Tutar</th>
                <th>Durum</th>
                <th>Sipariş Tarihi</th>
                <th>Operasyonlar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $entry)
                <tr>
                    <td>{{ $entry->name_lastname }}</td>
                    <td>SP- {{ $entry->id }}</td>
                    <td>{{ $entry->order_amount * ((100 + config('cart.tax'))/100)}}₺</td>
                    <td>{{ $entry->status}}</td>
                    <td>{{ $entry->created_at }}</td>
                    <td style="width: 100px">
                       <a href="{{ route('admin.order.update', $entry->id) }}" class="btn btn-s btn-success" data-toggle="tooltip" data-placement="top" title="Düzenle">
                           <span class="fa fa-pencil" ></span>
                       </a>
                        <a href="{{ route('admin.order.delete', $entry->id) }}" class="btn btn-s btn-danger" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('{{$entry->name_lastname }} kişisine ait siparişi silmek istediğinize emin misin?')">
                        <span class="fa fa-trash"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$list->links()}}
    </div>

@endsection