@extends('layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Create a new team</h1>
        <form action="/player/teams" method="POST">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name">
                </div>
            </div>
            <button type="submit" value="Create team" class="btn btn-primary float-right">Submit</button>
        </form>

@endsection
