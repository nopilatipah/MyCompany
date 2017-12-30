<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtikelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->text('tgl_kegiatan');
            $table->integer('kategori_id');
            $table->text('konten');
            $table->string('foto')->nullable()->default('default.png');
            $table->string('author');
            $table->integer('author_id');
            $table->integer('views')->nullable()->default('0');
            $table->integer('like')->nullable()->default('0');
            $table->integer('unlike')->nullable()->default('0');
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
        Schema::dropIfExists('artikels');
    }
}
