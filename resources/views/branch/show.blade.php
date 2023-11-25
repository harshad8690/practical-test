@extends('layouts.master')
@section('content')
    <h3>Branch: {{ $branch_data->name }}</h3>
    <table class="table table-borderless">
        <tr>
            <th>Timings</th>
            <th>Status</th>
        </tr>
        @foreach($data as $d)
            <tr>
                <td>{{$d->day_name}}</td>
                @if(sizeof($d['branch_time']) == 0)
                    <td>Closed</td>
                @endif
                @foreach($d['branch_time'] as $bt)
                    @if($bt->start_time != null && $bt->end_time != null)
                        <td>{{ $bt->start_time . " - " . $bt->end_time}}&nbsp;&nbsp;&nbsp;</td>
                    @endif
                @endforeach
            </tr>
            @endforeach
    </table>
    <a class="btn btn-primary" href="{{ url('business/'.$branch_data->business_id) }}">Back</a>
@endsection