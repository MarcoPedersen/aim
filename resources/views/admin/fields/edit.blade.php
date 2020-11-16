@extends('admin.layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Field</h1>
    <div class="wrapper edit-field">
        <form action="{{ route('fields.update', $field->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $field->id }}">
            <input type="text" id="name" name="name" value="{{ $field->name }}">
            <input type="text" id="location" name="location" value="{{ $field->location }}">
            <input type="text" id="rules" name="rules" value="{{ $field->rules }}">
            <input type="submit" value="Edit field">
        </form>
    </div>
@endsection
