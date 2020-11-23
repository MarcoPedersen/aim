@extends('layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Fields</h1>
    <p>
        <a href="{{ route('fields.create') }}" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Create field</span>
        </a>
    </p>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Website</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Website</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($fields as $field)
                        <tr>
                            <td>{{ $field->id }}</td>
                            <td>{{ $field->name }}</td>
                            <td>{{ $field->location }}</td>
                            <td>{{ $field->email }}</td>
                            <td>{{ $field->phone }}</td>
                            <td>{{ $field->website }}</td>
                            <td>
                                <a class="btn btn-success btn-circle btn-sm" href="{{ route('fields.show', $field->id) }}"><i class="far fa-eye"></i></a>
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
