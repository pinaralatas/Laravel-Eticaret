<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{

    use SoftDeletes; //veritabanından silmez, silinme tarihini gösterir.

    protected $table = "kategori";
    protected $fillable = ['kategori_adi','slug'];
    //protected $guarded=[];
    const   CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


}
