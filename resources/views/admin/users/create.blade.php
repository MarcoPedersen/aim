@extends('layouts.layout')

@section('content')
    <div class="wrapper create-user">
        <hi>Create a new user</hi>
        <form action="/admin/users" method="POST">
            @csrf
            <label for="first_name">First name</label>
            <input type="text" id="first_name" name="first_name">
            <label for="last_name">Last name</label>
            <input type="text" id="last_name" name="last_name">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
            <label for="email">Email</label>
            <input type="text" id="email" name="email">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <label for="role_id">Role id</label>
            <input type="text" id="role_id" name="role_id">
            <input type="submit" value="Create user">
        </form>
    </div>
@endsection
