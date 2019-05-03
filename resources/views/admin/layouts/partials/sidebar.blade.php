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
    <a href="{{ route('admin.user') }}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Kullanıcılar
        <span class="badge badge-dark badge-pill pull-right">{{ $statistics['users'] }}</span>
    </a>
    <a href="{{ route('admin.order') }}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Siparişler
        <span class="badge badge-dark badge-pill pull-right">{{ $statistics['orders'] }}</span>
    </a>

</div>
