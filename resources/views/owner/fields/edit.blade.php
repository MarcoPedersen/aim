@extends('admin.layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Field</h1>
    <form class="form" action="{{ route('owner.fields.update', $field->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $field->id }}">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" value="{{ $field->name }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="location" class="col-sm-2 col-form-label">Location</label>
            <div class="col-sm-10">
                <input type="text" name="location" class="form-control" id="location" value="{{ $field->location }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="rules" class="col-sm-2 col-form-label">Rules</label>
            <div class="col-sm-10">
                <textarea name="rules" class="form-control" id="rules">{{ $field->rules }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="email" value="{{ $field->email }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" name="phone" class="form-control" id="phone" value="{{ $field->phone }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="website" class="col-sm-2 col-form-label">Website</label>
            <div class="col-sm-10">
                <input type="text" name="website" class="form-control" id="website" value="{{ $field->website }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
@endsection
