<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'votes';
}
