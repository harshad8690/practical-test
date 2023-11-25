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
                <th>Images</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datas as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->name}}</td>
                <td>
                    <div id="carousel{{$data->id}}" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                        @foreach($data->images as $index => $image)
                            <div class="carousel-item {{$index === 0 ? 'active' : ''}}">
                                <img src="{{ asset('multiple/' . $image->image) }}" class="img-thumbnail" height="100px" width="100px" alt="Image {{$index + 1}}">
                            </div>
                        @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel{{$data->id}}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel{{$data->id}}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                    </div>
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ url('branch/'.$data->id) }}">View</a>
                    <form action="{{ url('branch/'.$data->id) }}" method="post" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{ url('business/') }}">Back</a>
</div>

@endsection
