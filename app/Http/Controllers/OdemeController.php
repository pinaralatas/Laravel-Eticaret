<?php

namespace App\Http\Controllers;

use App\Models\Siparis;
use Illuminate\Http\Request;
use Cart;
class OdemeController extends Controller
{
    public function index(){
        if (!auth()->check()) {
            return redirect()->route('kullanici.oturumac');
        } else if (count(Cart::content()) == 0) {
            return redirect()->route('anasayfa');
        }

        $kullanici_detay=auth()->user()->detay;

        return view('odeme',compact('kullanici_detay'));
    }

    public function odemeyap()
    {
        $siparis = request()->all();
        $siparis['sepet_id'] = session('aktif_sepet_id');
        $siparis['banka'] = "Garanti";
        $siparis['taksit_sayisi'] = 1;
        $siparis['durum'] = "Siparişiniz alındı";
        $siparis['siparis_tutari'] = Cart::subtotal();

        Siparis::create($siparis);
        Cart::destroy(); /* tüm siparisleri temizler*/
        session()->forget('aktif_sepet_id');  /* aktif_sepet_id yi siler*/

        return redirect()->route('siparisler');

    }
}


