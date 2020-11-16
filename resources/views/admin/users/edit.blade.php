@extends('admin.layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit user</h1>
    <div class="wrapper edit-user">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $user->id }}">
            <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}">
            <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}">
            <input type="text" id="username" name="username" value="{{ $user->username }}">
            <input type="text" id="email" name="email" value="{{ $user->email }}">
            <input type="text" id="role_id" name="role_id" value="{{ $user->role_id }}">
            <input type="submit" value="Edit user">
        </form>
        <h1>Games attended</h1>
        <table>
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
        <table>
            <tr>
                <th>field name</th>
            </tr>
            @foreach($user->fields as $fieldOwner)
                <tr>
                    <td>{{ $fieldOwner->field->name }}</td>
                </tr>
            @endforeach
        </table>

        <h1>My teams</h1>
        <table>
            <tr>
                <th>team name</th>
            </tr>
            @foreach($user->userTeams as $userTeam)
                <tr>
                    <td>{{ $userTeam->team->name }}</td>
                </tr>
            @endforeach
        </table>

        <h1>Teams I own</h1>
        <table>
            <tr>
                <th>team name</th>
            </tr>
            @foreach($user->teamsOwned as $teamOwned)
                <tr>
                    <td>{{ $teamOwned->name }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
