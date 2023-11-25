<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Branch</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>

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
                <a id="{{ $weekday->day_name }}" href="#" class="btn btn-primary">add</a>
                <div class="{{ $weekday->day_name }}">
                    <div class="row">
                        <div class="form-group">
                            <label for="start_time">Start Time:</label>
                            <input type="time" class="form-control" id="start_time" name="start_time[{{ $weekday->id }}][]">
                        </div>

                        <div class="form-group">
                            <label for="end_time">End Time:</label>
                            <input type="time" class="form-control" id="end_time" name="end_time[{{ $weekday->id }}][]">
                        </div>
                    </div>
                </div>
            @endforeach

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    $(document).ready(function () {

        // $("#Monday").click(function(){
        //     alert("Daasda");
        //     $('.Monday').append($('<div class="row"><div class="form-group"><label for="start_time">Start Time:</label><input type="time" class="form-control" id="start_time" name="start_time" required></div><div class="form-group"><label for="end_time">End Time:</label><input type="time" class="form-control" id="end_time" name="end_time" required></div></div>'));
        // });
   
        var i = 1;
        var length;
    
        $("#Monday").click(function(){
            i++;
            $('.Monday').append($('<div class="row" id="row'+i+'"><div class="form-group"><label for="start_time">Start Time:</label><input type="time" class="form-control start_time" id="start_time" name="start_time[{{ $weekday->id }}][]" required></div><div class="form-group"><label for="end_time">End Time:</label><input type="time" class="form-control end_time" id="end_time" name="end_time[{{ $weekday->id }}][]" required></div><div class="form-group"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>'));
        });
 
        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");     
            $('#row'+button_id+'').remove();  
        });

        $("#Tuesday").click(function(){
            i++;
            $('.Tuesday').append($('<div class="row" id="row'+i+'"><div class="form-group"><label for="start_time">Start Time:</label><input type="time" class="form-control start_time" id="start_time" name="start_time[]" required></div><div class="form-group"><label for="end_time">End Time:</label><input type="time" class="form-control end_time" id="end_time" name="end_time[]" required></div><div class="form-group"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>'));
        });

        $("#Wednesday").click(function(){
            i++;
            $('.Wednesday').append($('<div class="row" id="row'+i+'"><div class="form-group"><label for="start_time">Start Time:</label><input type="time" class="form-control start_time" id="start_time" name="start_time[]" required></div><div class="form-group"><label for="end_time">End Time:</label><input type="time" class="form-control end_time" id="end_time" name="end_time[]" required></div><div class="form-group"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>'));
        });

        $("#Thursday").click(function(){
            i++;
            $('.Thursday').append($('<div class="row" id="row'+i+'"><div class="form-group"><label for="start_time">Start Time:</label><input type="time" class="form-control start_time" id="start_time" name="start_time[]" required></div><div class="form-group"><label for="end_time">End Time:</label><input type="time" class="form-control end_time" id="end_time" name="end_time[]" required></div><div class="form-group"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>'));
        });

        $("#Friday").click(function(){
            i++;
            $('.Friday').append($('<div class="row" id="row'+i+'"><div class="form-group"><label for="start_time">Start Time:</label><input type="time" class="form-control start_time" id="start_time" name="start_time[]" required></div><div class="form-group"><label for="end_time">End Time:</label><input type="time" class="form-control end_time" id="end_time" name="end_time[]" required></div><div class="form-group"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>'));
        });

        $("#Saturday").click(function(){
            i++;
            $('.Saturday').append($('<div class="row" id="row'+i+'"><div class="form-group"><label for="start_time">Start Time:</label><input type="time" class="form-control start_time" id="start_time" name="start_time[]" required></div><div class="form-group"><label for="end_time">End Time:</label><input type="time" class="form-control end_time" id="end_time" name="end_time[]" required></div><div class="form-group"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>'));
        });

        $("#Sunday").click(function(){
            i++;
            $('.Sunday').append($('<div class="row" id="row'+i+'"><div class="form-group"><label for="start_time">Start Time:</label><input type="time" class="form-control start_time" id="start_time" name="start_time[]" required></div><div class="form-group"><label for="end_time">End Time:</label><input type="time" class="form-control end_time" id="end_time" name="end_time[]" required></div><div class="form-group"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>'));
        });
    });
</script>

</body>
</html>
