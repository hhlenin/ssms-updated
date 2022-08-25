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
        <p class="py-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel magni, qui, vitae rem sunt atque, voluptatem voluptatibus at dolor consectetur aperiam corrupti laudantium. Dignissimos ratione doloribus consequatur repellendus quos doloremque, unde sint voluptatum, maxime nostrum, deleniti harum quas veritatis id vitae. Ipsa quo fugit harum consectetur temporibus fuga aspernatur. Veniam fugit voluptate quas, quo soluta ducimus a, facere perspiciatis sunt aliquid libero! Magnam delectus unde consequuntur consectetur quidem neque iste voluptas at in quaerat praesentium quam ab odit tempora doloribus numquam quis, error id cumque, voluptatibus culpa perspiciatis officia! Praesentium quibusdam eius alias aliquid iusto consequatur quisquam autem, placeat exercitationem.</p>
    </div>
</div>
    
@endsection