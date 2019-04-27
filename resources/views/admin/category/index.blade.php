@extends('admin.layouts.master')
@section('title', 'Kategori Yönetimi')
@section('content')
    <h1 class="page-header">Kategori Yönetimi</h1>
    <h2 class="sub-header">
        Kategori Listesi
    </h2>
    <div class="table-responsive">
        <div class="btn-primary pull-right">
            <a href="{{route('admin.category.new')}}" class="btn btn-primary">Yeni</a>
        </div>
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>Adı</th>
                <th>Kategori</th>
                <th>Üst Kategori</th>
                <th>Kayıt Tarihi</th>
                <th>Operasyonlar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $entry)
                <tr>
                    <td>{{ $entry->slug }}</td>
                    <td>{{ $entry->category_name }}</td>
                    <td>{{ $entry->up_category->category_name}}</td>
                    <td>{{ $entry->created_at }}</td>
                    <td style="width: 100px">
                       <a href="{{ route('admin.category.update', $entry->id) }}" class="btn btn-s btn-success" data-toggle="tooltip" data-placement="top" title="Düzenle">
                           <span class="fa fa-pencil"></span>
                       </a>
                        <a href="{{ route('admin.category.delete', $entry->id) }}" class="btn btn-s btn-danger" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('{{$entry->category_name }} Kişisini silmek istediğinize emin misin?')">
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