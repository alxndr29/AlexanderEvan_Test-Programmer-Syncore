<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    //
    protected $primaryKey = 'idbiodata';
    protected $table = 'biodata';
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function pekerjaan()
    {
        return $this->hasMany('App\Pekerjaan', 'biodata_idbiodata');
    }
    public function pelatihan()
    {
        return $this->hasMany('App\Pelatihan','biodata_idbiodata');
    }
    public function pendidikan()
    {
        return $this->hasMany('App\Pendidikan','biodata_idbiodata');
    }
}
