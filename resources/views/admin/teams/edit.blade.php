@extends('layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit team</h1>
    <div class="wrapper edit-team">
        <form class="form" action="{{ route('admin.teams.update', $team->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" value="{{ $team->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Owner</label>
                <div class="col-sm-10">
                    <select class="form-control" name="user_id" id="user_id">
                        @foreach($users as $user)
                            <option value="{{ $user -> id }}">{{ $user -> first_name }} {{ $user -> last_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary float-right">Update</button>
        </form>

        <h1 class="h3 mb-4 text-gray-800">Teams members</h1>
        <form class="form-inline" action="/admin/team-members" method="POST">
            @csrf
            <input type="hidden" name="team_id" value="{{$team->id}}">
            <div class="form-group mb-2">
                <select class="form-control" name="user_id" id="user_id">
                    @foreach($users as $user)
                        <option value="{{ $user -> id }}">{{ $user -> first_name }} {{ $user -> last_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Add to team</button>
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
                                    <form action="{{ route('admin.team-members.destroy', $member->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-circle btn-sm"><i class="far fa-trash-alt"></i></button>
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
