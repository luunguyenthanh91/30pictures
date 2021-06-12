<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Story;

class Derector extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'derector';

    public function story()
    {
        return $this->hasOne(Story::class, 'id', 'story_id');
    }
}
