@extends('layouts.layout')

@section('content')
    <h1 class="h1 mb-4 text-gray-800">{{ $field->name }}</h1>

    @if($fieldLocations)
        @include('maps.index', array('fieldLocations'=>$fieldLocations))
    @endif

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <td>Address:</td>
                <td>{{ $field->location }}</td>
            </tr>
            <tr>
                <td>Email: </td>
                <td>{{ $field->email }}</td>
            </tr>
            <tr>
                <td>Phone: </td>
                <td>{{ $field->phone }}</td>
            </tr>
            <tr>
                <td>Website:</td>
                <td>{{ $field->website }}</td>
            </tr>
            <tr>
                <td>Rules:</td>
                <td>{{ $field->rules }}</td>
            </tr>
        </table>

        <h1 class="h1 mb-4 text-gray-800">Schedules</h1>
        <p>
            <a href="/owner/game-schedules/create/?field_id={{ $field->id }}" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
                <span class="text">Create new Game day</span>
            </a>
        </p>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Date</th>
                <th>Price</th>
                <th>Limit</th>
                <th>Players attending</th>
                <th>Action</th>
            </tr>
            </thead>
        @foreach($field->gameSchedules as $gameSchedule)
           <tr>
               <td>{{ $gameSchedule->date }}</td>
               <td>{{ $gameSchedule->price }}</td>
               <td>{{ $gameSchedule->limit }}</td>
               <td>{{ $gameSchedule->players->count()}}</td>
               <td>
                   <a class="btn btn-primary btn-circle btn-sm" href="{{ route('owner.game-schedules.edit', $gameSchedule->id) }}"><i class="fa fa-edit"></i></a>
                   <form action="{{ route('owner.game-schedules.destroy', $gameSchedule -> id) }}" method="POST">
                       @csrf
                       @method('DELETE')
                       <button class="btn btn-danger btn-circle btn-sm"><i class="far fa-trash-alt"></i></button>
                   </form>
               </td>
           </tr>
        @endforeach
        </table>
    <h1 class="h1 mb-4 text-gray-800">Generate multiple schedules</h1>
    <p>
        <a href="/owner/schedule-generator/?field_id={{ $field->id }}" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Generate multiple game schedules</span>
        </a>
    </p>
    <a href="/owner/fields" class="back"> - Back to all fields </a>
@endsection
