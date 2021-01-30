<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $table = 'classes';

    protected $fillable = ['id','class','kompetensi_keahlian'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}