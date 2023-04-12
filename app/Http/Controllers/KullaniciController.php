<?php

namespace App\Http\Controllers;

use App\Mail\KullaniciKayitMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Kullanici;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class KullaniciController extends Controller
{
    public function giris_form()
    {
        return view('kullanici.oturumac');
    }

    public function kaydol_form()
    {
        return view('kullanici.kaydol');
    }

    public function kaydol()
    {
        $this->validate(request(), [   //Girdiğimiz bilgileri kontrol ettirmek için
            'adsoyad' => 'required|min:5|max:60',
            'email'   => 'required|email|unique:kullanici',
            'sifre'   => 'required|confirmed|min:5|max:15'
        ]);

        $kullanici=Kullanici::create([
            'adsoyad'=>request('adsoyad'),
            'email'=>request('email'),
            'sifre' =>Hash::make(request('sifre')),
            'aktivasyon_anahtari'=>Str::random(60),
            'aktif_mi'=>0


        ]);

        Mail::to(request('email'))->send(new KullaniciKayitMail($kullanici));

        auth()->login($kullanici);
        return redirect()->route('anasayfa');

    }


}
