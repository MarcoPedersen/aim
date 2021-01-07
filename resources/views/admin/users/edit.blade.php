@extends('layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit user</h1>
    <div class="wrapper edit-user">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $user->id }}">

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">First name: </label>
                <div class="col-sm-10">
                    <input type="text" name="first_name" class="form-control" id="first_name" value="{{ $user->first_name }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Last name: </label>
                <div class="col-sm-10">
                    <input type="text" name="last_name" class="form-control" id="last_name" value="{{ $user->last_name }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">User name: </label>
                <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" id="username" value="{{ $user->username }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Email: </label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="email" value="{{ $user->email }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Role Id: </label>
                <div class="col-sm-10">
                    <input type="text" name="role_id" class="form-control" id="role_id" value="{{ $user->role_id }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary ">Submit</button>
        </form>
        <h1>Games attended</h1>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>Date</th>
                <th>Field</th>
                <th>Location</th>
                <th>price</th>
                <th>Limit</th>
            </tr>
        @foreach($gamesAttended as $game)
            <tr>
                <td>{{ $game->gameSchedule->date }}</td>
                <td>{{ $game->gameSchedule->field->name }}</td>
                <td>{{ $game->gameSchedule->field->location }}</td>
                <td>{{ $game->gameSchedule->price }}</td>
                <td>{{ $game->gameSchedule->limit }}</td>
            </tr>
        @endforeach
        </table>
        <h1>My fields</h1>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            @foreach($user->fields as $fieldOwner)
                <tr>
                    <td>{{ $fieldOwner->name }}</td>
                </tr>
            @endforeach
        </table>

        <h1>My teams</h1>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            @foreach($user->userTeams as $userTeam)
                <tr>
                    <td>{{ $userTeam->team->name }}</td>
                </tr>
            @endforeach
        </table>

        <h1>Teams I own</h1>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            @foreach($user->teamsOwned as $teamOwned)
                <tr>
                    <td>{{ $teamOwned->name }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
