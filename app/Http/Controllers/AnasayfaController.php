<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Urun;
use App\Models\UrunDetay;

use Illuminate\Http\Request;
class AnasayfaController extends Controller
{
    public function index(){

    $kategoriler=Kategori::all(); //controller içindeki tüm kayıtları çek.


    $urun_gunun_firsati=Urun::select('urun.*')
        ->join('urun_detay','urun_detay.urun_id','urun.id')
        ->where('urun_detay.goster_gunun_firsati',1)
        ->orderBy('created_at','desc')
        ->first();

    $urunler_one_cikan=UrunDetay::with('urun')->where('goster_one_cikan',1)->take(4)->get();
    $urunler_cok_satan=UrunDetay::with('urun')->where('goster_cok_satan',1)->take(4)->get();
    $urunler_indirimli=UrunDetay::with('urun')->where('goster_indirimli',1)->take(4)->get();

    return view('anasayfa',compact('kategoriler','urun_gunun_firsati','urunler_one_cikan','urunler_cok_satan','urunler_indirimli'));
    }
}
