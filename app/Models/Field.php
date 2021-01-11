<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
    protected $fillable = ['name','location','rules', 'email', 'phone', 'website','latitude','longitude'];

    public $timestamps = true;

    public function gameSchedules()
    {
        return $this->hasMany('App\Models\GameSchedule');;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');;
    }

}
