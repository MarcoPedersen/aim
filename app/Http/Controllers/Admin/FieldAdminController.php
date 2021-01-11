<?php

namespace App\Http\Controllers\Admin;

use App\Models\Field;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FieldAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = Field::orderBy('id','asc')->get();

        return view('admin.fields.index', [
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
        return view('admin.fields.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $field = new Field();
        $field -> name = request('name');
        $field -> location = request('location');
        $field -> rules = request('rules');
        $field -> email = request('email');
        $field -> phone = request('phone');
        $field -> website = request('website');
        $field -> latitude = request('latitude');
        $field -> longitude = request('longitude');
        $field ->save();
        return redirect('/admin/fields');
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
        $fieldLocations = null;
        if (!empty($field->latitude && !empty($field->longitude))){
            $fieldLocations[] = ['lat'=>$field->latitude,'lng'=>$field->longitude];
        }
        return view('admin/fields/show', [
            'field' => $field,
            'fieldLocations' => json_encode($fieldLocations)
        ]);
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
        return view('admin/fields/edit', ['field' => $field]);
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
        return redirect('/admin/fields') -> with('mssg','The field has been edited');
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
        $field -> delete();

        return redirect('/admin/fields');
    }
}
