<?php

namespace App\Http\Controllers\Owner;

use App\Models\GameSchedule;
use App\Models\Field;
use App\Models\FieldOwner;
use App\Http\Controllers\Controller;
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

        return view('owner.game-schedules.create',['fieldId' => $fieldId]);
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
        $gameSchedule->date = request('date');
        $gameSchedule->price = request('price');
        $gameSchedule->limit = request('limit');
        $gameSchedule->field_id = $fieldId;
        $gameSchedule->save();

        return redirect('/owner/fields/' . $fieldId );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gameSchedule = GameSchedule::findOrFail($id);
        return view('owner.game-schedules.edit', ['gameSchedule' => $gameSchedule]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
        $fieldId = $gameSchedule->field->id;
        $gameSchedule->update($request->all());
        return redirect('/owner/fields/'. $fieldId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gameSchedule = GameSchedule::findOrFail( $id);
        $fieldId = $gameSchedule->field->id;
        $gameSchedule->delete();


        return redirect('/owner/fields/'. $fieldId);
    }
}
