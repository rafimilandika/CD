<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_forum extends Model
{
    protected $table = 'forum';
    protected $primaryKey ='id_forum';
    public $timestamps = false;
}
