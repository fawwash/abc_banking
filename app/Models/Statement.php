<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    protected $table;
    protected $fillable = ['user_id', 'datetime', 'amount', 'type', 'details', 'balance'];
}
