<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'story';
}
