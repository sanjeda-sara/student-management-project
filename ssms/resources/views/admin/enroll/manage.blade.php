@extends('admin.master')

@section('title')
    Manage Enrolls
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Manage Enrolls</h4>
                    </div>
                    <div class="card-body">
                        <table class="table" id="dataTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Subject Title</th>
                                <th>Student Name</th>
                                <th>Enroll Date</th>
                                <th>Payment Status</th>
                                <th>Enroll Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($enrolls as $enroll)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $enroll->subject->title }}</td>
                                    <td>{{ $enroll->user->name }}</td>
                                    <td>{{ $enroll->enroll_date }}</td>
                                    <td>{{ $enroll->payment_status == 1 ? "Completed" : "Pending" }}</td>
                                    <td>{{ $enroll->enroll_status == 1 ? "Selected" : "Waiting" }}</td>
                                    <td>
                                        <a href="{{ route('edit-enroll-status',['id' => $enroll->id]) }}" class="btn btn-info">edit</a>
                                        <a href="{{ route('delete-enroll', ['id' => $enroll->id]) }}" onclick="return confirm('Are you sure to delete this?')" class="btn btn-danger">del</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
