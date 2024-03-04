<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class predict extends Model
{
    protected $table = 'predict';
    protected $fillable = ['time', 'CO2'];
    protected $guarded = [];
    public $timestamps = false;
}
