@extends('front.master')

@section('title', $course->name)

@section('content')

    <div class="container">
        @if (Session::has('message'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div class="alert-message">
                <i class="far fa-fw fa-bell"></i>
                <strong>{{ Session::get('message') }}</strong>
            </div>
        </div>
        @endif
        <div class="row" style="height: 150 px">
            <div class="col-6">
                <img src="{{asset($course->image)}}" class="card-img" alt="">
            </div>
            <div class="col-6">
                <div class="py-5">
                
                <h3 class="pb-3">{{$course->name}}</h3>
                <p class="ps-5 text-secondary">Class will start on: {{$course->start_date}}</p>
                <p class="ps-5 text-secondary">Class will end on: {{$course->end_date}}</p>
                <p class="ps-5 text-secondary">{{$course->short_description}}</p>
                <p class="ps-5 text-secondary">Course Fee: {{$course->fee}} tk</p>
                <p class="ps-5 text-secondary">Mentor: {{$course->teacher->name}}</p>
                </div>
                <a href="{{route('enroll', [$course->id])}}" class="btn btn-outline-primary form-control"
                    style="pointer-events: {{$enroll_check? 'none': ''}}"
                    >Enroll Now</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h5 class="py-5 text-center shadow-lg">Course Details</h5>
                {!! $course->long_description !!}
            </div>
        </div>
    </div>

@endsection
