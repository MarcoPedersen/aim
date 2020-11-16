<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameSchedulePlayer extends Model
{
    use HasFactory;

    protected $fillable = ['player_id', 'game_schedule'];

    /**
     * Get schedules for gameSchedulePlayers
     */
    public function gameSchedule()
    {
        return $this->belongsTo('App\Models\GameSchedule');;
    }
}
