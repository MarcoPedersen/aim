@extends('layouts.layout')

@section('content')
    <div class="wrapper create-field">
        <hi>Create a new field</hi>
        <form action="/admin/fields" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
            <label for="location">Location</label>
            <input type="text" id="location" name="location">
            <label for="rules">Rules</label>
            <input type="text" id="rules" name="rules">
            <input type="submit" value="Create field">
        </form>
    </div>
@endsection
