<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTeam extends Model
{
    use HasFactory;

    protected $fillable = ['team_id', 'user_id'];


    public function team()
    {
        return $this->belongsTo('App\Models\Team');;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');;
    }
}
