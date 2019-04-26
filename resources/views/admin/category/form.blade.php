@extends('admin.layouts.master')
@section('title', 'Kategori Düzenleme')
@section('content')
    <h1 class="page-header">Kategori Düzenleme</h1>
    <h2 class="sub-header">Form</h2>
    <form method="post" action="{{ route('admin.category.save', $entry) }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="up_id">Üst Kategori</label>
                    <select name="up_id" id="up_id" class="form-control">
                        <option value="">Kategori Seçiniz...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    <p>(Üst kategori seçilmediği durumda kayıt, üst kategori olarak ayarlanır.)</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="Kategori Slug" value="{{ old('category_name', $entry->slug)}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category_name">Kategori Adı</label>
                    <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Kategori Adı" value="{{ old('category_name', $entry->category_name)}}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Kaydet</button>
    </form>
@endsection