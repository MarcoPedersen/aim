@extends('layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Create a new field</h1>
    <form class="form" action="/admin/fields" method="POST">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name">
            </div>
        </div>
        <div class="form-group row">
            <label for="location" class="col-sm-2 col-form-label">Location</label>
            <div class="col-sm-10">
                <input type="text" name="location" class="form-control" id="location">
            </div>
        </div>
        <div class="form-group row">
            <label for="rules" class="col-sm-2 col-form-label">Rules</label>
            <div class="col-sm-10">
                <textarea name="rules" class="form-control" id="rules"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="email">
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" name="phone" class="form-control" id="phone">
            </div>
        </div>
        <div class="form-group row">
            <label for="website" class="col-sm-2 col-form-label">Website</label>
            <div class="col-sm-10">
                <input type="text" name="website" class="form-control" id="website">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                @include('maps.create', array())
            </div>
        </div>
        <input type="hidden" name="latitude" class="form-control" id="latitude">
        <input type="hidden" name="longitude" class="form-control" id="longitude">
    </form>
@endsection
