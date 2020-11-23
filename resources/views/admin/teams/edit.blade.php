@extends('layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit team</h1>
    <div class="wrapper edit-team">
        <form action="{{ route('teams.update', $team->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Team name</label>
            <input type="text" id="name" name="name" value="{{ $team->name }}">
            <label for="name">User Id</label>
            <input type="text" id="user_id" name="user_id" value="{{ $team->user_id }}">
            <input type="submit" value="Edit team">
        </form>

        <h1 class="h3 mb-4 text-gray-800">Teams members</h1>

        <form action="/admin/team-members" method="POST">
            @csrf
            <input type="hidden" name="team_id" value="{{$team->id}}">
            <label for="name">user</label>
            <select name="user_id" id="user_id">
                @foreach($users as $user)
                <option value="{{ $user -> id }}">{{ $user -> first_name }} {{ $user -> last_name }}</option>
                @endforeach
            </select>
            <input type="submit" value="Add to team">
        </form>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($team->members as $member)
                            <tr>
                                <td>{{ $member->user->id }}</td>
                                <td>{{ $member->user->first_name }} {{ $member->user->last_name }}</td>
                                <td>
                                    <form action="{{ route('team-members.destroy', $member->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
