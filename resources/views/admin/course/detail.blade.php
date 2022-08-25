@extends('admin.master')

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
            <form action="{{ route('admin.courses.rejection', $course->id) }}" method="POST">
                @csrf
                <div class="card card-body">
                    <div class="mb-3">
                        <label class="form-label">Rejection Cause</label>
                        <textarea class="form-control" name="rejection_cause" id="" cols="30" rows="7"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Reject" type="submit" class="btn btn-danger">
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
