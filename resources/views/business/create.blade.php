@extends('layouts.master')
@section('content')

<div class="container mt-4">
    <h2>Business Registration</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="businessForm" action="{{ route('business.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="form-group">
            <label for="logo">Logo:</label>
            <input type="file" class="form-control-file" id="logo" name="logo" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-primary" href="{{ url('business/') }}">Back</a>
    </form>
</div>

<script>
    $(document).ready(function () {
        $.validator.addMethod("mobile", function (value, element) {
            return this.optional(element) || /^[0-9]{10}$/.test(value);
        }, "Please enter a valid mobile number.");

        $("#businessForm").validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    mobile: true
                }
            },
            messages: {
                name: "Please enter your business name",
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address"
                },
                phone: {
                    required: "Please enter your phone number",
                    mobile: "Please enter a valid mobile number"
                }
            }
        });
    });
</script>
@endsection
