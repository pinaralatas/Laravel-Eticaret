<?php

namespace App\Http\Controllers\Yonetim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Siparis;
use Illuminate\Support\Facades\Cache;

class AnasayfaController extends Controller
{
    public function index(){
        $bitisZamani=now()->addMinutes(10);
        $istatistikler=Cache::remember('istatistikler',$bitisZamani,function (){
            return ['bekleyen_siparis'=>Siparis::where('durum','Siparişiniz alındı')->count()];
        });
        $bekleyen_siparis=Siparis::where('durum','Siparişiniz alındı')->count();

        return view('yonetim.anasayfa',compact('istatistikler'));
    }
}
