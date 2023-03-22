<?php


Route::get('/', 'AnasayfaController@index')->name('anasayfa');

Route::get('/merhaba', function () {
    return ('merhaba');
});

Route::get('/urun/{urunadi}',function ($urunadi){
    return "Ürün adı: $urunadi";
});
