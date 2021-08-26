@extends('front.layout.master')    


@section('main_content')
 

 

 @include('front.layout.home_header')
 

<style type="text/css">
    header.inner-header {margin-bottom: 0 !important} 
</style>


<!-- BEGIN Main Content -->
 
    <div class="home-section-main">
    <!--banner section start-->

    <div class="banner-home">

        

        <div class="banner-content-responsive show-767-view">

            <!-- <h1><span>Order Takeaway</span> &amp; Online Food Delivery</h1> -->
            <h1>Welcome Home Page</h1>

        </div>
 

        <div class="banner-swiper-slider">
            <div class=""><img src="{{url('/')}}/front/images/slider12.jpg" alt="" /> </div>
        </div>
          

    </div>
 
    </div>
    
   
@endsection 