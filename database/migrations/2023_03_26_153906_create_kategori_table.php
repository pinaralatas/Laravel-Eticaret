<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kategori_adi',30);
            $table->string('slug',40);
            $table->timestamps(); //create date ve update date
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()     //silme durumu için
    {
        Schema::dropIfExists('kategori');
    }
}
