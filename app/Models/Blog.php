<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'blog';
}
