<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dummy extends Model
{
    protected $table = 'dummy';
    protected $fillable = ['time', 'CO2'];
    protected $guarded = [];
    public $timestamps = false;
}
