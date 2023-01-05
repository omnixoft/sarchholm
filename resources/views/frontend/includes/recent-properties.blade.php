<div class="trending-places pb-100 mt-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title v2">
                    <p>{{trans('file.browse_some_of_our')}}</p>
                    <h2>{{trans('file.recent_properties')}}</h2>
                </div>
            </div>
            <div class="swiper-container trending-place-wrap">
                <div class="swiper-wrapper">
                    @foreach($properties->take(15) as $property)
                    <div class="swiper-slide">
                        <div class="single-property-box">
                            <div class="property-item">
                                <a class="property-img" href="{{route('front.property',['property'=>$property->id])}}">
                                    @if(!env('USER_VERIFIED'))
                                    <img loading="lazy" src="{{'images/thumbnail/property_1.jpg'}}" alt="" width="750" height="500">
                                    @else
                                    <img loading="lazy" src="{!! $property->photo() !!}" alt="" width="750" height="500">
                                    @endif
                                </a>
                                <ul class="feature_text">
                                    @if($property->is_featured == 1)<li class="feature_cb"><span> {{trans('file.featured')}}</span></li>@endif
                                    @if($property->type == 'sale')<li class="feature_or"><span>{{trans('file.for_sale')}}</span></li>@endif
                                    @if($property->type == 'rent')<li class="feature_or"><span>{{trans('file.for_rent')}}</span></li>@endif
                                </ul>
                                <div class="property-author-wrap">
                                    <a href="{{route('agents.show',$property->user_id)}}" class="property-author">
                                        @if(!env('USER_VERIFIED'))
                                        <img loading="lazy" src="{{'images/users/agent_min_1.jpg'}}" alt="" width="750" height="500">
                                        @else
                                        <img loading="lazy" src="{!! isset($agents[$property->user_id]) ?  $agents[$property->user_id]->photo() : null !!}" alt="" width="50" height="50">
                                        @endif
                                        <span>{{ isset($agents[$property->user_id]) ? $agents[$property->user_id]->f_name : null}} {{ isset($agents[$property->user_id]) ? $agents[$property->user_id]->l_name : null}}</span>
                                    </a>
                                    <a href=".photo-gallery" class="btn-gallery" data-toggle="tooltip" data-placement="top" title="Photos"><i class="lnr lnr-camera"></i></a>
                                    <div class="hidden photo-gallery">
                                        @php
                                            $pic = json_decode($image[$property->id]->name);
                                        @endphp
                                        @foreach($pic as $p)
                                            <a href="{{ URL::asset("storage/images/".$p)}}"></a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="property-title-box">
                                <h4><a href="{{route('front.property',['property'=>$property->id])}}">{{$propertyTranslation[$property->id]->title ?? $propertyTranslationEnglish[$property->id]->title ?? null}}</a></h4>
                            </div>
                            <div class="property-location">
                                <i class="las la-map-marker-alt"></i>
                                <p>{{ $country[$property->country_id]->countryTranslation->name ?? $country[$property->country_id]->countryTranslationEnglish->name ?? null }} , {{$states[$property->state_id]->stateTranslation->name ?? $states[$property->state_id]->stateTranslationEnglish->name ?? null}}, {{$city[$property->city_id]->cityTranslation->name ?? $city[$property->city_id]->cityTranslationEnglish->name ?? null}}</p>
                            </div>
                            <ul class="property-feature">
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
                            <div class="trending-bottom trend-open">
                                @if($property->type == 'sale') <p><span class="per_sale">{{ trans('file.starts_from') }}</span>{{$property->currency->icon}}{{$property->price}}</p> @endif
                                @if($property->type == 'rent') <p>{{$property->currency->icon}}{{$property->price}}<span class="per_month">{{ trans('file.month') }}</span></p> @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="trending-pagination"></div>
        </div>
    </div>
</div>
