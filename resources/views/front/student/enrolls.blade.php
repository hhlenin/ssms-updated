@extends('front.master')

@section('title', 'Enroll History')

@section('content')
<div class="row">
    <div class="col-md-2 bg-dark">
        <div class="text-center py-5">
            <p class="text-white"><a class="nav-link" href="{{route('student.profile')}}">My Profile</a></p>
            <p class="text-white"><a class="nav-link" href="{{route('enrolled.courses')}}">My Course</a></p>
            
        </div>
    </div>


    <div class="col-md-10">
        <div class="p-5">
            
        <table class="table table-borderd table-responsive">
            <tr>
                <th>#</th>
                <th>Name of Courses</th>
                <th>Starting Date</th>
                <th>Ending Date</th>
                <th>Fee</th>
                <th>Enroll Status</th>
                <th>Teacher Name</th>

            </tr>

            @foreach ($enrolls as $enroll)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$enroll->course->name}}</td>
                    <td>{{$enroll->course->start_date}}</td>
                    <td>{{$enroll->course->end_date}}</td>
                    <td>{{$enroll->course->fee}}</td>
                    <td>{{$enroll->status== 0? 'Pending' : 'Approved'}}</td>
                    <td>{{$enroll->course->teacher->name}}</td>

                    
                </tr>
            @endforeach
        </table>
        </div>
    </div>
</div>
    
@endsection