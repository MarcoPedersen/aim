@extends('layouts.layout')

@section('content')
    <div class="wrapper create-team">
        <hi>Create a new team</hi>
        <form action="/player/teams" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
            <input type="submit" value="Create team">
        </form>
    </div>
@endsection
