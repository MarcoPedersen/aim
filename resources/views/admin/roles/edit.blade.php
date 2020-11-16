@extends('admin.layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Role</h1>
    <div class="wrapper edit-role">
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Role name</label>
            <input type="text" id="name" name="name" value="{{ $role->name }}">
            <input type="hidden" name="id" value="{{ $role->id }}">
            <input type="submit" value="Edit role">
        </form>
    </div>
@endsection
