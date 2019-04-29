@extends('admin.layouts.master')
@section('title', 'Ürün Düzenleme')
@section('content')
    <h1 class="page-header">Ürün Düzenleme</h1>
    <h2 class="sub-header">Form</h2>
    <form method="post" action="{{ route('admin.product.save', $entry->id) }}">
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
        <div class="checkbox">
            <label>
                <input type="hidden" name="show_slider" value="0">
                <input type="checkbox" name="show_slider" id="show_slider" value="1" {{ old('show_slider', $entry->detail->show_slider) ? 'checked' : '' }}> Slider'da göster
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="hidden" name="show_opportunity" value="0">
                <input type="checkbox" name="show_opportunity" id="show_opportunity" value="1" {{ old('show_opportunity', $entry->detail->show_opportunity) ? 'checked' : '' }}> Günün fırsatlarında göster
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="hidden" name="show_featured" value="0">
                <input type="checkbox" name="show_featured" id="show_featured" value="1" {{ old('show_featured', $entry->detail->show_featured) ? 'checked' : '' }}> Öne çıkan ürünlerde göster
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="hidden" name="show_bestselling" value="0">
                <input type="checkbox" name="show_bestselling" id="show_bestselling" value="1" {{ old('show_bestselling', $entry->detail->show_bestselling) ? 'checked' : '' }}> En çok satan ürünlerde göster
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="hidden" name="show_reduced" value="0">
                <input type="checkbox" name="show_reduced" id="show_reduced" value="1" {{ old('show_reduced', $entry->detail->show_reduced) ? 'checked' : '' }}> İndirimli ürünlerde göster
            </label>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="categories">Kategoriler</label>
                    <select class="form-control" name="categories[]" id="categories" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                    {{ collect(old('categories', $product_categories))
                                    ->contains($category->id) ? 'selected': '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Kaydet</button>
    </form>
@endsection
@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(function () {
            $('#categories').select2({
                placeholder: 'Lütfen kategori seçiniz'
            })
        })
    </script>
@endsection