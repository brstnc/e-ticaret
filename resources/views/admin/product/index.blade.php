@extends('admin.layouts.master')
@section('title', 'Ürün Yönetimi')
@section('content')
    <h1 class="page-header">Ürün Yönetimi</h1>
    <h2 class="sub-header">
        Ürün Listesi
    </h2>


    <div class="table-responsive">
        <div class="btn-primary pull-right">
            <a href="{{route('admin.product.new')}}" class="btn btn-primary">Yeni</a>
        </div>
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>Slug</th>
                <th>Ürün Adı</th>
                <th>Açıklama</th>
                <th>Fiyat</th>
                <th>Kayıt Tarihi</th>
                <th>Operasyonlar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $entry)
                <tr>
                    <td>{{ $entry->slug }}</td>
                    <td>{{ $entry->product_name }}</td>
                    <td>{{ $entry->comment}}</td>
                    <td>{{ $entry->price}} ₺</td>
                    <td>{{ $entry->created_at }}</td>
                    <td style="width: 100px">
                       <a href="{{ route('admin.product.update', $entry->id) }}" class="btn btn-s btn-success" data-toggle="tooltip" data-placement="top" title="Düzenle">
                           <span class="fa fa-pencil" ></span>
                       </a>
                        <a href="{{ route('admin.product.delete', $entry->id) }}" class="btn btn-s btn-danger" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('{{$entry->name_lastname }} Kişisini silmek istediğinize emin misin?')">
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