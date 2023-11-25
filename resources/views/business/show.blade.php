@extends('layouts.master')
@section('content')

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table id="businessTable" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datas as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->name}}</td>
                <td><a href="{{ url('branch/'.$data->id) }}">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{ url('business/') }}">Back</a>
</div>

@endsection
