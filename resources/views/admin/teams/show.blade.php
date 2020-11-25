@extends('layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ $team->name }}</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Members</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($team->members as $member)
                        <tr>
                            <td>{{ $member->user->first_name }} {{ $member->user->last_name }}</td>
                            <td>
                                <form action="{{ route('admin.team-members.destroy', $member->id) }}" method="POST">
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



    <a href="/admin/teams" class="back"> - Back to all Teams </a>
@endsection
