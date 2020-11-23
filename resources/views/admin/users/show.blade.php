@extends('layouts.layout')

@section('content')
    <div class="wrapper user-details">
        <h1>information for {{ $user -> first_name }}</h1>
        <a href="{{ route('roles.edit', $user -> id) }}">Edit user</a>

    </div>
    <a href="/admin/users" class="back"> - Back to all Users </a>
@endsection
