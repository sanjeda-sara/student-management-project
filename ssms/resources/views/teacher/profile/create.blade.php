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
                        <form action="{{ route('new-profile',['id' => isset($teacher) ? $teacher->id : '' ]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label">Teacher Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="{{ isset($teacher) ? $teacher->name : Auth::user()->name }}" name="name" />
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="" class="col-md-4 col-form-label">Email</label>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" value="{{ isset($teacher) ? $teacher->email : Auth::user()->email }}" name="email" />
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="" class="col-md-4 col-form-label">Phone</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" value="{{ isset($teacher) ? $teacher->phone : '' }}" name="phone" />
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="" class="col-md-4 col-form-label">Image</label>
                                <div class="col-md-8">
                                    <input type="file" class="form-control-file" name="image" />
                                    @if(isset($teacher))
                                        <img src="{{ isset($teacher) ? asset($teacher->image) : '' }}" alt="" style="height: 100px; width: 100px;">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="" class="col-md-4 col-form-label">Address</label>
                                <div class="col-md-8">
                                    <textarea name="address" id="" class="form-control" cols="30" rows="10">{{ isset($teacher) ? $teacher->address : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="" class="col-md-4 col-form-label">Description</label>
                                <div class="col-md-8">
                                    <textarea name="description" id="editor" cols="30" class="form-control" rows="10">{{ isset($teacher) ? $teacher->description : '' }}</textarea>
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
