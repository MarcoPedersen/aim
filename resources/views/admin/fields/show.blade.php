@extends('layouts.layout')

@section('content')
    <div class="wrapper field-details">
        <h1>{{ $field->name }}</h1>
        <img src="{{ asset('img/example_map.JPG') }}">
        <h2>Address:</h2><p>{{ $field->location }}</p>
        <h2>Email: </h2><p>{{ $field->email }}</p>
        <h2>Phone: </h2><p>{{ $field->phone }}</p>
        <h2>Website: </h2><p>{{ $field->website }}</p>
        <h2>Rules: </h2><p>{{ $field->rules }}</p>
        <h2>Schedules: </h2>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Date</th>
                <th>Price</th>
                <th>Limit</th>
                <th>Players attending</th>
            </tr>
            </thead>
        @foreach($field->gameSchedules as $gameSchedule)
           <tr>
               <td>{{ $gameSchedule->date }}</td>
               <td>{{ $gameSchedule->price }}</td>
               <td>{{ $gameSchedule->limit }}</td>
               <td>{{ $gameSchedule->players->count()}}</td>
           </tr>
        @endforeach
        </table>
    </div>
    <a href="/admin/fields" class="back"> - Back to all fields </a>
@endsection
