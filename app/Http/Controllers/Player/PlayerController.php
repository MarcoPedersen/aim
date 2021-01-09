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
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);
        $teams = $user->teams;
        $gamesAttended = $user->gamesAttended;
        return view('player.dashboard', [
            'teams' =>  $teams, 'gamesAttended'=> $gamesAttended
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

        $userCheck = $gameSchedule->players()
            ->where('user_id', $userId)
            ->get();

        if ($userCheck->isEmpty()) {
            $gameSchedule->players()->save($user);
        }

        return redirect()->route('player.fields.show', ['field' => $gameSchedule->field->id]);
    }


}
