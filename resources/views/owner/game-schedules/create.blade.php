@extends('layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Create a new game schedule</h1>
    <form class="form" action="/owner/game-schedules" method="POST">
            @csrf
        <input type="hidden" value="{{ $fieldId }}" name="field_id">
        <div class="form-group row">
            <label for="date" class="col-sm-2 col-form-label">Date</label>
            <div class="col-sm-10">
                <input type="date" name="date" class="form-control" id="date">
            </div>
        </div>
        <div class="form-group row">
            <label for="time" class="col-sm-2 col-form-label">Time</label>
            <div class="col-sm-10">
                <input type="time" name="time" class="form-control" id="time" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
                <input type="text" name="price" class="form-control" id="price">
            </div>
        </div>
        <div class="form-group row">
            <label for="limit" class="col-sm-2 col-form-label">Limit</label>
            <div class="col-sm-10">
                <input type="text" name="limit" class="form-control" id="limit">
            </div>
        </div>
            <button type="submit" class="btn btn-primary float-right">Submit</button>
        </form>
@endsection
