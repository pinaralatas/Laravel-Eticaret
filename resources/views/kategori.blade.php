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
                        @foreach($kategoriler as $kategori)
                            <a href="{{ route('kategori',$kategori->slug)  }} " class="list-group-item">
                                <i class="fa fa-arrow-circle-o-right"></i>
                                {{$kategori->kategori_adi}}
                            </a>
                        @endforeach
                    </div>

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
                        <a href="{{route('urun',$urun->slug)}}">
                            <img src="{{ $urun->detay->urun_resmi!=null ? asset('uploads/urunler/' . $urun->detay->urun_resmi) : 'http://via.placeholder.com/400x400?text=UrunResmi' }}"></a>
                        <p><a href="{{ route('urun',$urun->slug) }}">{{$urun->urun_adi}}</a></p>
                        <p class="price">{{$urun->fiyat}} </p>
                        <form action="{{ route('sepet.ekle')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$urun->id}}">
                            <input type="submit" class="btn btn-theme" value="Sepete Ekle">
                        </form>
                        <br>
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
