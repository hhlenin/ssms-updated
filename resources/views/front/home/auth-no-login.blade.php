@extends('front.master')

@section('title', 'Login/Registration')


@section('content')

    <section class="py-5">
        <div class="container">
            @if ($message)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-message">
                        <i class="far fa-fw fa-bell"></i>
                        <strong>{{ $message }}</strong>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6 d-flex">
                    @if (!Session::has('student_id'))
                    <div class="card w-100">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>
                        <form action="" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="p-2">
                                    <input type="email" name="email" class="form-control p-2" placeholder="Your Email">
                                </div>
                                <div class="p-2">
                                    <input type="password" name="password" class="form-control p-2"
                                        placeholder="Your Password">
                                </div>
                                <div class="p-2">
                                    <input type="submit" class="btn btn-dark form-control p-2" value="Login">
                                </div>
                            </div>
                        </form>
                    </div>
                    @else
                    <img src="{{asset('/front/images/with-login.jpg')}}" style="object-fit: cover; border-radius: 1%" alt="">
                    @endif
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card w-100">
                        <div class="card-header">
                            <h4>Registration</h4>
                        </div>
                        <form action="{{ route('enroll.store', $course_id) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="p-2">
                                    <input type="name" name="name" class="form-control p-2" placeholder="Your Name" 
                                        value='{{Session::get('student_name')}}'
                                        {{Session::has('student_name')? 'readonly' : '' }}
                                        >
                             
                                    <span class="text-danger">{{$errors->has('name')? $errors->first('name'): ''}}</span>
                                </div>
                                <div class="p-2">
                                    <input type="email" name="email" class="form-control p-2" placeholder="Your Email"
                                    {{Session::has('student_name')? 'readonly' : '' }}
                                    @if (Session::has('student_name'))
                                    value='{{Session::get('student_email')}}.'>
                                    @endif
                                    <span class="text-danger">{{$errors->has('email')? $errors->first('email'): ''}}</span>
                                    
                                </div>
                                {{-- <div class="p-2">
                                <input type="password" name="password" class="form-control p-2" placeholder="Insert Password">
                            </div>
                            <div class="p-2">
                                <input type="password" name="confirm_password" class="form-control p-2" placeholder="Confirm Password">
                            </div> --}}
                                <div class="p-2">
                                    <input type="text" name="phone" class="form-control p-2"
                                        placeholder="Your Phone Number"
                                        {{Session::has('student_name')? 'readonly' : '' }}
                                        value='{{Session::get('student_phone')}}'>
                                    <span class="text-danger">{{$errors->has('phone')? $errors->first('phone'): ''}}</span>

                                </div>
                                <div class="p-2">
                                    <p>Payment Option</p>
                                    <label for=""><input type="radio" name="payment_type" value="1"> Pay
                                        Now</label>
                                    <label for=""><input type="radio" name="payment_type" value="2" checked>
                                        Pay Later</label>
                                </div>
                                <div class="p-2">
                                    <input type="submit" class="btn btn-dark form-control p-2" value="Register">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
