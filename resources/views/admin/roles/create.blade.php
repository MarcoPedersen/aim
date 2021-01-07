@extends('layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Create Role</h1>
    <form class="form" action="/admin/roles" method="POST">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name">
            </div>
        </div>
        <button type="submit" class="btn btn-primary float-right">Create</button>
    </form>
@endsection
