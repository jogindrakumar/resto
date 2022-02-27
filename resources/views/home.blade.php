 @extends('frontend.master_home')
 @section('main_content')
 
@include('frontend.body.about_section')
        <!-- End of Welcome Section -->
        <!-- Special Dishes Section -->
      @include('frontend.body.special_dishes')
        <!-- End of Special Dishes Section -->
        <!-- Menu Section -->
        @include('frontend.body.navbar')
        <!-- End of menu Section -->
        <!-- Testimonial Section-->
      @include('frontend.body.testimonial')
        <!-- End of Testimonial Section-->
        <!-- Team Section -->
        @include('frontend.body.team')
        <!-- End of Team Section -->
        <!-- Reservation Section -->
        @include('frontend.body.reservation')

        @endsection