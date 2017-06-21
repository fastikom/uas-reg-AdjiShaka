<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //membuat tabel buku
        Schema::create('buku',function(Blueprint $table){
         $table->increments('id');
         $table->string('kodeBuku');
         $table->string('judulBuku');
         $table->string('penulis');
         $table->string('penerbit');
         $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //buang tabel buku
        Schema::drop('buku');
    }
}
