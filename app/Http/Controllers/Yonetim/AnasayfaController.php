<?php

namespace App\Http\Controllers\Yonetim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Siparis;

class AnasayfaController extends Controller
{
    public function index(){

        $bekleyen_siparis=Siparis::where('durum','Siparişiniz alındı')->count();

        return view('yonetim.anasayfa',compact('bekleyen_siparis'));
    }
}
