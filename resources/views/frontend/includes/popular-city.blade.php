<div class="container pt-100">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title v1">
                <p>{{trans('file.browse_popular_properties')}}</p>
                <h2>{{trans('file.find_properties_in_your_city')}}</h2>
            </div>
        </div>
    </div>
</div>
<div class="property-place pb-60 hideme">
    <div class="container">
        <div class="row">
            <div class="swiper-container popular-place-wrap v1">
                <div class="swiper-wrapper">
                    @foreach($city->take(6) as $city)
                    <div class="swiper-slide single-place-wrap">
                        <div class="single-place-image">
                            <a href="{{route('property.city',$city)}}">
                            @if(!env('USER_VERIFIED'))
                            <img loading="lazy" src="{{'images/cities/place_1.jpg'}}" alt="" width="750" height="500">
                            @else
                                @if(file_exists( public_path() . '/images/cities/'.$city->image))
                                    <img src="{{ URL::asset('/images/cities/'.$city->image) }}" alt="Image">
                                @else
                                    <img src="{{asset('/images/cities/place_1.jpg')}}" alt="place-image">
                                @endif
                            @endif
                            </a>
                            <a class="single-place-title" href="location-left-sidebar.html">{{$city->name}}</a>
                        </div>
                        <div class="single-place-content">
                            <h3><span>{{count($city->properties)}}</span>{{count($city->properties) > 1 ? 'Properties' : 'Property'}}</h3>
                            <a href="{{url('properties')}}">{{ trans('file.see_all_listings') }}<i class="lnr lnr-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="slider-btn v2 popular-next"><i class="lnr lnr-arrow-right"></i></div>
                <div class="slider-btn v2 popular-prev"><i class="lnr lnr-arrow-left"></i></div>
            </div>
        </div>
    </div>
</div>
