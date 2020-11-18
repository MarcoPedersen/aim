@extends('admin.layouts.layout')

@section('content')
    <div class="wrapper create-team">
        <hi>Create a new team</hi>
        <form action="teams" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
            <label for="user_id">User Id</label>
            <input type="text" id="user_id" name="user_id">
            <input type="submit" value="Create team">
        </form>
    </div>
@endsection
