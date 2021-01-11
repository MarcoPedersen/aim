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
        <h2>Schedules: </h2>
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
                   @if(!in_array($gameSchedule->id, $gamesAttendedId))
                   <form action="{{ route('player.join-game')}}" method="POST">
                       <input type="hidden" name="game_schedule_id" value="{{ $gameSchedule->id }}">
                       @csrf
                       <button class="btn btn-primary btn-circle btn-sm"><i class="fas fa-user-plus"></i></button>
                   </form>
                   @else
                       <form action="{{ route('player.leave-game')}}" method="POST">
                           <input type="hidden" name="game_schedule_id" value="{{ $gameSchedule->id }}">
                           @csrf
                           @method('DELETE')
                           <button class="btn btn-danger btn-circle btn-sm"><i class="far fa-trash-alt"></i></button>
                       </form>
                   @endif
               </td>
           </tr>
        @endforeach
        </table>
    <a href="/player/fields" class="back"> - Back to all fields </a>
@endsection
