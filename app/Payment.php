<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['id','petugas_id','student_id','id_spp','deskription','jumlah_bayar'];

    // public function classes()
    // {
    //     return $this->belongsTo('App\Classe', 'class_id');
    // }

    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id');
    }

    public function spps()
    {
        return $this->belongsTo('App\Spp', 'id_spp');
    }

}
