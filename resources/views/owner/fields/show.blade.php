@extends('layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ $field->name }}</h1>
    <div class="wrapper field-details">
        <img src="{{ asset('img/example_map.JPG') }}">
        <h2>Address:</h2><p>{{ $field->location }}</p>
        <h2>Email: </h2><p>{{ $field->email }}</p>
        <h2>Phone: </h2><p>{{ $field->phone }}</p>
        <h2>Website: </h2><p>{{ $field->website }}</p>
        <h2>Rules: </h2><p>{{ $field->rules }}</p>
        <h2>Schedules: </h2>
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
    </div>
    <a href="/owner/fields" class="back"> - Back to all fields </a>
@endsection
