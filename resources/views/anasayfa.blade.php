@extends('layouts.sablon')
@section('title','Anasayfa')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#990051; color: #f5f2f2 ">Kategoriler</div>
                    <div class="list-group categories">
                        @foreach($kategoriler as $kategori)
                        <a href="{{ route('kategori',$kategori->slug)  }} " class="list-group-item">
                            <i class="fa fa-arrow-circle-o-right"></i>
                            {{$kategori->kategori_adi}}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="/img/slider1.png" alt="...">
                            <div class="carousel-caption">
                                Land of Parfume
                            </div>
                        </div>
                        <div class="item">
                            <img src="/img/slider2.jpg" alt="...">
                            <div class="carousel-caption">
                                Land of Parfume
                            </div>
                        </div>
                        <div class="item">
                            <img src="/img/slider3.png" alt="...">
                            <div class="carousel-caption">
                                Land of Parfume
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default" id="sidebar-product">
                    <div class="panel-heading"  style="background-color:#990051; color: #f5f2f2" >Günün Fırsatı</div>
                    <div class="panel-body">
                        <a href="{{ route('urun',$urun_gunun_firsati->slug) }}">
                            <img src="{{ $urun_gunun_firsati->detay->urun_resmi!=null ? asset('uploads/urunler/' . $urun_gunun_firsati->detay->urun_resmi) : 'http://via.placeholder.com/400x485?text=UrunResmi' }}" class="img-responsive" style="min-width: 100%;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-theme">
                    <div class="panel-heading">Öne Çıkan Ürünler</div>
                    <div class="panel-body">
                        <div class="row">
                            @foreach($urunler_one_cikan as $urun)
                                <div class="col-sm-6 col-md-3 product">
                                    <div class="thumbnail">
                                        <a href="{{ route('urun', $urun->slug) }}">
                                            <img src="{{ $urun->detay->urun_resmi != null ? asset('uploads/urunler/' . $urun->detay->urun_resmi) : 'http://via.placeholder.com/400x400?text=UrunResmi' }}" alt="{{ $urun->urun_adi }}">
                                        </a>
                                        <div class="caption" style="background-color: rgba(82,82,82,0.13)">
                                            <h4 class="text-center" style="font-size: 1.2rem;"><a href="{{ route('urun', $urun->slug) }}">{{ $urun->urun_adi }}</a></h4>
                                            <p class="text-center price" style="font-size: 1rem;">{{ $urun->fiyat }}₺</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-theme">
                    <div class="panel-heading">Çok Satan Ürünler</div>
                    <div class="panel-body">
                        <div class="row">
                            @foreach($urunler_cok_satan as $urun)
                                <div class="col-sm-6 col-md-3 product">
                                    <div class="thumbnail">
                                        <a href="{{ route('urun', $urun->slug) }}">
                                            <img src="{{ $urun->detay->urun_resmi != null ? asset('uploads/urunler/' . $urun->detay->urun_resmi) : 'http://via.placeholder.com/400x400?text=UrunResmi' }}" alt="{{ $urun->urun_adi }}">
                                        </a>
                                        <div class="caption" style="background-color: rgba(82,82,82,0.13)">
                                            <h4 class="text-center" style="font-size: 1.2rem;"><a href="{{ route('urun', $urun->slug) }}">{{ $urun->urun_adi }}</a></h4>
                                            <p class="text-center price" style="font-size: 1rem;">{{ $urun->fiyat }}₺</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-theme">
                    <div class="panel-heading">İndirimli Ürünler</div>
                    <div class="panel-body">
                        <div class="row">
                            @foreach($urunler_indirimli as $urun)
                                <div class="col-sm-6 col-md-3 product">
                                    <div class="thumbnail">
                                        <a href="{{ route('urun', $urun->slug) }}">
                                            <img src="{{ $urun->detay->urun_resmi != null ? asset('uploads/urunler/' . $urun->detay->urun_resmi) : 'http://via.placeholder.com/400x400?text=UrunResmi' }}" alt="{{ $urun->urun_adi }}">
                                        </a>
                                        <div class="caption" style="background-color: rgba(82,82,82,0.13)">
                                            <h4 class="text-center" style="font-size: 1.2rem;"><a href="{{ route('urun', $urun->slug) }}">{{ $urun->urun_adi }}</a></h4>
                                            <p class="text-center price" style="font-size: 1rem;">{{ $urun->fiyat }}₺</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
