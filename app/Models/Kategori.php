<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{

    use SoftDeletes; //veritabanından silmez, silinme tarihini gösterir.

    protected $table = "kategori";

    //protected $fillable = ['kategori_adi','slug'];
    protected $guarded=[];                           //tüm kolonlar veritabanına eklenebilir demek
    const   CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT='deleted_at';

    public function urunler(){      //kategorideki ürün verilerini çekmeyi sağlar

        return $this->belongsToMany('App\Models\Urun','kategori_urun'); //çoka çok ilişki vardır
    }


}
