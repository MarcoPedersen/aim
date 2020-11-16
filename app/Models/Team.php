<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\Models\User');;
    }

    public function members()
    {
        return $this->hasMany('App\Models\UserTeam');;
    }
}
