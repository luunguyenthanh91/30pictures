<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'setting';
}
