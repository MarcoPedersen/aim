@extends('layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Shops</h1>
    <p>
        <a href="{{ route('admin.shops.create') }}" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Create shop</span>
        </a>
    </p>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Website</th>
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
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($shops as $shop)
                        <tr>
                            <td>{{ $shop->id }}</td>
                            <td>{{ $shop->name }}</td>
                            <td>{{ $shop->location }}</td>
                            <td>{{ $shop->email }}</td>
                            <td>{{ $shop->phone }}</td>
                            <td>{{ $shop->website }}</td>
                            <td>
                                <a class="btn btn-success btn-circle btn-sm"
                                   href="{{ route('admin.shops.show', $shop->id) }}"><i class="far fa-eye"></i></a>
                                <a class="btn btn-primary btn-circle btn-sm"
                                   href="{{ route('admin.shops.edit', $shop->id) }}"><i class="fa fa-edit"></i></a>
                                <form action="{{ 'admin.shops.destroy', $shop->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-circle btn-sm"><i class="far fa-trash-alt"></i>
                                    </button>
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
