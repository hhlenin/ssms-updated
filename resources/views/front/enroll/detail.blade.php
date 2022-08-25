@extends('front.master')

@section('title', 'Enroll Information')

@section('content')

<div class="container py-5">
    <div class="card">
        <div class="card-body text-center">
            <h3>Hello! {{Session::get('student_name')}}</h3>
            <h5>Thanks for applying on {{$result['course_name']}}</h5>
            <p>Your class will start {{$result['start_date']}}, fee {{$result['fee']}}</p>
            <p>Classes will be conducted by {{$result['teacher']}}</p>
            <span>Enroll status is </span><span class="text-warning">{{$result['status']== 0? 'Pending': 'Approved'}}</span>
        </div>
    </div>
</div>
    
@endsection