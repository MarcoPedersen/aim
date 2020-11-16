@extends('layouts.layout')

@section('content')
    <div class="wrapper field-details">
        <h1>information for {{ $field -> name }}</h1>
        <a href="{{ route('fields.edit', $field -> id) }}">Edit field</a>

    </div>
    <a href="/admin/fields" class="back"> - Back to all fields </a>
@endsection
