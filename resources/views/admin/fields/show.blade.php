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

    <a href="/admin/fields" class="back"> - Back to all fields </a>
@endsection
