@extends('layouts.layout')

@section('content')
    <div class="wrapper create-role">
        <hi>Create a new Role</hi>
        <form action="/admin/roles" method="POST">
            @csrf
            <label for="name">Role name</label>
            <input type="text" id="name" name="name">
            <input type="submit" value="Create role">
        </form>
    </div>
@endsection
