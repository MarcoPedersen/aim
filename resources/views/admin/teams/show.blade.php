@extends('admin.layouts.layout')

@section('content')
    <div class="wrapper team-details">
        <h1>information for {{ $team -> name }}</h1>
        <a href="{{ route('teams.edit', $team -> id) }}">Edit team</a>

        <form action="{{ route('teams.destroy', $team -> id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Delete team</button>
        </form>
    </div>
    <a href="/admin/teams" class="back"> - Back to all Teams </a>
@endsection
