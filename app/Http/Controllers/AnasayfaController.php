<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class AnasayfaController extends Controller
{
    public function index(){

    $kategoriler=Kategori::all(); //controller içindeki tüm kayıtları çek.
    return view('anasayfa',compact('kategoriler'));
    }
}
