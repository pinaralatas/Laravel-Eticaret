@extends('yonetim.layouts.sablon')
@section('title', 'Ürün Yönetimi')
@section('content')

    <h3 class="sub-header">Ürün Listesi</h3>
    <div class="well">
        <div class="btn-group pull-right">
            <a href="{{ route('yonetim.urun.yeni') }}" class="btn btn-primary">Ekle</a>
        </div>
        <form method="post" action="{{ route('yonetim.urun') }}" class="form-inline">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="aranan">Ara</label>
                <input type="text" class="form-control form-control-sm" name="aranan" id="aranan" placeholder="Ürün Ara..." value="{{ old('aranan') }}">
            </div>
            <button type="submit" class="btn btn-primary">Ara</button>
            <a href="{{ route('yonetim.urun') }}" class="btn btn-primary">Temizle</a>
        </form>
    </div>


    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Slug</th>
                <th>Ürün Adı</th>
                <th>Fiyatı</th>
                <th>Kayıt Tarihi</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $entry)
            <tr>
                <td>{{$entry->id}}</td>
                <td>{{$entry->slug}}</td>
                <td>{{$entry->kategori_adi}}</td>
                <td>{{$entry->fiyat}}</td>
                <td>{{$entry->created_at}}</td>

                <td style="width: 100px">
                    <a href="{{route('yonetim.urun.duzenle',$entry->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Düzenle">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <a href="{{route('yonetim.urun.sil',$entry->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('Emin misiniz?')">
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $list->appends('aranan',old('aranan'))->links() }}
    </div>
@endsection
