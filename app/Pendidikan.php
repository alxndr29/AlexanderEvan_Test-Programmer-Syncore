<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    //
    protected $primaryKey = 'idpendidikan';
    protected $table = 'pendidikan';
    public $timestamps = false;
}
