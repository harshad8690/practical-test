@extends('layouts.master')
@section('content')

<div class="container mt-4">
    <h2>Create Branch</h2>
    <form id="branchForm" action="{{ route('branch.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="business">Select Business:</label>
            <select class="form-control" id="business" name="business" required>
                <option value="">Select Business</option>
                @foreach($business as $bus)
                    <option value="{{ $bus->id }}">{{ $bus->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="day">Select Day:</label>
            @foreach($weekdays as $weekday)
                <div value="{{ $weekday->id }}">{{ $weekday->day_name }}</div>
                <a id="{{ $weekday->day_name }}" href="#" class="btn btn-primary {{ $weekday->id }}" data-weekid = "{{ $weekday->id }}">add</a>
                <div id="{{ $weekday->id }}" class="{{ $weekday->day_name }}">
                    
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-primary" href="{{ url('business/') }}">Back</a>
    </form>
</div>

<script>
    $(document).ready(function () {
   
        var i = 1;
        var length;
    
        $("#Monday").click(function(){
            i++;
            var weekid = $( this ).attr( "data-weekid" );
            $('.Monday').append($('<div class="row" id="row'+i+'"><div class="form-group"><label for="start_time">Start Time:</label><input type="time" class="form-control start_time" id="start_time" name="start_time['+weekid+'][]" required></div><div class="form-group"><label for="end_time">End Time:</label><input type="time" class="form-control end_time" id="end_time" name="end_time['+weekid+'][]" required></div><div class="form-group" style="margin-top: 32px;"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>'));
        });
 
        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");     
            $('#row'+button_id+'').remove();  
        });

        $("#Tuesday").click(function(){
            i++;
            var weekid = $( this ).attr( "data-weekid" );
            $('.Tuesday').append($('<div class="row" id="row'+i+'"><div class="form-group"><label for="start_time">Start Time:</label><input type="time" class="form-control start_time" id="start_time" name="start_time['+weekid+'][]" required></div><div class="form-group"><label for="end_time">End Time:</label><input type="time" class="form-control end_time" id="end_time" name="end_time['+weekid+'][]" required></div><div class="form-group" style="margin-top: 32px;"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>'));
        });

        $("#Wednesday").click(function(){
            i++;
            var weekid = $( this ).attr( "data-weekid" );
            $('.Wednesday').append($('<div class="row" id="row'+i+'"><div class="form-group"><label for="start_time">Start Time:</label><input type="time" class="form-control start_time" id="start_time" name="start_time['+weekid+'][]" required></div><div class="form-group"><label for="end_time">End Time:</label><input type="time" class="form-control end_time" id="end_time" name="end_time['+weekid+'][]" required></div><div class="form-group" style="margin-top: 32px;"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>'));
        });

        $("#Thursday").click(function(){
            i++;
            var weekid = $( this ).attr( "data-weekid" );
            $('.Thursday').append($('<div class="row" id="row'+i+'"><div class="form-group"><label for="start_time">Start Time:</label><input type="time" class="form-control start_time" id="start_time" name="start_time['+weekid+'][]" required></div><div class="form-group"><label for="end_time">End Time:</label><input type="time" class="form-control end_time" id="end_time" name="end_time['+weekid+'][]" required></div><div class="form-group" style="margin-top: 32px;"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>'));
        });

        $("#Friday").click(function(){
            i++;
            var weekid = $( this ).attr( "data-weekid" );
            $('.Friday').append($('<div class="row" id="row'+i+'"><div class="form-group"><label for="start_time">Start Time:</label><input type="time" class="form-control start_time" id="start_time" name="start_time['+weekid+'][]" required></div><div class="form-group"><label for="end_time">End Time:</label><input type="time" class="form-control end_time" id="end_time" name="end_time['+weekid+'][]" required></div><div class="form-group" style="margin-top: 32px;"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>'));
        });

        $("#Saturday").click(function(){
            i++;
            var weekid = $( this ).attr( "data-weekid" );
            $('.Saturday').append($('<div class="row" id="row'+i+'"><div class="form-group"><label for="start_time">Start Time:</label><input type="time" class="form-control start_time" id="start_time" name="start_time['+weekid+'][]" required></div><div class="form-group"><label for="end_time">End Time:</label><input type="time" class="form-control end_time" id="end_time" name="end_time['+weekid+'][]" required></div><div class="form-group" style="margin-top: 32px;"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>'));
        });

        $("#Sunday").click(function(){
            i++;
            var weekid = $( this ).attr( "data-weekid" );
            $('.Sunday').append($('<div class="row" id="row'+i+'"><div class="form-group"><label for="start_time">Start Time:</label><input type="time" class="form-control start_time" id="start_time" name="start_time['+weekid+'][]" required></div><div class="form-group"><label for="end_time">End Time:</label><input type="time" class="form-control end_time" id="end_time" name="end_time['+weekid+'][]" required></div><div class="form-group" style="margin-top: 32px;"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>'));
        });
    });
</script>

@endsection
