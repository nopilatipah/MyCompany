<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $fillable =  ['artikel_id','nama_depan','nama_belakang','komentar'];
}
