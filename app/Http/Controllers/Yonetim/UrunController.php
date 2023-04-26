<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Urun;
use App\Models\UrunDetay;
use File;

class UrunController extends Controller
{
    public function index()
    {
        if (request()->filled('aranan')) {
            request()->flash();
            $aranan = request('aranan');
            $list = Urun::where('urun_adi', 'like', "%$aranan%")
                ->orWhere('aciklama', 'like', "%$aranan%")
                ->orderByDesc('id')
                ->paginate(6)
                ->appends('aranan', $aranan);
        } else {
            $list = Urun::orderByDesc('id')->paginate(6);
        }

        return view('yonetim.urun.index', compact('list'));
    }

    public function form($id = 0)
    {
        $entry = new Urun;
        $urun_kategorileri = [];
        if ($id > 0) {
            $entry = Urun::find($id);
            $urun_kategorileri = $entry->kategoriler()->pluck('kategori_id')->all();
        }

        $kategoriler = Kategori::all();

        return view('yonetim.urun.form', compact('entry', 'kategoriler', 'urun_kategorileri'));
    }

    public function kaydet($id = 0)
    {
        $data = request()->only('urun_adi', 'slug', 'aciklama', 'fiyat');
        if (!request()->filled('slug')) {
            $data['slug'] = str_slug(request('urun_adi'));
            request()->merge(['slug' => $data['slug']]);
        }

        $this->validate(request(), [
            'urun_adi' => 'required',
            'fiyat'   => 'required',
            'slug'     => (request('original_slug') != request('slug') ? 'unique:urun,slug' : '')
        ]);


        $kategoriler = request('kategoriler');
        $data_detay = request()->only( 'goster_gunun_firsati', 'goster_one_cikan', 'goster_cok_satan', 'goster_indirimli');

        if ($id > 0) {
            $entry = Urun::where('id', $id)->firstOrFail();
            $entry->update($data);

            $entry->detay()->update($data_detay);
            $entry->kategoriler()->sync($kategoriler); /*kategoriyi günceller*/
        } else {
            $entry = Urun::create($data);
            $entry->detay()->create($data_detay);
            $entry->kategoriler()->attach($kategoriler);

        }

        if (request()->hasFile('urun_resmi')) {

            $this->validate(request(), [
                'urun_resmi' => 'image|mimes:jpg,png,jpeg,gif|max:9999'
            ]);

            $urun_resmi = request()->file('urun_resmi');
            $urun_resmi =request()->urun_resmi;
            $dosyaadi = $urun_resmi->getClientOriginalName();


            if ($urun_resmi->isValid()) {
                $urun_resmi->move('uploads/urunler', $dosyaadi);

                UrunDetay::updateOrCreate(
                    ['urun_id' => $entry->id],
                    ['urun_resmi' => $dosyaadi]
                );
            }
        }


        return redirect()
            ->route('yonetim.urun.duzenle', $entry->id);

    }

    public function sil($id)
    {
        $urun = Urun::find($id);
        $urun->kategoriler()->detach();
        $urun->detay()->delete();

        $urun->delete();

        return redirect()
            ->route('yonetim.urun');
    }
}
