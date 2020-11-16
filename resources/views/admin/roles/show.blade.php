@extends('admin.layouts.layout')

@section('content')
    <div class="wrapper role-details">
        <h1>information for {{ $role -> name }}</h1>
        <a href="{{ route('roles.edit', $role -> id) }}">Edit role</a>

        <form action="{{ route('roles.destroy', $role -> id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Delete role</button>
        </form>
    </div>
    <a href="/admin/roles" class="back"> - Back to all Roles </a>
@endsection
