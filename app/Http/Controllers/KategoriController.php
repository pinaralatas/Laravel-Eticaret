<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
class KategoriController extends Controller
{
    public function index($slug_kategoriadi)
    {
        $kategori=Kategori::where('slug', $slug_kategoriadi)->firstOrFail();

        $order = request('order');
        if ($order == 'coksatanlar') {

            $urunler = $kategori->urunler()
                ->join('urun_detay', 'urun_detay.urun_id', 'urun.id')
                ->orderBy('urun_detay.goster_cok_satan', 'desc')
                ->paginate(8);

        } else if ($order == 'yeni') {
            $urunler = $kategori->urunler()
                ->orderByDesc('guncelleme_tarihi')
                ->paginate(8);
        } else {
            $urunler = $kategori->urunler()
                ->orderByDesc('created_at')
                ->paginate(8);
        }

        return view('kategori',compact('kategori','urunler'));
    }
}
