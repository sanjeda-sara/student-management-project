@extends('front.master')

@section('title')
    Home page
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">All Courses</h1>
                    <div class="row mt-4">
                        @foreach($subjects as $subject)
                            <div class="col-md-4">
                                <a href="{{ route('subject-details', ['id' => $subject->id]) }}" class="nav-link">
                                    <div class="card">
                                        <img src="{{ asset($subject->image) }}" alt="" class="card-img-top" style="height: 250px">
                                        <div class="card-body">
                                            <h2 class="card-title text-dark" style="font-size: 20px;">{{ $subject->title }}</h2>
                                            <p style="text-align: justify; font-size: 16px;" class="text-dark" >{{ $subject->short_description }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
