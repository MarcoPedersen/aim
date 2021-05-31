@extends('layouts.layout')

@section('content')
        <h1 class="h3 mb-4 text-gray-800">Edit Game Schedule</h1>
       <form class="form" action="{{ route('owner.game-schedules.update', $gameSchedule->id) }}" method="POST">
           @csrf
           @method('PUT')
           <input type="hidden" name="id" value="{{ $gameSchedule->id }}">
            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-10">
                    <input type="date" name="date" class="form-control" id="date" value="{{ $gameSchedule->date }}">
                </div>
            </div>
           <div class="form-group row">
               <label for="time" class="col-sm-2 col-form-label">Time</label>
               <div class="col-sm-10">
                   <input type="time" name="time" class="form-control" id="time" value="{{ $time }}">
               </div>
           </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" name="price" class="form-control" id="price" value="{{ $gameSchedule->price }}">
                </div>
            </div><div class="form-group row">
                <label for="limit" class="col-sm-2 col-form-label">Limit</label>
                <div class="col-sm-10">
                    <input type="text" name="limit" class="form-control" id="limit" value="{{ $gameSchedule->limit }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary float-right">Submit</button>
        </form>
@endsection




