<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        if (request()->filled('aranan')) {
            request()->flash();
            $aranan = request('aranan');
            $list = Kategori::where('kategori_adi', 'like', "%$aranan%")
                ->orderByDesc('created_at')
                ->paginate(6)
                ->appends('aranan', $aranan);
        } else {
            $list = Kategori::orderByDesc('created_at')->paginate(6);
        }


        return view('yonetim.kategori.index', compact('list'));
    }

    public function form($id = 0)
    {
        $entry = new Kategori;
        if ($id > 0) {
            $entry = Kategori::find($id);
        }

        $kategoriler = Kategori::all();

        return view('yonetim.kategori.form', compact('entry', 'kategoriler'));
    }

    public function kaydet($id = 0)
    {
        $data = request()->only('kategori_adi', 'slug', 'ust_id');

        if (!request()->filled('slug')) {  /*SLUG DEĞERİ BOŞSA OTOMATİK OLUŞTURUR*/
            $data['slug'] = str_slug(request('kategori_adi'));
            request()->merge(['slug' => $data['slug']]);
        }

        $this->validate(request(), [
            'kategori_adi' => 'required',
            'slug'         => (request('original_slug') != request('slug') ? 'unique:kategori,slug' : '')
        ]);

        if ($id > 0) {
            $entry = Kategori::where('id', $id)->firstOrFail();
            $entry->update($data);
        } else {
            $entry = Kategori::create($data);
        }

        return redirect()->route('yonetim.kategori.duzenle', $entry->id);
    }

    public function sil($id)
    {
        $kategori = Kategori::find($id);
        $kategori->urunler()->detach(); /*ÇOKA ÇOK İLİŞKİLİ TABLOLARDA DA SİLME İŞLEMİNİ YAPAR */
        $kategori->delete();

        return redirect()->route('yonetim.kategori');

    }
}
