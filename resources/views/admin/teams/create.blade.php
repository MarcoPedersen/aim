@extends('layouts.layout')

@section('content')
    <h1 class="h1 mb-4 text-gray-800">Create a new team</h1>
    <div class="wrapper create-team">
        <form action="/admin/teams" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
            <label for="user_id">User Id</label>
            <input type="text" id="user_id" name="user_id">

{{--            <label for="name">user</label>--}}
{{--            <select name="user_id" id="user_id">--}}
{{--                @foreach($users as $user)--}}
{{--                    <option value="{{ $user -> first_name }}"> {{ $user -> last_name }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--            <input type="submit" value="Create team">--}}
        </form>
    </div>
@endsection
