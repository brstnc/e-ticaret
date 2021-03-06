<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('homepage')}}">
                <img src="/E-Ticaret/laravel/public/img/logo.png">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left" action="{{route('search')}}" method="post">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" name="call" id="navbar-search" class="form-control" placeholder="Ara">
                    <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('basket') }}"><i class="fa fa-shopping-cart"></i> Sepet <span class="badge badge-theme">@if(Cart::count()>0){{Cart::count()}}@endif</span></a></li>
                @guest
                <li><a href="{{route('user.signin')}}">Oturum Aç</a></li>
                <li><a href="{{ route('user.signup') }}">Kaydol</a></li>
                @endguest
                @auth
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> {{ \Illuminate\Support\Facades\Auth::user()->name_lastname }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('orders') }}">Siparişlerim</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('profile') }}">Profil</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                                Çıkış
                            </a>
                            <form id="logout-form" action="{{ route('user.logout') }}" method="post" style="display: none">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>