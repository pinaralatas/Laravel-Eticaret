<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
class KategoriController extends Controller
{
    public function index($slug_kategoriadi)
    {
        $kategori=Kategori::where('slug', $slug_kategoriadi)->firstOrFail();
        return view('kategori',compact('kategori'));
    }
}
