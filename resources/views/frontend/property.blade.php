@extends('frontend.main')

@section('title',$property->propertyTranslation->title ?? $property->propertyTranslationEnglish->title ?? null)
@push('styles')
<style>
    .load-overlay{
        display: none;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 999;
        background: rgba(255,255,255,0.8) url({{asset('images/breadcrumb/loader3.gif')}}) center no-repeat;
    }
    /* Turn off scrollbar when body element has the loading class */
    body.loading{
        overflow: hidden;
    }
    /* Make spinner image visible when body element has the loading class */
    body.loading .load-overlay{
        display: block;
    }
</style>
@endpush
@section('content')

    <div class="property-details-wrap bg-cb">

        @if(session('message'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{session('message')}}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

    @endif

    <!--Listing Details Hero starts-->
{{-- @dd($property->background_image) --}}
        {{-- @if(file_exists( public_path() . '/images/thumbnail/'.$property->thumbnail)) --}}
        @if(!env('USER_VERIFIED'))
        <div class="single-property-header v1 bg-h mt-60" style="background-image: url('{{asset('/images/single-listing/property_header_1.jpg')}}')">
        @else
            @if(file_exists(public_path().'/images/backgroundImage/'.$property->background_image))
            <div class="single-property-header v1 bg-h mt-60" style="background-image: url('{{URL::asset('/images/backgroundImage/'.$property->background_image)}}')">

                @else
            <div class="single-property-header v1 bg-h mt-60" style="background-image: url('{{asset('/images/single-listing/property_header_1.jpg')}}')">

            @endif
        @endif

        {{-- <div class="single-property-header v1 bg-h mt-60" style=" @if(file_exists( public_path() . '/images/backgroundImage/'.$property->background_image)) background-image: url('{{URL::asset('/images/backgroundImage/'.$property->background_image)}}');  @else background-image: url('{{asset('/images/single-listing/property_header_1.jpg')}}') @endif"> --}}

            <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        <div class="list-details-title v1">

                            <div class="row">

                                <div class="col-lg-7 col-md-8 col-sm-12">

                                    <div class="single-listing-title float-left">

                                        <h2>{{$property->propertyTranslation->title ?? $property->propertyTranslationEnglish->title  ?? null }}<span class="btn v5">{{$property->type == 'sale' ? 'For Sale' : 'For Rent'}}</span></h2>

                                        <p><i class="las la-map-marker-alt"></i> {{$property->country->countryTranslation->name ?? $property->country->countryTranslationEnglish->name  ?? null }} , {{$property->state->stateTranslation->name ?? $property->state->stateTranslationEnglish->name  ?? null }}, {{$property->city->cityTranslation->name ?? $property->city->cityTranslationEnglish->name  ?? null }}</p>

                                        <a href="{{route('agents.show',$property->user_id)}}" class="property-author">

                                            @if(file_exists( public_path() . '/images/users/'.$property->user->image))

                                                <img loading="lazy" src="{{ URL::asset('/images/users/'.$property->user->image) }}" alt="Image">

                                            @else

                                                <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="#">

                                            @endif

                                            <span>{{$property->user->f_name}} {{$property->user->l_name}}</span>

                                        </a>

                                    </div>

                                </div>

                                <div class="col-lg-5 col-md-4 col-sm-12">

                                    <div class="list-details-btn text-right sm-left">

                                        <div class="trend-open">

                                            @if($property->type == 'sale') <p><span class="per_sale">starts from</span>{{$property->currency->icon}}{{$property->price}}</p> @endif

                                            @if($property->type == 'rent') <p>{{$property->currency->icon}}{{$property->price}}<span class="per_month">month</span></p> @endif

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!--Listing Details Hero ends-->

        <!--Listing Details Info starts-->

        <div class="single-property-details v1">

            <div class="container">

                <div class="row">

                    <div class="col-xl-8 col-lg-12">

                        <div class="listing-desc-wrap">

                            <div id="list-menu" class="list_menu">

                                <ul class="list-details-tab fixed_nav">

                                    <li class="nav-item active"><a href="#description" class="active">{{trans('file.description')}}</a></li>

                                    <li class="nav-item"><a href="#gallery">{{trans('file.gallery')}}</a></li>

                                    <li class="nav-item"><a href="#video">Video</a></li>

                                    <li class="nav-item"><a href="#details">{{trans('file.details')}}</a></li>

                                    <li class="nav-item"><a href="#book_tour">{{trans('file.book_tour')}}</a></li>

                                </ul>

                            </div>

                            <!--Listing Details starts-->

                            <div class="list-details-wrap">

                                <div id="description" class="list-details-section">

                                    <h4>{{trans('file.property_brief')}}</h4>

                                    <div class="overview-content">

                                        <p class="mb-10">{!! $property->propertyDetails->propertyDetailTranslation->content ?? $property->propertyDetails->propertyDetailTranslationEnglish->content  ?? null !!}</p>

                                    </div>

                                    <div class="mt-40">

                                        <h4 class="list-subtitle">{{trans('file.locations')}}</h4>
                                        <ul class="listing-address">

                                            @if($property->state)<li>State/county : <span>{{$property->state->stateTranslation->name ?? $property->state->stateTranslationEnglish->name  ?? null }}</span></li>@endif

                                            @if($property->country)<li>Country : <span>{{$property->country->countryTranslation->name ?? $property->country->countryTranslationEnglish->name  ?? null }}</span></li>@endif

                                            @if(isset($property->city))<li>City : <span>{{$property->city->cityTranslation->name ?? $property->city->cityTranslationEnglish->name  ?? null }}</span></li>@endif

                                        </ul>

                                    </div>

                                </div>

                                <div id="gallery" class="list-details-section">

                                    <h4>{{trans('file.gallery')}}</h4>

                                    <!--Carousel Wrapper-->

                                    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails list-gallery pt-2" data-ride="carousel">

                                        <!--Slides-->

                                        @php

                                            $pic = json_decode($property->image->name);

                                        @endphp

                                        <div class="carousel-inner" role="listbox">

                                            @foreach($pic as $key=>$p)
                                                <div class="carousel-item {{ $key == 0 ? ' active' : '' }}">
                                            @if(!env('USER_VERIFIED'))
                                            <img loading="lazy" class="d-block w-100" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                            @else
                                                    @if(file_exists( public_path() . '/images/gallery/'.$p))
                                                        <img loading="lazy" class="d-block w-100" src="{{ URL::asset('images/gallery/'.$p)}}" alt="slide">
                                                    @else
                                                        <img loading="lazy" class="d-block w-100" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                                    @endif
                                            @endif


                                                </div>

                                            @endforeach

                                        </div>

                                        <!--Controls starts-->

                                        <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">

                                            <span class="lnr lnr-arrow-left" aria-hidden="true"></span>

                                            <span class="sr-only">Previous</span>

                                        </a>

                                        <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">

                                            <span class="lnr lnr-arrow-right" aria-hidden="true"></span>

                                            <span class="sr-only">Next</span>

                                        </a>

                                        <!--Controls ends-->

                                        <ol class="carousel-indicators  list-gallery-thumb">

                                            @foreach($pic as $key=>$p)

                                                <li data-target="#carousel-thumb" data-slide-to="{{$key}}">
                                                    @if(!env('USER_VERIFIED'))
                                                    <img loading="lazy" class="d-block w-100" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                                    @else
                                                    <img loading="lazy" class="img-fluid d-block w-100" src="{{ URL::asset('images/gallery/'.$p)}}" alt="...">
                                                    @endif
                                                </li>

                                            @endforeach

                                        </ol>

                                    </div>

                                    <!--/.Carousel Wrapper-->

                                </div>

                                @if(isset($property->propertyDetails->video))

                                    <div id="video" class="list-details-section">

                                        <h4>{{trans('file.property_video')}}</h4>

                                        <div class="popup-vid pt-2">
                                            @if(!env('USER_VERIFIED'))
                                            <img loading="lazy" class="d-block w-100" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                            @else
                                                @if(file_exists( public_path() . '/images/thumbnail/'.$property->thumbnail))

                                                    <img loading="lazy" src="{{ URL::asset('/images/thumbnail/'.$property->thumbnail) }}" alt="" class="popup-img">

                                                @else
                                                    <img loading="lazy"src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                                @endif
                                            @endif

                                            <a class="popup-yt hvr-ripple-out" href="{{$property->propertyDetails->video}}">

                                                <i class="las la-play"></i>

                                            </a>

                                        </div>

                                    </div>

                                @endif

                                <div id="details" class="list-details-section">

                                    <div class="mb-40">

                                        <h4>{{trans('file.property_details')}}</h4>

                                        <ul class="property-info">



                                            <li>Property ID : <span>{{$property->property_id}}</span></li>

                                            <li>Property Type : <span>{{$property->category->name}}</span></li>

                                            <li>Property status : <span>For {{$property->type}}</span></li>

                                            <li>Property Price : <span>{{$property->type == 'sale' ? $property->price : $property->price.'/month' }}</span></li>

                                            <li>Rooms : <span>6</span></li>

                                            <li>Bedrooms: <span>{{$property->propertyDetails->garage}}</span></li>

                                            <li>Bath: <span>{{$property->propertyDetails->garage}}</span></li>

                                            <li>Garages: <span>{{$property->propertyDetails->garage}}</span></li>

                                        </ul>

                                    </div>

                                    <div class="mb-40">

                                        <h4>{{trans('file.amenities')}}</h4>

                                        <ul class="listing-features">

                                            @foreach($property->facilities as $facility)

                                                <li><i class="las la-basketball-ball"></i>{{$facility->facilityTranslation->name ?? $facility->facilityTranslationEnglish->name  ?? null }}</li>

                                            @endforeach

                                        </ul>

                                    </div>

                                </div>



                                <div id="book_tour" class="list-details-section">
                                    <div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
                                        Thank you for getting in touch!
                                    </div>
                                    <h4 class="list-details-title">{{trans('file.schedule_tour')}}</h4>
                                        <form class="tour-form" id="SubmitForm">
                                            <input type="hidden" name="id" value="{{$property->user->id}}" id="InputId">
                                            <input type="hidden" name="property_id" value="{{$property->id}}" id="PropertyId">
                                            <input type="hidden" name="title" value="{{$property->title}}" id="InputTitle">
                                            <input type="hidden" name="address" value="{{isset($property->country) ? $property->country->name : ''}}, {{isset($property->state) ? $property->state->name : ''}}, {{isset($property->city) ? $property->city->name : '' }}" id="InputAddress">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div id="datepicker-from" class="input-group date" data-date-format="dd-mm-yyyy">
                                                        <input class="form-control" name="date" type="text" placeholder="Tour Date" id="InputDate">
                                                        <span class="input-group-addon"><i class="lnr lnr-calendar-full"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="listing-input hero__form-input  form-control custom-select" name="time" id="InputTime">
                                                        <option value="">Tour Time</option>
                                                        <option value="8.00 am">8.00 am</option>
                                                        <option value="8.15 am">8.15 am</option>
                                                        <option value="8.30 am">8.30 am</option>
                                                        <option value="8.45 am">8.45 am</option>
                                                        <option value="9.00 am">9.00 am</option>
                                                        <option value="9.15 am">9.15 am</option>
                                                        <option value="9.30 am">9.30 am</option>
                                                        <option value="9.45 am">9.45 am</option>
                                                        <option value="10.00 am">10.00 am</option>
                                                        <option value="10.15 am">10.15 am</option>
                                                        <option value="10.30 am">10.30 am</option>
                                                        <option value="10.45 am">10.45 am</option>
                                                        <option value="11.00 am">11.00 am</option>
                                                    </select>
                                                    <span class="text-danger" id="timeErrorMsg"></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control filter-input" name="name" placeholder="Your name" id="InputName">
                                                    <span class="text-danger" id="nameErrorMsg"></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control filter-input" name="phone" placeholder="Your Phone" id="InputPhone">
                                                    <span class="text-danger" id="phoneErrorMsg"></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="email" class="form-control filter-input" name="email" placeholder="Your email" id="InputEmail">
                                                    <span class="text-danger" id="emailErrorMsg"></span>
                                                </div>
                                                <div class="col-md-12">
                                                    <textarea class="contact-form__textarea mb-25" name="message" id="comment" placeholder="Your Message"></textarea>
                                                    <span class="text-danger" id="messageErrorMsg"></span>
                                                </div>
                                                <div class="col-md-12">
                                                   <button type="submit" class="btn v3">
                                                        Submit
                                                   </button>
                                                </div>
                                            </div>
                                        </form>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-xl-4 col-lg-12">

                        <div id="list-sidebar" class="listing-sidebar">

                            <div class="widget">

                                <h3 class="widget-title">{{trans('file.contact_agency')}}</h3>
                                <div class="single-team-member agent-item v1">
                                    @if(!env('USER_VERIFIED'))
                                    <img loading="lazy" src="{{URL::asset('/images/users/agent_1.jpg')}}" alt="">
                                    @else
                                    <img loading="lazy" src="{{URL::asset('/images/users/'.$property->user->image)}}" alt="">
                                    @endif
                                    <div class="single-team-info">
                                        <div class="agent-content">
                                            <h4><a href="{{url('/agents/'.$property->user->id)}}">{{$property->user->f_name}} {{$property->user->l_name}}</a></h4>
                                            <span>{{$property->user->title}}</span>
                                            <ul class="list">
                                                <li>
                                                    <div class="contact-info">
                                                        <div class="icon">
                                                            <i class="las la-phone-alt"></i>
                                                        </div>
                                                        <div class="text"><a href="tel:44078767595">{{$property->user->mobile}}</a></div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="contact-info">
                                                        <div class="icon">
                                                            <i class="las la-envelope"></i>
                                                        </div>
                                                        <div class="text"><a href="#">{{$property->user->email}}</a></div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="social-buttons style2">
                                                <li><a href="{{$property->user->fb}}"><i class="lab la-facebook-f"></i></a></li>
                                                <li><a href="{{$property->user->twitter}}"><i class="lab la-twitter"></i></a></li>
                                                <li><a href="{{$property->user->instagram}}"><i class="lab la-pinterest-p"></i></a></li>
                                                <li><a href="{{$property->user->fb}}"><i class="lab la-youtube"></i></a></li>
                                            </ul>
                                            <a href="{{url('/agents/'.$property->user->id)}}" class="agent-link">{{trans('file.view_profile')}}</a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="widget">

                                <h3 class="widget-title">{{trans('file.recently_added')}}</h3>

                                @foreach($properties->take(3) as $recentlyAddedProperty)

                                    <li class="row recent-list">

                                        <div class="col-lg-5 col-4">

                                            <div class="entry-img">
                                            @if(!env('USER_VERIFIED'))
                                            <img loading="lazy" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                            @else
                                                @if(file_exists( public_path() . '/images/thumbnail/'.$recentlyAddedProperty->thumbnail))

                                                    <img loading="lazy" src="{{ URL::asset('/images/thumbnail/'.$recentlyAddedProperty->thumbnail) }}" alt="">

                                                @else

                                                    <img loading="lazy" src="{{asset('images/property/property_1.jpg')}}" alt="#">

                                                @endif
                                            @endif

                                                <span>For {{$recentlyAddedProperty->type =='sale' ? 'Sale' : 'Rent'}}</span>

                                            </div>

                                        </div>

                                        <div class="col-lg-7 col-8 no-pad-left">

                                            <div class="entry-text">

                                                <h4 class="entry-title"><a href="{{route('front.property',['property'=>$recentlyAddedProperty->id])}}">{{$propertyTranslation[$recentlyAddedProperty->id]->title ?? $propertyTranslationEnglish[$recentlyAddedProperty->id]->title  ?? null }}</a></h4>

                                                <div class="property-location no-pad-lr d-flex">

                                                    <i class="las la-map-marker-alt"></i>

                                                    <p>{{$recentlyAddedProperty->state->stateTranslation->name ?? $recentlyAddedProperty->state->stateTranslationEnglish->name  ?? null }}, {{$recentlyAddedProperty->city->cityTranslation->name ?? $recentlyAddedProperty->city->cityTranslationEnglish->name  ?? null }}</p>

                                                </div>

                                                <div class="trend-open">

                                                    @if($recentlyAddedProperty->type == 'sale') <p><span class="per_sale">starts from</span>{{$recentlyAddedProperty->currency->icon}}{{$recentlyAddedProperty->price}}</p> @endif

                                                    @if($recentlyAddedProperty->type == 'rent') <p>{{$recentlyAddedProperty->currency->icon}}{{$recentlyAddedProperty->price}}<span class="per_month">month</span></p> @endif

                                                </div>

                                            </div>

                                        </div>

                                    </li>

                                @endforeach

                            </div>

                            <div class="widget">

                                <h3 class="widget-title">{{trans('file.featured_property')}}</h3>

                                <div class="swiper-container single-featured-list">

                                    <div class="swiper-wrapper">

                                        @foreach($properties->where('is_featured',1) as $featuredProperty)

                                            <div class="swiper-slide single-property-box">

                                                <div class="property-item">

                                                    <a class="property-img" href="{{route('front.property',['property'=>$featuredProperty->id])}}">
                                                    @if(!env('USER_VERIFIED'))
                                                    <img loading="lazy" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                                    @else

                                                        @if(file_exists( public_path() . '/images/thumbnail/'.$featuredProperty->thumbnail))

                                                            <img loading="lazy" src="{{ URL::asset('/images/thumbnail/'.$featuredProperty->thumbnail) }}" alt="">

                                                        @else

                                                            <img loading="lazy" src="{{asset('images/property/property_1.jpg')}}" alt="#">

                                                        @endif
                                                    @endif

                                                    </a>

                                                    <ul class="feature_text">

                                                        <li class="feature_cb"><span> Featured</span></li>

                                                        <li class="feature_or"><span>For {{$featuredProperty->type =='sale' ? 'Sale' : 'Rent'}}</span></li>

                                                    </ul>

                                                    <div class="property-author-wrap">

                                                        <h4><a href="#" class="property-author">

                                                                {{$propertyTranslation[$featuredProperty->id]->title ?? $propertyTranslationEnglish[$featuredProperty->id]->title  ?? null }}

                                                            </a>

                                                        </h4>

                                                        <div class="featured-price">

                                                            @if($featuredProperty->type == 'sale') <p><span class="per_sale">starts from</span>{{$featuredProperty->currency->icon}}{{$featuredProperty->price}}</p> @endif

                                                            @if($featuredProperty->type == 'rent') <p>{{$featuredProperty->currency->icon}}{{$featuredProperty->price}}<span class="per_month">month</span></p> @endif

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        @endforeach

                                    </div>

                                    <div class="slider-btn v3 single-featured-next"><i class="lnr lnr-arrow-right"></i></div>

                                    <div class="slider-btn v3 single-featured-prev"><i class="lnr lnr-arrow-left"></i></div>

                                </div>

                            </div>



                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!--Listing Details Info ends-->

        <!--Similar Listing starts-->

        <div class="similar-listing-wrap pb-70 mt-70">

            <div class="container">

                <div class="col-md-12 px-0">

                    <div class="similar-listing">

                        <div class="section-title v2">

                            <h2>{{trans('file.similar_listing')}}</h2>

                        </div>

                        <div class="swiper-container similar-list-wrap">

                            <div class="swiper-wrapper">

                                @foreach($properties as $similarListing)

                                    @if($property->city_id == $similarListing->city_id)

                                        <div class="swiper-slide">

                                            <div class="single-property-box">

                                                <div class="property-item">

                                                    <a class="property-img" href="{{route('front.property',['property'=>$similarListing->id])}}">
                                                        @if(!env('USER_VERIFIED'))
                                                        <img loading="lazy" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                                        @else
                                                            @if(file_exists( public_path() . '/images/thumbnail/'.$similarListing->thumbnail))

                                                                <img loading="lazy" src="{{ URL::asset('/images/thumbnail/'.$similarListing->thumbnail) }}" alt="">

                                                            @else

                                                                <img loading="lazy" src="{{asset('images/property/property_1.jpg')}}" alt="#">

                                                            @endif
                                                        @endif

                                                        <ul class="feature_text">

                                                            @if($property->is_featured == 1)<li class="feature_cb"><span> Featured</span></li>@endif

                                                            @if($property->type == 'sale')<li class="feature_or"><span>For Sale</span></li>@endif

                                                            @if($property->type == 'rent')<li class="feature_or"><span>For Rent</span></li>@endif

                                                        </ul>

                                                        <div class="property-author-wrap">

                                                            <a href="{{route('agents.show',$similarListing->user_id)}}" class="property-author">
                                                                @if(!env('USER_VERIFIED'))
                                                                <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="#">
                                                                    @else
                                                                    @if(file_exists( public_path() . '/images/users/'.$similarListing->user->image))

                                                                        <img loading="lazy" src="{{ URL::asset('/images/users/'.$similarListing->user->image) }}" alt="Image">

                                                                    @else

                                                                        <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="#">

                                                                    @endif
                                                                @endif

                                                                <span>{{$similarListing->user->f_name}} {{$similarListing->user->l_name}}</span>

                                                            </a>


                                                        </div>

                                                </div>

                                                <div class="property-title-box">

                                                    <h4><a href="{{route('front.property',['property'=>$similarListing->id])}}">{{$similarListing->propertyTranslation->title ?? $similarListing->propertyTranslationEnglish->title ?? null}}</a></h4>

                                                    <div class="property-location no-pad-lr">

                                                        <i class="las la-map-marker-alt"></i>

                                                        <p>{{$similarListing->country->countryTranslation->name ?? $similarListing->country->countryTranslationEnglish->name ?? null }} , {{$similarListing->state->stateTranslation->name ?? $similarListing->state->stateTranslationEnglish->name ?? null}}, {{$similarListing->city->cityTranslation->name ?? $similarListing->city->cityTranslationEnglish->name ?? null}}</p>

                                                    </div>

                                                    <ul class="property-feature no-pad-lr">

                                                        <li> <i class="las la-bed"></i>

                                                            <span>{{$similarListing->propertyDetails->bed}} Bedrooms</span>

                                                        </li>

                                                        <li> <i class="las la-bath"></i>

                                                            <span>{{$similarListing->propertyDetails->bath}} Bath</span>

                                                        </li>

                                                        <li> <i class="las la-arrows-alt"></i>

                                                            <span>{{$similarListing->propertyDetails->room_size}} sq ft</span>

                                                        </li>

                                                        <li> <i class="las la-car"></i>

                                                            <span>{{$similarListing->propertyDetails->garage}} Garage</span>

                                                        </li>

                                                    </ul>

                                                    <div class="trending-bottom trend-open">
                                                        @if($similarListing->type == 'sale') <p><span class="per_sale">starts from</span>{{$similarListing->currency->icon}}{{$similarListing->price}}</p> @endif


                                                        @if($similarListing->type == 'rent') <p>{{$similarListing->currency->icon}}{{$similarListing->price}}<span class="per_month">month</span></p> @endif
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    @endif

                                @endforeach

                            </div>

                        </div>

                        <div class="slider-btn v2 similar-next"><i class="lnr lnr-arrow-right"></i></div>

                        <div class="slider-btn v2 similar-prev"><i class="lnr lnr-arrow-left"></i></div>

                    </div>

                </div>

            </div>

        </div>

        <!--Similar Listing ends-->

    </div>
    <div class="load-overlay"></div>

@endsection
@push('script')
<script type="text/javascript">

    $('#SubmitForm').on('submit',function(e){
        e.preventDefault();
        $('.v3').text("Submitting...");
        $('.v3').prop('disabled', true);
        let id = $('#InputId').val();
        let title = $('#InputTitle').val();
        let address = $('#InputAddress').val();
        let date = $('#InputDate').val();
        let time = $('#InputTime').val();
        let name = $('#InputName').val();
        let email = $('#InputEmail').val();
        let phone = $('#InputPhone').val();
        let message = $('#comment').val();
        let property_id = $('#PropertyId').val();
        let comment = $('#comment').val();

        $.ajax({
            url: "{{route('booking.request')}}",
            type:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                id:id,
                title:title,
                address:address,
                date:date,
                time:time,
                name:name,
                email:email,
                phone:phone,
                message:message,
                property_id:property_id,
                comment:comment
            },
            success:function(response){
            $('#InputDate').val("");
            $('#InputTime').val("");
            $('#InputName').val("");
            $('#InputEmail').val("");
            $('#InputPhone').val("");
            $('#comment').val("");

            $('.v3').text("Submit");
            $('.v3').prop('disabled', false);

            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Booking Request Submitted!',
                showConfirmButton: false,
                timer: 1500
            })
            },
            error: function(response) {
                Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                showConfirmButton: false,
                timer: 1500
                })
                setTimeout(function() {
                    $('#timeErrorMsg').fadeOut("slow");
                    $('#dateErrorMsg').fadeOut("slow");
                    $('#nameErrorMsg').fadeOut("slow");
                    $('#phoneErrorMsg').fadeOut("slow");
                    $('#emailErrorMsg').fadeOut("slow");
                    $('#messageErrorMsg').fadeOut("slow");
                        }, 3000);
                $('.v3').text("Submit");
                $('.v3').prop('disabled', false);
            },
        });
    });

    // Add remove loading class on body element based on Ajax request status
    $(document).on({
        ajaxStart: function(){
            $("body").addClass("loading");
        },
        ajaxStop: function(){
            $("body").removeClass("loading");
        }
    });
</script>
@endpush
