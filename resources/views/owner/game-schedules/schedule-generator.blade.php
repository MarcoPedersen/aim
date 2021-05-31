@extends('layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Generate a new game schedule or more at a time</h1>
    <form class="form" action="/owner/save-game-schedule-generator" method="POST">
        @csrf
        <input type="hidden" value="{{ $fieldId }}" name="field_id">
        <div class="form-group row">
            <label for="numberOfSchedules" class="col-sm-2 col-form-label">Number of schedules</label>
            <div class="col-sm-10">
                <input type="text" name="numberOfSchedules" class="form-control" id="numberOfSchedules">
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
        <div class="form-group row">
            <label for="choiceOfDay" class="col-sm-2 col-form-label">Choice of day</label>
            <div class="col-sm-10">
                <select name="choiceOfDay"  class="form-control" id="choiceOfDay">
                    <option value="monday">Monday</option>
                    <option value="tuesday">Tuesday</option>
                    <option value="wednesday">Wednesday</option>
                    <option value="thursday">Thursday</option>
                    <option value="friday">Friday</option>
                    <option value="saturday">Saturday</option>
                    <option value="sunday">Sunday</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
@endsection
