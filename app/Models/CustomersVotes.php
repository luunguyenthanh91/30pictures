<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomersVotes extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'customers_votes';
}
