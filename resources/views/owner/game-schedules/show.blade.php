@extends('layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ $gameSchedule->date }}</h1>
    <div class="wrapper field-details">
        <h2>Date:</h2><p>{{ $gameSchedule->date }}</p>
        <h2>Price: </h2><p>{{ $gameSchedule->price }}</p>
        <h2>Limit: </h2><p>{{ $gameSchedule->limit }}</p>
    </div>
    <a href="/owner/game-schedule" class="back"> - Back to all game schedules </a>
@endsection
