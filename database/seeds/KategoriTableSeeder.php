<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->truncate(); //çalıştığı anda tablodaki tüm verileri silecektir.
        DB::table('kategori')->insert(['kategori_adi'=>'Kadın Parfümleri','slug'=>'kadinparfumleri']);
        DB::table('kategori')->insert(['kategori_adi'=>'Erkek Parfümleri','slug'=>'erkekparfumleri']);
        DB::table('kategori')->insert(['kategori_adi'=>'Tüm Parfümler','slug'=>'tumparfumler']);
       // DB::table('kategori')->insert(['kategori_adi'=>'Yeni Ürünler','slug'=>'yeniurunler']);
    }
}
