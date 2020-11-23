@extends('layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Teams</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Team owner</th>
                        <th>Total members</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Team owner</th>
                        <th>Total members</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($teams as $team)
                        <tr>
                            <td>{{ $team->id }}</td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->user->first_name }} {{ $team->user->last_name }}</td>
                            <td>{{ $team->members->count()}}</td>
                            <td>
                                <a class="btn btn-success btn-circle btn-sm" href="{{ route('player.teams.show', $team->id) }}"><i class="fas fa-eye"></i></a>
{{--                                <a class="btn btn-primary btn-circle btn-sm" href=""><i class="fa fa-edit"></i></a>--}}
{{--                                <form action="{{ route('teams.destroy', $team->id) }}" method="POST">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button class="btn btn-danger btn-circle btn-sm"><i class="far fa-trash-alt"></i></button>--}}
{{--                                </form>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
