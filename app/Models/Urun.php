<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Urun extends Model
{

    use SoftDeletes;
    protected $table="urun";
    protected $guarded=[];

    const   CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT='deleted_at';

    public function kategoriler()
    {      //kategorideki ürün verilerini çekmeyi sağlar
        return $this->belongsToMany('App\Models\Kategori','kategori_urun'); //çoka çok ilişki vardır
    }

    public function detay(){

        return $this->hasOne('App\Models\UrunDetay')->withDefault();
    }
}
