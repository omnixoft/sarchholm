<div class="featured-property-section mt-1">
    <div class="container-fluid no-pad-lr">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title v1">
                    <p>{{trans('file.check_out_our')}}</p>
                    <h2>{{trans('file.featured_property')}}</h2>
                </div>
            </div>
        </div>
        <div class="featured-property-wrap v1 swiper-container">
        <div class="swiper-wrapper">
        @foreach($properties->where('is_featured',1) as $property)
            <div class="swiper-slide">
                @if(!env('USER_VERIFIED'))
                <div class="featured-property-item bg-h" style="background-image: url('{{URL::asset('/images/breadcrumb/breadcrumb_2.jpg')}}');">
                @else
                <div class="featured-property-item bg-h" style=" @if(file_exists( public_path() . '/images/backgroundImage/'.$property->background_image)) background-image: url('{{URL::asset('/images/backgroundImage/'.$property->background_image)}}');  @else background-image: url('{{asset('/images/featured/featured_6.jpg')}}') @endif">
                @endif
                    <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-12">
                            <div class="featured-property-info">
                                <div class="property-title-box">
                                    <h4><a href="{{route('front.property',['property'=>$property->id])}}">{{$propertyTranslation[$property->id]->title ?? $propertyTranslationEnglish[$property->id]->title ?? null}}</a></h4>
                                    <div class="property-location no-pad-lr">
                                        <i class="las la-map-marker-alt"></i>
                                        <p>{{ $country[$property->country_id]->countryTranslation->name ?? $country[$property->country_id]->countryTranslationEnglish->name ?? null }} , {{$states[$property->state_id]->stateTranslation->name ?? $states[$property->state_id]->stateTranslationEnglish->name ?? null}}, {{$city[$property->city_id]->cityTranslation->name ?? $city[$property->city_id]->cityTranslationEnglish->name ?? null}}</p>
                                    </div>
                                    <ul class="property-feature no-pad-lr">
                                        <li> <i class="las la-bed"></i>
                                            <span>{{$propertyDetails[$property->id]->bed}} {{ trans('file.bedrooms') }}</span>
                                        </li>
                                        <li> <i class="las la-bath"></i>
                                            <span>{{$propertyDetails[$property->id]->bath}} {{ trans('file.bath') }}</span>
                                        </li>
                                        <li> <i class="las la-arrows-alt"></i>
                                            <span>{{$propertyDetails[$property->id]->room_size}} {{ trans('file.sq-ft') }}</span>
                                        </li>
                                        <li> <i class="las la-car"></i>
                                            <span>{{$propertyDetails[$property->id]->garage}} {{ trans('file.garage') }}</span>
                                        </li>
                                    </ul>
                                    <div class="trending-bottom trend-open no-pad-lr">
                                        @if($property->type == 'sale') <p><span class="per_sale">{{ trans('file.starts_from') }}</span>{{$property->currency->icon}}{{$property->price}}</p> @endif
                                        @if($property->type == 'rent') <p>{{$property->currency->icon}}{{$property->price}}<span class="per_month">{{ trans('file.month') }}</span></p> @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        @endforeach
        </div>
            <!--Slider Arrows-->
            <div class="slider-btn v2 featured-prev"><i class="lnr lnr-arrow-left"></i></div>
            <div class="slider-btn v2 featured-next"><i class="lnr lnr-arrow-right"></i></div>
        </div>
    </div>
</div>
