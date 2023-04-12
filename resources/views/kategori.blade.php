@extends('layouts.sablon') {{-- layouts klasöründeki "sablon" şablonunu kullanacağımızı tanımladık --}}
@section('title','Kategori') {{--değiştirilebilir olan title adını kategori yaptık --}}
@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{route('anasayfa')}}">Anasayfa</a></li>
        <li class="active">{{$kategori->kategori_adi}}</li>
    </ol>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">{{$kategori->kategori_adi}}</div>
                <div class="panel-body">
                    <h3>Alt Kategoriler</h3>
                    <div class="list-group categories">
                        <a href="{{route('anasayfa')}}" class="list-group-item"><i class="fa fa-television"></i> Anasayfa</a>
                        <a href="{{route('anasayfa')}}" class="list-group-item"><i class="fa fa-television"></i> Anasayfa</a>
                        <a href="{{route('anasayfa')}}" class="list-group-item"><i class="fa fa-television"></i> Anasayfa</a>
                    </div>
                    <h3>Fiyat Aralığı</h3>
                    <form>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> 100-200
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> 200-300
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="products bg-content">
                Sırala
                <a href="?order=coksatanlar" class="btn btn-default">Çok Satanlar</a>
                <a href="?order=yeni" class="btn btn-default">Yeni Ürünler</a>
                <hr>
                <div class="row">
                    @foreach($urunler as $urun)
                    <div class="col-md-3 product">
                        <a href="{{ route('urun',$urun->slug) }}"><img src="http://lorempixel.com/400/400/food/1"></a>
                        <p><a href="{{ route('urun',$urun->slug) }}">{{$urun->urun_adi}}</a></p>
                        <p class="price">{{$urun->fiyat}} </p>
                        <p><a href="#" class="btn btn-theme">Sepete Ekle</a></p>
                    </div>
                    @endforeach
                </div>
                <!-- Aşağıdaki kodda,eğer adres satırında order'la ilgili bir query string varsa bu değeri bağlantılara ekler. -->
                {{request()->has('order') ? $urunler->appends(['order'=>request('order')]) -> links() : $urunler->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
