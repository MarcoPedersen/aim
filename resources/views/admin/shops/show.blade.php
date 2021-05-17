@extends('layouts.layout')

@section('content')
    <h1 class="h1 mb-4 text-gray-800">{{ $shop->name }}</h1>

{{--    @if($shopLocations)--}}
{{--        @include('maps.index', array('shopLocations'=>$shopLocations))--}}
{{--    @endif--}}

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <td>Name:</td>
            <td>{{ $shop->name }}</td>
        </tr>
        <tr>
            <td>Address:</td>
            <td>{{ $shop->location }}</td>
        </tr>
        <tr>
            <td>Email: </td>
            <td>{{ $shop->email }}</td>
        </tr>
        <tr>
            <td>Phone: </td>
            <td>{{ $shop->phone }}</td>
        </tr>
        <tr>
            <td>Website:</td>
            <td>{{ $shop->website }}</td>
        </tr>
    </table>

    <a href="/admin/shops" class="back"> - Back to all shops </a>
@endsection
