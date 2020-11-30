<?php

namespace App\Http\Controllers\Player;

use App\Models\GameSchedule;
use App\Models\Team;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    public function dashboard()
    {
        return view('player.dashboard', [
        ]);
    }

    public function joinTeam(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);
        $teamId =$request->input('team_id');
        $team = Team::findOrFail($teamId);
        $user->teams()->save($team);

        return redirect()->route('player.teams.show', [$teamId]);
    }

    public  function joinGame (Request $request)
    {
        $userId = Auth::user()->id;

        $user = User::findOrFail($userId);
        $gameScheduleId = $request->input('game_schedule_id');
        $gameSchedule = GameSchedule::findOrFail($gameScheduleId);
        $user->gameSchedule()->save($gameSchedule);

        return redirect()->route('player.fields.show'. $gameSchedule->field->id);
    }
}
