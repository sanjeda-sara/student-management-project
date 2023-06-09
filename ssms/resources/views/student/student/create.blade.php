@extends('admin.master')

@section('title')
    Create Profile
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Profile</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('new-student-info', ['id' => isset($student) ? $student->id : '']) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label">Student Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" value="{{ isset($student)? $student->name : Auth::user()->name }}" />
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="" class="col-md-4 col-form-label">Email</label>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" name="email" value="{{ isset($student)? $student->email : Auth::user()->email }}" />
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="" class="col-md-4 col-form-label">Phone</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" value="{{ isset($student) ? $student->phone : '' }}" name="phone" />
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="" class="col-md-4 col-form-label">Image</label>
                                <div class="col-md-8">
                                    <input type="file" class="form-control-file" name="image" />
                                    @if(isset($student))
                                        <img src="{{ asset($student->image) }}" alt="" style="height: 100px; width: 100px;">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="" class="col-md-4 col-form-label">Address</label>
                                <div class="col-md-8">
                                    <textarea name="address" id="" class="form-control" cols="30" rows="10">{{ isset($student) ? $student->address : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="" class="col-md-4 col-form-label"></label>
                                <div class="col-md-8">
                                    <div class="d-grid">
                                        <input type="submit" class="btn col-12 btn-success" value="Create Profile" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
