<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelpAndGuide extends Model
{
    public $timestamps = true;
    protected $table = 'help_and_guide';
    protected $primaryKey = 'id';
    protected $fillable = ['id','user_id','description','link'];

    public function user_details()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
