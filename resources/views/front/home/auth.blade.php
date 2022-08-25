@extends('front.master')

@section('title', 'Login/Registration')


@section('content')

    <section class="py-5">
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

            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="card w-100">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>
                        <form action="{{ route('student.login') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="p-2">
                                    <input type="email" name="email" class="form-control p-2" placeholder="Your Email">
                                    <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                </div>
                                <div class="p-2">
                                    <input type="password" name="password" class="form-control p-2"
                                        placeholder="Your Password">
                                    <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                                        
                                </div>
                                <div class="p-2">
                                    <input type="submit" class="btn btn-dark form-control p-2" value="Login">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card w-100">
                        <div class="card-header">
                            <h4>Registration</h4>
                        </div>
                        <form action="{{route('student.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="p-2">
                                    <input type="name" name="name" class="form-control p-2" placeholder="Your Name">
                                    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                </div>
                                <div class="p-2">
                                    <input type="email" name="email" class="form-control p-2" placeholder="Your Email">
                                    <span
                                        class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                </div>
                                <div class="p-2">
                                    <input type="text" name="phone" class="form-control p-2"
                                        placeholder="Insert Phone Number">
                                    <span
                                        class="text-danger">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
                                </div>
                                <div class="p-2">
                                    <input type="password" name="password" class="form-control p-2"
                                        placeholder="Your Password">
                                    <span
                                        class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
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
