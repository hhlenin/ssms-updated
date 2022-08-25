@extends('teacher.master')

@section('title', 'Course Details')

@section('content')

    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Course Details of {{ $course->name }}</h4>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                @if(isset($course->rejection_cause))
                    <span class="text-danger">Your Course's Rejection Cause: {{$course->rejection_cause}}</span>
                    <br>
                    <span class="text-danger">Please update course information accordingly to resubmit for approval</span>
                @endif
                <tr>
                    <th>Course Title</th>
                    <td>{{ $course->name }}</td>
                </tr>
                <tr>
                    <th>Starting Date</th>
                    <td>{{ $course->start_date }}</td>
                </tr>
                <tr>
                    <th>Ending Date</th>
                    <td>{{ $course->end_date }}</td>
                </tr>
                <tr>
                    <th>Short Description</th>
                    <td>{{ $course->short_description }}</td>
                </tr>
                <tr>
                    <th>Long Description</th>
                    <td>{!! $course->long_description !!}</td>
                </tr>
                <tr>
                    <th>Course Image</th>
                    <td><img src="{{ asset($course->image) }}" alt="" class="card-img-top"
                            style="height: 150px; object-fit: cover"></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if ($course->status == 0)
                            <p class="text-warning">{{ 'Unapproved' }}</p>
                        @elseif ($course->status == 1)
                            <p class="text-success">{{ 'Approved' }}</p>
                        @elseif ($course->status == 2)
                            <p class="text-danger">{{ 'Rejected' }}</p>
                        @endif
                    </td>
                </tr>

            </table>
        </div>
    </div>

@endsection
