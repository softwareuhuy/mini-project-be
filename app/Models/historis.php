<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historis extends Model
{
    protected $table = 'historis';
    protected $fillable = ['time','Temperature','Humidity','CO2','PM2,5','Wspeed','Wdirection'];
    protected $guarded = [];
    public $timestamps = false;
}
