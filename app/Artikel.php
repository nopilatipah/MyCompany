<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable=['judul','konten','kategori_id','foto','tgl_kegiatan','views','author'];
}
