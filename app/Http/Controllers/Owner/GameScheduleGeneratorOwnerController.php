<?php

namespace App\Http\Controllers\Owner;

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
    public function create(Request $request)
    {
        $fieldId = request('field_id');

        return view('owner.game-schedule-generator',['fieldId' => $fieldId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fieldId = request('field_id');

        $gameSchedule= new GameSchedule();
        $gameSchedule->numberOfSchedules = request('schedules');
        $gameSchedule->date = request('date');
        $gameSchedule->price = request('price');
        $gameSchedule->limit = request('limit');
        $gameSchedule->field_id = $fieldId;
        $gameSchedule->save();

        return redirect('/owner/fields/' . $fieldId );
    }
}
