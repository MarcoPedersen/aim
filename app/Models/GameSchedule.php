<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'date', 'field_id', 'price', 'limit'];

    public $timestamps = true;

    /**
     * Get fields for gameSchedule
     */
    public function field()
    {
        return $this->belongsTo('App\Models\Field');;
    }

    /**
     * Get all users belonging to this game_schedule through the game_schedule_players table
     */
    public function players()
    {
        return $this->belongsToMany('App\Models\User', 'game_schedule_players');
    }
}
