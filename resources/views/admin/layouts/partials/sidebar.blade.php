<div class="list-group">
    <a href="{{ route('admin.homepage') }}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Giriş Sayfası</a>
    <a href="{{ route('admin.product') }}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Ürünler
        <span class="badge badge-dark badge-pill pull-right">{{ $statistics['products'] }}</span>
    </a>
    <a href="{{ route('admin.category') }}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Kategoriler
        <span class="badge badge-dark badge-pill pull-right">{{ $statistics['categories'] }}</span>
    </a>
    <a href="#" class="list-group-item collapsed" data-target="#submenu1" data-toggle="collapse" data-parent="#sidebar"><span class="fa fa-fw fa-dashboard"></span> Kategori Ürünleri<span class="caret arrow"></span></a>
    <div  class="list-group collapse" id="submenu1">
        @foreach(\App\Models\Category::where('up_id', null)->get() as $category)
            <a href="#" class="list-group-item collapsed" data-target="#submenu2" data-toggle="collapse" data-parent="#sidebar"><span class="fa fa-fw fa-dashboard"></span> {{ $category->category_name }}<span class="caret arrow"></span></a>
            <div  class="list-group collapse" id="submenu2">
                @foreach(\App\Models\Category::with('up_category') as $category)
                    <a href="#" class="list-group-item">{{ $category->category_name }}</a>@endforeach
            </div>
        @endforeach
    </div>
    <a href="{{ route('admin.user') }}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Kullanıcılar
        <span class="badge badge-dark badge-pill pull-right">{{ $statistics['users'] }}</span>
    </a>
    <a href="{{ route('admin.order') }}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Siparişler
        <span class="badge badge-dark badge-pill pull-right">{{ $statistics['orders'] }}</span>
    </a>

</div>
