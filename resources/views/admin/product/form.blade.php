@extends('admin.layouts.master')
@section('title', 'Ürün Düzenleme')
@section('content')
    <h1 class="page-header">Ürün Düzenleme</h1>
    <h2 class="sub-header">Form</h2>
    <form method="post" action="{{ route('admin.product.save', $entry) }}">
        {{ csrf_field() }}
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
                    <label for="product_name">Ürün Adı</label>
                    <input type="text" class="form-control" width="15px" name="product_name" id="product_name" placeholder="Ürün Adı" value="{{ old('product_name', $entry->product_name)}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="comment">Açıklama</label>
                    <input type="text" class="form-control" name="comment" id="comment" placeholder="Açıklama" value="{{ old('comment', $entry->comment)}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="price">Fiyat</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="Fiyat" value="{{ old('price', $entry->price)}}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Kaydet</button>
    </form>
@endsection