<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
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
    public function sepet_urunler()
    {
        return $this->hasMany('App\Models\SepetUrun');
    }
    public static function aktif_sepet_id()
    {
        $aktif_sepet = DB::table('sepet as s')
            ->leftJoin('siparis as si', 'si.sepet_id', '=', 's.id')
            ->where('s.kullanici_id', auth()->id())
            ->whereRaw('si.id is null')
            ->orderByDesc('s.created_at')
            ->select('s.id')
            ->first();

        if (!is_null($aktif_sepet)) return $aktif_sepet->id;
    }

    public function sepet_urun_adet()
    {
        return DB::table('sepet_urun')
            ->where('sepet_id', $this->id)
            ->sum('adet');
    }
}
