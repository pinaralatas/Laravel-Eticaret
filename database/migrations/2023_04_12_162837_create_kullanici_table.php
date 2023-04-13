<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKullaniciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kullanici', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adsoyad', 60);
            $table->string('email', 150)->unique();
            $table->string('sifre', 60);
            $table->string('aktivasyon_anahtari', 60)->nullable();
            $table->boolean('aktif_mi')->default(0);
            $table->rememberToken();


            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); //create date ve update date
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kullanici');
    }
}
