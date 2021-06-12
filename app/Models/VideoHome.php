<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoHome extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'video_home';
}
