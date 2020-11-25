<?php

namespace App\Http\Controllers\Owner;

use App\Models\Field;
use App\Models\FieldOwner;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FieldOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $fields = User::findOrFail($userId)->fields;

        return view('owner.fields.index', [
            'fields' => $fields,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owner.fields.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);

        $field = new Field();
        $field -> name = request('name');
        $field -> location = request('location');
        $field -> rules = request('rules');
        $field -> email = request('email');
        $field -> phone = request('phone');
        $field -> website = request('website');
        $field ->save();

        $user->fields()->save($field);

        return redirect('/owner/fields');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $field = Field::findOrFail($id);
        // use the $id variable to query the db for a record
        return view('owner.fields.show', ['field' => $field]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $field = Field::findOrFail($id);
        return view('owner.fields.edit', ['field' => $field]);
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
            'name' => 'required'
        ]);
        $field = Field::findOrFail($id);
        $field->update($request->all());
        return redirect('/owner/fields');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $field = Field::findOrFail($id);
        $field->delete();

        return redirect('/owner/fields');
    }
}
