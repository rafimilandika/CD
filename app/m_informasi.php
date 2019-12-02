<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_informasi extends Model
{
    protected $table = 'penyakit';
    protected $primaryKey ='id_penyakit';
    public $timestamps = false;
}
