@extends('front.master')

@section('title', 'Contact Us')
    


@section('content')

<section class="py-5">
    <div class="container">
        <div class="row pb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h4>Contact Us</h4></div>
                    <div class="card-body ms-2">
                        <p>House #420, Road: 34, East Panthapath, Dhaka</p>
                        <p>Email: info@ssms.com</p>
                        <p>Phone: 012443666</p>  
                    </div>
                </div>
            </div>
            <div class="col-md-6 position-relative">
                <div class="card position-absolute" style="width: 97%">
                    <div class="card-header"><h4>Give us feedback</h4></div>
                    <form action="" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="p-2">
                                <input type="text" name="name" class="form-control p-2" placeholder="Your Name">
                            </div>
                            <div class="p-2">
                                <input type="email" name="email" class="form-control p-2" placeholder="Your Email">
                            </div>
                            <div class="p-2">
                                <textarea name="message" name="feedback"  class="form-control p-2" cols="30" rows="4" placeholder="Your Feedback"></textarea>
                            </div>
                            <div class="p-2">
                                <input type="submit" class="btn btn-dark form-control p-2">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d405691.57240383344!2d-122.3212843181106!3d37.40247298383319!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb68ad0cfc739%3A0x7eb356b66bd4b50e!2sSilicon%20Valley%2C%20CA%2C%20USA!5e0!3m2!1sen!2ssg!4v1660160434476!5m2!1sen!2ssg" width="1120" height="450" style="border:0; border-radius: 10px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

@endsection