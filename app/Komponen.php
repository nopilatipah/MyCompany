<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komponen extends Model
{
    protected $fillable = ['logo','nama_sekolah','deskripsi','tentang','akreditasi','motto','foto_utama'];
}
