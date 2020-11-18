<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::orderBy('id','asc')->get();

        return view('admin.teams.index', [
            'teams' => $teams,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $team = new Team();
        $team->name = request('name');
        $team->user_id = request('user_id');

        $team->save();

        return redirect('/admin/teams')->with('mssg','The team has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::findOrFail($id);
        // use the $id variable to query the db for a record
        return view('admin/teams/show', ['team' => $team]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::orderBy('id','asc')->get();
        $team = Team::findOrFail($id);
        $userTeams = $team->userTeams;
        return view('admin/teams/edit', ['team' => $team, 'userTeams'=> $userTeams,'users' => $users]);
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
            'name' => 'required',
            'user_id' => 'required',
        ]);
        $team = Team::findOrFail($id);
        $team->update($request->all());
        return redirect('/admin/teams') -> with('mssg','The team has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team -> delete();

        return redirect('/admin/teams');
    }
}
