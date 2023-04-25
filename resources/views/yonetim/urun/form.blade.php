@extends('yonetim.layouts.sablon')
@section('title', 'Kategori Yönetimi')
@section('content')

    <form method="post" action="{{route('yonetim.kategori.kaydet',@$entry->id)}}">
        {{ csrf_field() }}

        <h3 class="sub-header">
            Kategori {{ $entry->id > 0 ? "Düzenle" : "Ekle" }}
        </h3>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kategori_adi">Kategori Adı</label>
                    <input type="text" class="form-control" id="kategori_adi" name="kategori_adi" placeholder="Kategori Adı" value="{{old('kategori_adi',$entry->kategori_adi)}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="hidden" name="original_slug" value="{{ old('slug', $entry->slug) }}">
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{old('adres',$entry->slug)}}">
                </div>
            </div>
        </div>


            <button type="submit" class="btn btn-primary">
                {{ $entry->id > 0 ? "Güncelle" : "Kaydet" }}
            </button>

    </form>

@endsection
