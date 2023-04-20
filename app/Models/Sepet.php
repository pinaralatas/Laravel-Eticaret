<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sepet extends Model
{
    use SoftDeletes;
    protected $table='sepet';
    protected $guarded=[]; //tüm alanlar doldurulabilir demek.

    const   CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT='deleted_at';

    public function siparis()
    {
        return $this->hasOne('App\Models\Siparis');
    }
}
