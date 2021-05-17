@extends('layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Shop</h1>
    <form class="form" action="{{ route('admin.shops.update', $shop->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $shop->id }}">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" value="{{ $shop->name }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="location" class="col-sm-2 col-form-label">Location</label>
            <div class="col-sm-10">
                <input type="text" name="location" class="form-control" id="location" value="{{ $shop->location }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="email" value="{{ $shop->email }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" name="phone" class="form-control" id="phone" value="{{ $shop->phone }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="website" class="col-sm-2 col-form-label">Website</label>
            <div class="col-sm-10">
                <input type="text" name="website" class="form-control" id="website" value="{{ $shop->website }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>
        </div>
{{--        <div class="form-group row">--}}
{{--            <div class="col-sm-12">--}}
{{--                @include('maps.edit', array('location' => $shop->location))--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <input type="hidden" name="latitude" class="form-control" id="latitude" value="{{ $field->latitude }}">--}}
{{--        <input type="hidden" name="longitude" class="form-control" id="longitude" value="{{ $field->longitude }}">--}}
    </form>
@endsection
