@extends('layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                Welcome to the Dashboard, please use the sidebar to manage your features.

                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">My Teams</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
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
                                                <form action="{{ route('player.teams.destroy', $team -> id) }}" method="POST">
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

                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">My games</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Field</th>
                                        <th>Location</th>
                                        <th>price</th>
                                        <th>Limit</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Field</th>
                                        <th>Location</th>
                                        <th>price</th>
                                        <th>Limit</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($gamesAttended as $game)
                                        <tr>
                                            <td>{{ $game->gameSchedule->date }}</td>
                                            <td>{{ $game->gameSchedule->field->name }}</td>
                                            <td>{{ $game->gameSchedule->field->location }}</td>
                                            <td>{{ $game->gameSchedule->price }}</td>
                                            <td>{{ $game->gameSchedule->limit }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

@endsection
