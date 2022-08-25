<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | SSMS</title>

    <link rel="shortcut icon" href="{{ asset('front/images/fav-icon.png') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>

    <section class="">
        <div class="navbar navbar-expand-md navbar-light bg-secondary shadow-lg text-white">

            <div class="container">
                <a href="" class="navbar-brand">Logo</a>
                <ul class="navbar-nav">
                    <li><a href="{{ route('home') }}" class="nav-link text-white">Home</a></li>
                    <li><a href="{{ route('all.courses') }}" class="nav-link text-white">All Courses</a></li>
                    <li><a href="{{ route('about.us') }}" class="nav-link text-white">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="nav-link text-white">Contact</a></li>
                    @if (!Session::has('student_id'))
                        <li><a href="{{ route('login.registration') }}"
                                class="nav-link text-white">Login/Registratin</a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="" class="nav-link dropdown-toggle text-white"
                                data-bs-toggle="dropdown">{{ Session::get('student_name') }}</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item "><a class="nav-link" href="{{ route('student.dashboard') }}">Dashboard</a></li>
                                <li class="dropdown-item ">
                                    <form action="{{ route('student.logout') }}" method="POST">
                                        @csrf
                                        <input type="submit" class="btn bg-transparent" value="Logout">
                                    </form>
                                </li>

                            </ul>
                        </li>
                    @endif
                </ul>

            </div>
        </div>
    </section>


    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div class="alert-message">
                <i class="far fa-fw fa-bell"></i>
                <strong>{{ Session::get('message') }}</strong>
            </div>
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div class="alert-message">
                <i class="far fa-fw fa-bell"></i>
                <strong>{{ Session::get('error') }}</strong>
            </div>
        </div>
    @endif

    @yield('content')


    <section class="pt-5 pb-1 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-5 d-flex">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">Why Choose Us</h5>
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos numquam minima repellat
                                ut! Accusamus, fugit delectus? Rerum temporibus dolores nemo, accusamus, provident
                                molestiae, laudantium aliquam dicta adipisci mollitia inventore velit?</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex">
                    <div class="card w-100">
                        <div class="card-header">
                            <h5 class="text-center">Popular Courses</h5>
                        </div>
                        <div class="card-body">
                            <ol style="">
                                <li><a class="nav-link" href="">Computer Science & Engineering</a></li>
                                <li><a class="nav-link" href="">Electronic and Electrical Engineering</a></li>
                                <li><a class="nav-link" href="">Software Engineering</a></li>
                                <li><a class="nav-link" href="">Textile Engineering</a></li>
                                <li><a class="nav-link" href="">Automobile Engineering</a></li>
                                <li><a class="nav-link" href="">Computer Science & Engineering</a></li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 d-flex">
                    <div class="card w-100">
                        <div class="card-header">
                            <h5 class="text-center">Contact Us</h5>
                        </div>
                        <div class="card-body vh-height-30">
                            <p>House #420, Road: 34, East Panthapath, Dhaka</p>
                            <p>Email: info@ssms.com</p>
                            <p>Phone: 012443666</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-dark">
        <div class="p-2">
            <p class="text-center text-white m-0 p-0">Design & Developed by <i>Hasibul Lenin</i> {{ date('Y') }}
            </p>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="{{ asset('front/js/jQuery.js') }}"></script>
    {{-- <script src="{{ asset('front/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('front/js/all.min.js') }}"></script>
    <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>

    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        })

        $('.owlCarousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 7
                }
            }
        })
    </script>
</body>

</html>
