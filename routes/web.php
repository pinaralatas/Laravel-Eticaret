<?php


Route::get('/', 'AnasayfaController@index')->name('anasayfa');


Route::get('/kategori/{slug_kategoriadi}','KategoriController@index')->name('kategori');
Route::get('/urun/{slug_urunadi}','UrunController@index')->name('urun');
Route::post('/ara','UrunController@ara')->name('urun_ara');
Route::get('/ara','UrunController@ara')->name('urun_ara');
Route::get('/sepet','SepetController@index')->name('sepet')->middleware('auth');


//Aşağıdaki middleware tanımıyla fonksiyon içindeki bilgileri sadece giriş yapan kullanıcılar görebilecek.
Route::group(['middleware'=>'auth'],function (){
Route::get('/odeme','OdemeController@index')->name('odeme');
Route::get('/siparisler','SiparisController@index')->name('siparisler');
Route::get('/siparisler/{id}','SiparisController@detay')->name('siparis');
});


Route::post('/ara','UrunController@ara')->name('urun_ara');


Route::group(['prefix'=>'kullanici'],function (){
    Route::get('/oturumac','KullaniciController@giris_form')->name('kullanici.oturumac');
    Route::post('/oturumac','KullaniciController@giris');
    Route::get('/kaydol','KullaniciController@kaydol_form')->name('kullanici.kaydol');
    Route::post('/kaydol','KullaniciController@kaydol');
    Route::post('/oturumukapat','KullaniciController@oturumukapat')->name('kullanici.oturumukapat');
});

Route::get('/test/mail', function () {
    $kullanici = \App\Models\Kullanici::find(11);

    return new App\Mail\KullaniciKayitMail($kullanici);
});
