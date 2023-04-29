@extends('front.master')

@section('title')
    {{ $subject->title }}
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div>
                        <img src="{{ asset($subject->image) }}" alt="" class="img-fluid" />
                    </div>
                </div>
                <div class="col-md-8">
                    <div>
                        <h1>{{ $subject->title }}</h1>
                        <p style="text-align: justify">{{ $subject->short_description }}</p>

                        <p>Price: <span style="font-size: 22px;">{{ number_format($subject->fee) }} BDT</span></p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-8">
                    {!! $subject->long_description !!}
                </div>
                <div class="col-md-4">
                    <div class="d-grid">
                        <a href="{{ route('enroll', ['id' => $subject->id]) }}" class="btn btn-success col-12 {{ $check == false ? 'disabled' : '' }}">Enroll</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
