@extends('front.master')

@section('title', 'All Courses')
    

@section('content')

<section class="py-5">
    <div class="text-center">
        <h3 class="mb-3">Latest Courses</h3>
    </div>
    <div class="container">
        <div class="row mb-3">
            @foreach ($courses as $course)
            <div class="col-md-3">
                <div class="card d-flex">
                    <div class="card-body" style="height: 450px">
                        <img src="{{ asset($course->image) }}" alt="" class="card-img-top" height="170px">
                        <h5 class="text-center">{{ $course->name }}</h5>
                        <p class="">{{ $course->short_description }}</p>
                        <p>Course Fee: {{ $course->fee }} tk</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('front.course.view', $course->id)}}" class="ps-auto btn btn-sm btn-primary">See Details</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

</section>

@endsection