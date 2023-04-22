<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Siparis extends Model
{
    use SoftDeletes;

    protected $table = "siparis";

    protected $fillable = [
        'sepet_id', 'siparis_tutari', 'durum',
        'adsoyad', 'adres', 'telefon', 'ceptelefonu', 'banka', 'taksit_sayisi'
    ];
    const   CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT='deleted_at';

    public function sepet()
    {
        return $this->belongsTo('App\Models\Sepet');
    }
}
