@extends('layouts.master')
@section('content')
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-8">
            <h2>Business Management</h2>
        </div>
        <div class="col-md-4 text-right">
            <a class="btn btn-primary" href="{{ route('business.create') }}">Add Business</a>
            <a class="btn btn-primary" href="{{ route('branch.create') }}">Add Branch</a>
        </div>
    </div>

    <table id="businessTable" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Logo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function () {
        $('#businessTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('business.index') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                {
                    data: 'logo',
                    name: 'logo',
                    render: function (data, type, full, meta) {
                        var logoUrl = "{{ asset('logos/') }}" + '/' + data;
                        return '<img src="' + logoUrl + '" alt="Logo" style="max-width: 50px; max-height: 50px;">';
                    }
                },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
        });
    });

</script>
@endsection
