<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyPcrTesting extends Model
{
    public $timestamps = true;
    protected $table = 'daily_pcr_testing';
    protected $primaryKey = 'id';
    protected $fillable = [ 'id', 'date', 'pcr_count'];

}
