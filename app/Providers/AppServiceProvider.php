<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Siparis;
use App\Models\Urun;
use App\Models\Kullanici;
use App\Models\Kategori;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()  /*TÜM VIEW DOSYALARINDA KULLANILABİLMESİ İÇİN BURADA TANIMLADIK*/
    {
        Schema::defaultStringLength(191);

        $bitisZamani = now()->addMinutes(10);
        $istatistikler = Cache::remember('istatistikler', $bitisZamani, function () {
            return [
                'bekleyen_siparis' => Siparis::where('durum', 'Siparişiniz alındı')->count(),
                'tamamlanan_siparis' => Siparis::where('durum', 'Sipariş tamamlandı')->count(),
                'toplam_urun' => Urun::count(),
                'toplam_kategori' => Kategori::count(),
                'toplam_kullanici' => Kullanici::count()
            ];
        });
        View::share('istatistikler', $istatistikler);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
