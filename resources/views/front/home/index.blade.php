@extends('front.master')

@section('title', 'Hompage')
    

@section('content')

<section class="pb-5">
    <div class="carousel slide" data-bs-ride="carousel" id="carouselMaster">
        <div class="carousel-inner">
            {{-- <span class="glass-effect"><h2>Popular Courses</h2></span> --}}
            <div class="carousel-item active">
                <img src="{{ asset('front/images/1.png') }}" alt="" class="w-100 vh-height-75 object-cover">
                <div class="carousel-caption bg-glass">
                    <h5><strong>Carousel Caption</strong></h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, sapiente libero officiis rem praesentium consectetur est culpa! Labore, facere iusto.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('front/images/2.jpg') }}" alt="" class="w-100 vh-height-75 object-cover">
                <div class="carousel-caption bg-glass">
                    <h5><strong>Carousel Caption</strong></h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, sapiente libero officiis rem praesentium consectetur est culpa! Labore, facere iusto.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('front/images/3.png') }}" alt="" class="w-100 vh-height-75 object-cover">
                <div class="carousel-caption bg-glass">
                    <h5><strong>Carousel Caption</strong></h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, sapiente libero officiis rem praesentium consectetur est culpa! Labore, facere iusto.</p>
                </div>
            </div>
        </div>

        
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselMaster" data-bs-slide="prev">
            <span class="carousel-control-prev-icon icon-glass" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        
        <button class="carousel-control-next" type="button" data-bs-target="#carouselMaster" data-bs-slide="next">
            <span class="carousel-control-next-icon icon-glass" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>  
        
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselMaster" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselMaster" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselMaster" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        
    </div>


</section>

<section class="py-5">
    <div class="text-center">
        <h3 class="mb-3">Latest Courses</h3>
    </div>
    <div class="container">
        <div class="owl-carousel owl-theme">
            @foreach ($courses as $course)
            <div class="item">
                <div class="card d-flex">
                    <div class="card-body">
                        <img src="{{ asset($course->image) }}" alt="" class="card-img-top" style="height: 200px; object-fit: cover">
                        <div style="height: 170px" class="positon-relative">
                            <h5 class="text-center pb-4">{{ $course->name }}</h5>
                        {{-- <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, expedita.</p> --}}
                            <div class="position-absolute" style="top: 350px">
                                <p class="p-0 m-0">Course Fee: {{ $course->fee }} tk</p>
                                <p class="p-0 m-0">Mentor: {{ $course->teacher->name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{route('front.course.view', $course->id)}}" class="btn btn-sm btn-outline-primary">See Details</a>
                    </div>
                </div>
            </div>
            @endforeach  
        </div>
    </div>
</section>

<section class="py-5">
    <div class="text-center">
        <h3 class="mb-3">Our Faculty</h3>
    </div>

    <div class="container">
        <div class="owl-carousel owl-theme owlCarousel" id="owlCarousel">
            @foreach ($teachers as $teacher)
            <div class="item">
                <div class="card mt-5" style="height: 250px">
                    <div class="card-body position-relative">
                        <img src="{{asset($teacher->image)}}" alt="" class="position-absolute faculty-img">
                        <h5 class="pt-5">{{$teacher->name}}</h5>
                        <p class="p-0 m-0">{{$teacher->email}}</p>
                        <p class="p-0 m-0">{{$teacher->designation}}</p>
                        
                    </div>
                    <div class="card-footer">
                        <div class="social-links text-center">
                            <a target="_blank" href="{{$teacher->link_1}}" class=""><i class="fa-brands fa-2x fa-square-twitter"></i></a>
                            <a target="_blank" href="{{$teacher->link_2}}"><i class="fa-brands fa-2x fa-linkedin"></i></a>
                            <a target="_blank" href="{{$teacher->link_3}}"><i class="fa-brands fa-2x fa-github"></i></a>
                            <a target="_blank" href="{{$teacher->link_4}}"><i class="fa-solid fa-2x fa-reply"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            
        </div>
        
    </div>
</section>

<section class="py-5 vh-height-90">
    <div class="text-center">
        <h3 class="mb-3">Student Review</h3>
    </div>

    
      <div class="carousel slide" data-bs-ride="carousel" id="reviewCarousel">
        <div class="carousel-inner">
            <div class="carousel-item active justify-content-center">
                <div class="review-img-wrapper">
                    <img src="front/images/7.jpg" alt="" class="review-img-lg object-cover">
                </div>
                <div class="carousel-caption cc-custom text-dark">
                    <h5 class="text-center"><strong>Carousel Caption</strong></h5>
                    <p>Melbroune, Australia</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, sapiente libero officiis rem praesentium consectetur est culpa! Labore, facere iusto.</p>
                </div>
            </div>


            <div class="carousel-item active justify-content-center">
                <div class="review-img-wrapper">
                    <img src="front/images/6.jpg" alt="" class="review-img-lg object-cover">
                </div>
                <div class="carousel-caption cc-custom text-dark">
                    <h5><strong>Carousel Caption</strong></h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, sapiente libero officiis rem praesentium consectetur est culpa! Labore, facere iusto.</p>
                </div>
            </div>


            <div class="carousel-item active justify-content-center">
                <div class="review-img-wrapper">
                    <img src="front/images/5.jpg" alt="" class="review-img-lg object-cover">
                </div>
                <div class="carousel-caption cc-custom text-dark">
                    <h5><strong>Carousel Caption</strong></h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, sapiente libero officiis rem praesentium consectetur est culpa! Labore, facere iusto.</p>
                </div>
            </div>
           
        </div>

        

        
        <div class="carousel-indicators-rev custom-rr">
                <button type="button" data-bs-target="#reviewCarousel" data-bs-slide-to="0" class="active"aria-label="Slide 1">
                    <img src="front/images/5.jpg" alt="" class="d-block w-100 review-btn-img">
                </button>
                <button type="button" data-bs-target="#reviewCarousel" data-bs-slide-to="1" aria-label="Slide 2">
                    <img src="front/images/6.jpg" alt="" class="d-block w-100 review-btn-img">
                </button>
                <button type="button" data-bs-target="#reviewCarousel" data-bs-slide-to="2" aria-label="Slide 3">
                    <img src="front/images/7.jpg" alt="" class="d-block w-100 review-btn-img">
                </button>
        </div>
        
        
    </div>




</section>
    
@endsection