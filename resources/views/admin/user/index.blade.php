@extends('admin.layouts.master')
@section('title', 'Kullanıcı Yönetimi')
@section('content')
    <h1 class="page-header">Kullanıcı Yönetimi</h1>
    <h2 class="sub-header">
        Kullanıcı Listesi
    </h2>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>id</th>
                <th>Ad Soyad</th>
                <th>Email</th>
                <th>Aktif mi</th>
                <th>Statü</th>
                <th>Kayıt Tarihi</th>
                <th>Operasyonlar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $entry)
                <tr>
                    <td>{{ $entry->id }}</td>
                    <td>{{ $entry->name_lastname }}</td>
                    <td>{{ $entry->email }}</td>
                    <td>
                        @if ($entry->active)
                            <span class="label label-success">Aktif</span>
                        @else
                            <span class="label label-warning">Aktif Değil</span>
                        @endif
                    </td>
                    <td>
                        @if ($entry->admin)
                            <span class="label label-success">Yönetici</span>
                        @else
                            <span class="label label-warning">Müşteri</span>
                        @endif
                    </td>
                    <td>{{ $entry->created_at }}</td>
                    <td style="width: 100px">
                       <a href="{{ route('admin.user.update', $entry->id) }}" class="btn btn-s btn-success" data-toggle="tooltip" data-placement="top" title="Düzenle">
                           <span class="fa fa-pencil" ></span>
                       </a>
                        <a href="{{ route('admin.user.delete', $entry->id) }}" class="btn btn-s btn-danger" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('{{$entry->name_lastname }} Kişisini silmek istediğinize emin misin?')">
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