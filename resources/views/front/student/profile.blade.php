@extends('front.master')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-2 bg-dark">
        <div class="text-center py-5">
            <p class="text-white"><a class="nav-link" href="{{route('student.profile')}}">My Profile</a></p>
            <p class="text-white"><a class="nav-link" href="{{route('enrolled.courses')}}">My Course</a></p>
            
        </div>
    </div>


    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h5 class="text-center">Update my profile</h5>
            </div>
            <div class="card-body">
                <form action="{{route('student.profile.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-2">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$student->name}}">
                    </div>
                    <div class="form-group my-2">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" value="{{$student->email}}">
                    </div>
                    <div class="form-group my-2">
                        <label for="">Password</label>
                        <input type="text" name="password" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{$student->phone}}">
                    </div>
                    <div class="form-group my-2">
                        <label for="">Image</label>
                        <img src="{{asset($student->image)}}" alt="" style="height: 100px; width: 100px; object-fit: cover">
                        <input type="file" name="image" class="form-control">
                        
                    </div>
                    <div class="form-group my-2">
                        <label for="">Address</label>
                        <textarea name="address" id="" class="form-control" cols="30" rows="6">{{$student->address}}</textarea>
                    </div>
                    <div class="form-group my-2 text-center">
                        <input type="submit" class="btn btn-primary" value="Update Profile">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection