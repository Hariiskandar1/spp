<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['id','nisn','nis','class_id','alamat','no_telpon','id_spp'];

    public function classes()
    {
        return $this->belongsTo('App\Classe', 'class_id');
    }

    public function spps()
    {
        return $this->belongsTo('App\Spp', 'id_spp');
    }
}
