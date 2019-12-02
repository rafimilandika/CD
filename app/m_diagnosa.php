<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_diagnosa extends Model
{
    protected $table = 'gejala';
    protected $primaryKey ='id_gejala';
    public $timestamps = false;
}
