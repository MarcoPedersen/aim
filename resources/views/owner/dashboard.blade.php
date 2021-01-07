@extends('layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                Welcome to the Dashboard, please use the sidebar to manage your features.

                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">My Fields</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
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
                                                <a class="btn btn-success btn-circle btn-sm" href="{{ route('owner.fields.show', $field->id) }}"><i class="far fa-eye"></i></a>
                                                <a class="btn btn-primary btn-circle btn-sm" href="{{ route('owner.fields.edit', $field->id) }}"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('owner.fields.destroy', $field -> id) }}" method="POST">
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
                </div>
            </div>
        </div>
    </div>

@endsection
