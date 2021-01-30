<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['id','nisn','nis','class_id','alamat','no_telpon','id_spp'];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
