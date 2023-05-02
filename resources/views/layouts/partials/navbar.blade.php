<nav class="navbar ">
    <div class="container-fluid" style="padding: 0; margin: 0;">
        <div class="collapse navbar-collapse" id="navbar-collapse1">
            <ul class="nav navbar-nav navbar-right"  >
                <li><a href="#"><i class="fa fa-facebook" style=" color: #f5f2f2"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" style=" color: #f5f2f2"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" style=" color: #f5f2f2"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube" style=" color: #f5f2f2"></i></a></li>
            </ul>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="margin-left: 5px" href="{{route('anasayfa')}}">
                <img src="/img/img2.png">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background-color: #ffffff">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('sepet')}}"><i class="fa fa-shopping-cart"></i> Sepet <span class="badge badge-theme">{{Cart::count()}}</span></a></li>
                @guest()
                    <li><a href="{{route('kullanici.oturumac')}}">Oturum Aç</a></li>
                    <li><a href="{{route('kullanici.kaydol')}}">Kaydol</a></li>
                @endguest
                @auth()
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Profil <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('siparisler')}}">Siparişlerim</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Çıkış</a>
                                <form id="logout-form" action="{{ route('kullanici.oturumukapat') }}" method="post" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                <li>
                    <form class="navbar-form" action="{{route('urun_ara')}}" method="post">
                        {{csrf_field()}}
                        <div class="input-group">
                            <input type="text" name="aranan" id="navbar-search" class="form-control" placeholder="Ara">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
