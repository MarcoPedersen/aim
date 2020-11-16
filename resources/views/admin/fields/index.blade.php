@extends('admin.layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Fields</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Rules</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Rules</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($fields as $field)
                        <tr>
                            <td>{{ $field->id }}</td>
                            <td>{{ $field->name }}</td>
                            <td>{{ $field->location }}</td>
                            <td>{{ $field->rules }}</td>
                            <td>
                                <a class="btn btn-primary btn-circle btn-sm" href="{{ route('fields.edit', $field->id) }}"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('fields.destroy', $field -> id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-circle btn-sm"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
