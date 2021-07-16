<?php

namespace App\Http\Controllers\Owner;

use App\Events\NewGameScheduleCreated;
use App\Models\GameSchedule;
use App\Http\Controllers\Controller;
use App\Services\GameScheduleService;
use Illuminate\Http\Request;

class GameScheduleOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $fieldId = request('field_id');

        return view('owner.game-schedules.create', ['fieldId' => $fieldId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fieldId = request('field_id');

        $gameSchedule = new GameSchedule();
        $gameSchedule->date = request('date') . ' ' . request('time');
        $gameSchedule->price = request('price');
        $gameSchedule->limit = request('limit');
        $gameSchedule->field_id = $fieldId;
        $gameSchedule->save();


        return redirect('/owner/fields/' . $fieldId);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gameSchedule = GameSchedule::findOrFail($id);
        // use the $id variable to query the db for a record
        return view('owner.game-schedules.show', ['gameSchedule' => $gameSchedule]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gameSchedule = GameSchedule::findOrFail($id);
        $gameSchedule->date = date('Y-m-d', strtotime($gameSchedule->date));
        $time = date('H:i:s', strtotime($gameSchedule->date));
//
        return view('owner.game-schedules.edit', ['gameSchedule' => $gameSchedule, 'time' => $time]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'price' => 'required',
            'limit' => 'required'
        ]);
        $gameSchedule = GameSchedule::findOrFail($id);
        $updateData = $request->all();
        data_set($updateData, 'date', $updateData['date'] . ' ' . $updateData['time']);
        $fieldId = $gameSchedule->field->id;
        $gameSchedule->update($updateData);
        return redirect('/owner/fields/' . $fieldId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gameSchedule = GameSchedule::findOrFail($id);
        $fieldId = $gameSchedule->field->id;
        $gameSchedule->delete();


        return redirect('/owner/fields/' . $fieldId);
    }

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
