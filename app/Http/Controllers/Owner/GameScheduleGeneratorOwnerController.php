<?php

namespace App\Http\Controllers\Owner;

use App\Events\NewGameScheduleCreated;
use App\Models\GameSchedule;
use App\Http\Controllers\Controller;
use App\Services\GameScheduleService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class GameScheduleGeneratorOwnerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function createSchedule(Request $request)
    {
        $fieldId = request('field_id');

        return view('owner.game-schedules.schedule-generator', ['fieldId' => $fieldId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeSchedule(Request $request)
    {
        $fieldId = request('field_id');
        $numberOfSchedules = request('numberOfSchedules');
        $price = request('price');
        $limit = request('limit');
        $schedule = request('choiceOfDay');

        $gameScheduleService = new GameScheduleService();
        $gameScheduleService->generateGameSchedule($fieldId, $numberOfSchedules, $price, $limit, $schedule);

        return redirect('/owner/fields/' . $fieldId);
    }
}
