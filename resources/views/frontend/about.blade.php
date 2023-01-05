@extends('frontend.main')
@section('content')
    <!--Breadcrumb section starts-->
    @if(!env('USER_VERIFIED'))
    <div class="breadcrumb-section bg-h" style="background-image: url('{{asset('images/breadcrumb/breadcrumb_2.jpg')}}')">
    @else
    <div class="breadcrumb-section bg-h" style="background-image: url('{{asset('images/header/'.$headerImage->url)}}')">
    @endif
        <div class="overlay op-5"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="breadcrumb-menu">
                        <h2>About us</h2>
                        <span><a href="home-v1.html">Home</a></span>
                        <span>About us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb section ends-->
    <!--About section starts-->
    <div class="about-section  pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 text-center">
                    <div class="section-title v3">
                        <p>Lorem ipsum dolor sit.</p>
                        <h2>We'll help you to find a place that you'll love.</h2>
                    </div>
                    <div class="about-text res-box">
                        <p>{{$siteInfo->about_us}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--About section ends-->
    <!--Testimonial Section start-->
    <div class="hero-client-section pt-100">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="section-title v1">
                        <p>Lorem ipsum dolor.</p>
                        <h2>Hear from our clients</h2>
                    </div>
                </div>
                <div class="col-md-12 mb-70">
                    <div class="testimonial-wrapper swiper-container ">
                        <div class="swiper-wrapper">
                            @foreach($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="single-testimonial-item">
                                    <div class="row">
                                        <div class="col-lg-8">
                                        @if(!env('USER_VERIFIED'))
                                            <div class="testimonial-video" style="background-image: url({{asset('images/breadcrumb/breadcrumb_2.jpg')}})">
                                            </div>
                                        @else
                                            <div class="testimonial-video" style="background-image: url({{asset('/images/images/'.$testimonial->file)}})">
                                            </div>
                                        @endif
                                        </div>
                                        <div class="testimonial-quote">
                                            <h4>{{$testimonial->name}}</h4>
                                            <span>{{$testimonial->address}}</span>
                                            <p>{{$testimonial->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Add Arrows -->
                    <div class="client-btn-wrap">
                        <div class="client-prev"><i class="lnr lnr-arrow-left"></i></div>
                        <div class="client-next"><i class="lnr lnr-arrow-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Testimonial Section ends-->
    <!--Team section starts-->
    <div class="team-section pt-20    ">
        <div class="container">
            <div class="row mt-30">
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="section-title v1">
                        <p>Ready to serve you the best</p>
                        <h2>Meet our Agents</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="team-wrapper swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($agents as $agent)
                                <div class="swiper-slide">
                                    <div class="single-team-member v2">
                                        <a href="{{url('/agents/'.$agent->id)}}">
                                            @if(!env('USER_VERIFIED'))
                                            <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="#">
                                            @else
                                            <img loading="lazy" src="{!! $agent->photo() !!}" alt="">
                                            @endif
                                        </a>
                                        <div class="single-team-info">
                                            <h4><a href="{{url('/agents/'.$agent->id)}}">{{$agent->f_name}} {{$agent->l_name}}</a></h4>
                                            <span><i class="las la-phone-alt"></i>{{$agent->mobile}}</span>
                                            <div class="contact-info">
                                                <div class="icon">
                                                    <i class="las la-envelope"></i>
                                                </div>
                                                <div class="text"><a href="tel:44078767595">{{$agent->email}}</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="slider-btn v2 team_next"><i class="lnr lnr-arrow-right"></i></div>
                        <div class="slider-btn v2 team_prev"><i class="lnr lnr-arrow-left"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Team section ends-->
    <!--Partner section starts-->
    <div class="partner-section style1 pb-130 pt-90 ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title v1">
                        <h2>Our Partners</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="swiper-container partner-wrap">
                        <div class="swiper-wrapper">
                            @foreach($partners as $partner)
                            <div class="swiper-slide single-partner">
                                <img loading="lazy" src="{{URL::asset('/images/images/'.$partner->image)}}" alt="...">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Partner section ends-->
@endsection
