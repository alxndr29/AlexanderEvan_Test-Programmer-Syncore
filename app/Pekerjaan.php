<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    //
    protected $primaryKey = 'idpekerjaan';
    protected $table = 'pekerjaan';
    public $timestamps = false;
}
