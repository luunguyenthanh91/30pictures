<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'gallery';
}
