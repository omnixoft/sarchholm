@extends('frontend.main')
@push('styles')
<link href="{{asset('css/leaflet.css')}}" rel="stylesheet" />
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
    <!--Breadcrumb section starts-->
    <!--Breadcrumb section ends-->
    <!--Listing section starts-->
    <div class="filter-wrapper style1 mt-115 half-map">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-7 col-lg-12">
                    <div class="map-sidebar-content">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-sm-5 col-5">
                                <div class="item-view-mode res-box">
                                    <!-- item-filter-list Menu starts -->
                                    <ul class="nav item-filter-list" role="tablist">
                                        <li><a data-toggle="tab" href="#grid-view"><i class="las la-th-large"></i></a></li>
                                        <li><a class="active" data-toggle="tab" href="#list-view"><i class="las la-list"></i></a></li>
                                    </ul>
                                    <!-- item-filter-list Menu ends -->
                                </div>
                            </div>
                        
                            <div class="col-lg-5 col-sm-12">
                                <div class="item-element res-box  text-right sm-left">
                                    {{-- <p>Showing <span> {{($properties->currentPage()-1)* $properties->perPage()+($properties->total() ? 1:0)}} to {{($properties->currentPage()-1)*$properties->perPage()+count($properties)}}  of  {{$properties->total()}}</span>  Listings</p> --}}

                                </div>
                            </div>
                        </div>

                        @include('frontend.includes.filter-form')

                        <div class="item-wrapper pt-20">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade  property-grid" id="grid-view">
                                    <div class="row">
                                        @if($properties)
                                        @foreach($properties as $property)

                                            <div class="col-md-6 col-sm-12">
                                                <div class="single-property-box">
                                                    <div class="property-item">
                                                        <a class="property-img" href="{{route('front.property',['property'=>$property->id])}}">
                                                            <img loading="lazy" src="{!! $property->photo() !!}" alt="">
                                                        </a>
                                                        <ul class="feature_text">
                                                            @if($property->is_featured == 1)<li class="feature_cb"><span> Featured</span></li>@endif
                                                            @if($property->type == 'sale')<li class="feature_or"><span>For Sale</span></li>@endif
                                                            @if($property->type == 'rent')<li class="feature_or"><span>For Rent</span></li>@endif
                                                        </ul>
                                                        <div class="property-author-wrap">
                                                            <a href="{{route('agents.show',$property->user_id)}}" class="property-author">
                                                                <img loading="lazy" src="{!! $property->user->photo() !!}" alt="">
                                                                <span>{{$property->user->f_name}} {{$property->user->l_name}}</span>
                                                            </a>
                                                            <a href=".photo-gallery" class="btn-gallery" data-toggle="tooltip" data-placement="top" title="Photos"><i class="lnr lnr-camera"></i></a>
                                                            <div class="hidden photo-gallery">
                                                                @php
                                                                    $pic = json_decode($property->image->name);
                                                                @endphp
                                                                @foreach($pic as $p)
                                                                    <a href="{{ URL::asset("storage/images/".$p)}}"></a>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="property-title-box">
                                                        <h4><a href="{{route('front.property',['property'=>$property->id])}}">{{isset($property->propertyTranslation->title) ? $property->propertyTranslation->title : 'title'}}</a></h4>
                                                    </div>
                                                    <div class="property-location">
                                                        <i class="las la-map-marker-alt"></i>
                                                        <p>{{$property->country->countryTranslation->name ?? $property->country->countryTranslationEnglish->name ?? null}} , {{$property->state->stateTranslation->name ?? $property->state->stateTranslationEnglish->name ?? null}}, {{$property->city->cityTranslation->name ?? $property->city->cityTranslationEnglish->name ?? null}}</p>
                                                    </div>
                                                    <ul class="property-feature">
                                                        <li> <i class="las la-bed"></i>
                                                            <span>{{$property->propertyDetails->bed}} Bedrooms</span>
                                                        </li>
                                                        <li> <i class="las la-bath"></i>
                                                            <span>{{$property->propertyDetails->bath}} Bath</span>
                                                        </li>
                                                        <li> <i class="las la-arrows-alt"></i>
                                                            <span>{{$property->propertyDetails->room_size}} sq ft</span>
                                                        </li>
                                                        <li> <i class="las la-car"></i>
                                                            <span>{{$property->propertyDetails->garage}} Garage</span>
                                                        </li>
                                                    </ul>
                                                    <div class="trending-bottom trend-open">
                                                        @if($property->type == 'sale') <p><span class="per_sale">starts from</span>${{$property->price}}</p> @endif
                                                        @if($property->type == 'rent') <p>${{$property->price}}<span class="per_month">month</span></p> @endif
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                        @else
                                        <strong style="font-size: 50px">NO RESULTS FOUND!</strong>
                                    @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade show active  property-list get-properties" id="list-view">
                                    @if($properties)
                                    @foreach($properties as $property)
                                        <div class="single-property-box">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="property-item">
                                                        <a class="property-img" href="{{route('front.property',['property'=>$property->id])}}">
                                                            @if(file_exists( public_path() . '/images/thumbnail/'.$property->thumbnail))
                                                                <img loading="lazy" src="{{ URL::asset('/images/thumbnail/'.$property->thumbnail) }}" alt="">
                                                            @else
                                                                <img loading="lazy" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                                            @endif
                                                        </a>
                                                        <ul class="feature_text">
                                                            @if($property->is_featured == 1)<li class="feature_cb"><span> Featured</span></li>@endif
                                                            @if($property->type == 'sale')<li class="feature_or"><span>For Sale</span></li>@endif
                                                            @if($property->type == 'rent')<li class="feature_or"><span>For Rent</span></li>@endif
                                                        </ul>
                                                        <div class="property-author-wrap">
                                                            <a href="{{route('agents.show',$property->user_id)}}" class="property-author">
                                                                @if(file_exists( public_path() . '/images/users/'.$property->user->image))
                                                                    <img loading="lazy" src="{{ URL::asset('/images/users/'.$property->user->image) }}" alt="Image">
                                                                @else
                                                                    <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="#">
                                                                @endif
                                                                <span>{{$property->user->f_name}} {{$property->user->l_name}}</span>
                                                            </a>
                                                            <a href=".photo-gallery" class="btn-gallery" data-toggle="tooltip" data-placement="top" title="Photos"><i class="lnr lnr-camera"></i></a>
                                                            <div class="hidden photo-gallery">
                                                                @php
                                                                    $pic = json_decode($property->image->name);
                                                                @endphp
                                                                @foreach($pic as $p)
                                                                    <a href="{{ URL::asset("storage/images/".$p)}}"></a>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="property-title-box">
                                                        <h4><a href="{{route('front.property',['property'=>$property->id])}}">{{isset($property->propertyTranslation->title) ? $property->propertyTranslation->title : 'title'}}</a></h4>
                                                        <div class="property-location no-pad-lr">
                                                            <i class="las la-map-marker-alt"></i>
                                                            <p>{{$property->country->countryTranslation->name}} , {{$property->state->stateTranslation->name}}, {{$property->city->cityTranslation->name}}</p>
                                                        </div>
                                                        <ul class="property-feature no-pad-lr">
                                                            <li> <i class="las la-bed"></i>
                                                                <span>{{$property->propertyDetails->bed}} Bedrooms</span>
                                                            </li>
                                                            <li> <i class="las la-bath"></i>
                                                                <span>{{$property->propertyDetails->bath}} Bath</span>
                                                            </li>
                                                            <li> <i class="las la-arrows-alt"></i>
                                                                <span>{{$property->propertyDetails->room_size}} sq ft</span>
                                                            </li>
                                                            <li> <i class="las la-car"></i>
                                                                <span>{{$property->propertyDetails->garage}} Garage</span>
                                                            </li>
                                                        </ul>
                                                        <div class="trending-bottom trend-open no-pad-lr">
                                                            <p><span class="per_sale">starts from</span>${{$property->price}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @else
                                        <strong style="font-size: 50px">NO RESULTS FOUND!</strong>
                                    @endif
                                </div>
                                <!--pagination starts-->
                            <!--pagination ends-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="explore__map-side">
                    <!--Leaflet Map starts-->
                    <div id="map-container" class="fullwidth-home-map">
                        <div id="map" data-map-scroll="false">
                            <!-- map goes here -->
                        </div>
                    </div>
                    <!--Leaflet Map ends-->
                </div>
            </div>
        </div>
    </div>
    <!--Listing section ends-->
    <!--Blog section ends-->
    <div class="load-overlay"></div>
@endsection
@push('script')
<!-- Leaflet js -->
<script src="{{asset('js/leaflet.min.js')}}"></script>
<!-- Leaflet Maps Scripts -->
<script src="{{asset('js/leaflet-markercluster.min.js')}}"></script>
<script>
    $(document).ready(function () {
        var data = new Array();
        var allData = @json($data);
        // let formData = new FormData(allData);
        var propId = $('.propId').val();
        // console.log(allData);
        if(allData.category_id && allData.city_id==="" && allData.minPrice ==="" && allData.maxPrice==="" && allData.minArea ==="" && allData.maxArea==="" && allData.bed==="" && allData.bath==="" && allData.title==="")
        {
            // console.log(true);
            var api_url1 = window.location.href+'/../../api/properties/search-properties/'+allData.category_id;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/'+allData.category_id;
        }
        if(allData.category_id==="" && allData.city_id && allData.minPrice ==="" && allData.maxPrice==="" && allData.minArea ==="" && allData.maxArea==="" && allData.bed==="" && allData.bath==="" && allData.title==="")
        {
            var api_url1 = window.location.href+'/../../api/properties/search-properties/cities/'+allData.city_id;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/cities/'+allData.city_id;
        }
        if(allData.category_id==="" && allData.city_id==="" && allData.minPrice && allData.maxPrice && allData.minArea ==="" && allData.maxArea==="" && allData.bed==="" && allData.bath==="" && allData.title==="")
        {
            var api_url1 = window.location.href+'/../../api/properties/search-properties/prices/'+allData.minPrice+'/'+allData.maxPrice;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/prices/'+allData.minPrice+'/'+allData.maxPrice;
        }
        if(allData.category_id==="" && allData.city_id==="" && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea && allData.maxArea && allData.bed==="" && allData.bath==="" && allData.title==="")
        {
            var api_url1 = window.location.href+'/../../api/properties/search-properties/areas/'+allData.minArea+'/'+allData.maxArea;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/areas/'+allData.minArea+'/'+allData.maxArea;
        }
        if(allData.category_id && allData.city_id && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea==="" && allData.maxArea==="" && allData.bed==="" && allData.bath==="" && allData.title==="")
        {
            var api_url1 = window.location.href+'/../../api/properties/search-properties/category-city/'+allData.category_id+'/'+allData.city_id;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/category-city/'+allData.category_id+'/'+allData.city_id;
        }

        if(allData.category_id && allData.city_id==="" && allData.minPrice && allData.maxPrice && allData.minArea ==="" && allData.maxArea==="" && allData.bed==="" && allData.bath==="" && allData.title==="")
        {
            // console.log(true);
            var api_url1 = window.location.href+'/../../api/properties/search-properties/category-price/'+allData.category_id+'/'+allData.minPrice+'/'+allData.maxPrice;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/category-price/'+allData.category_id+'/'+allData.minPrice+'/'+allData.maxPrice;
        }
        if(allData.category_id && allData.city_id==="" && allData.minPrice ==="" && allData.maxPrice==="" && allData.minArea && allData.maxArea && allData.bed==="" && allData.bath==="" && allData.title==="")
        {
            var api_url1 = window.location.href+'/../../api/properties/search-properties/category-area/'+allData.category_id+'/'+allData.minArea+'/'+allData.maxArea;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/category-area/'+allData.category_id+'/'+allData.minArea+'/'+allData.maxArea;
        }
        if(allData.category_id==="" && allData.city_id && allData.minPrice && allData.maxPrice && allData.minArea ==="" && allData.maxArea==="" && allData.bed==="" && allData.bath==="" && allData.title==="")
        {
            var api_url1 = window.location.href+'/../../api/properties/search-properties/city-price/'+allData.city_id+'/'+allData.minPrice+'/'+allData.maxPrice;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/city-price/'+allData.city_id+'/'+allData.minPrice+'/'+allData.maxPrice;
        }
        if(allData.category_id==="" && allData.city_id && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea && allData.maxArea && allData.bed==="" && allData.bath==="" && allData.title==="")
        {
            var api_url1 = window.location.href+'/../../api/properties/search-properties/city-area/'+allData.city_id+'/'+allData.minArea+'/'+allData.maxArea;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/city-area/'+allData.city_id+'/'+allData.minArea+'/'+allData.maxArea;
        }
        if(allData.category_id==="" && allData.city_id==="" && allData.minPrice && allData.maxPrice && allData.minArea && allData.maxArea && allData.bed==="" && allData.bath==="" && allData.title==="")
        {
            var api_url1 = window.location.href+'/../../api/properties/search-properties/price-area/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.minArea+'/'+allData.maxArea;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/price-area/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.minArea+'/'+allData.maxArea;
        }

        if(allData.category_id && allData.city_id && allData.minPrice && allData.maxPrice && allData.minArea ==="" && allData.maxArea==="" && allData.bed==="" && allData.bath==="" && allData.title==="")
        {
            // console.log(true);
            var api_url1 = window.location.href+'/../../api/properties/search-properties/category-city-price/'+allData.category_id+'/'+allData.city_id+'/'+'/'+allData.minPrice+'/'+allData.maxPrice;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/category-city-price/'+allData.category_id+'/'+allData.city_id+'/'+'/'+allData.minPrice+'/'+allData.maxPrice;
        }
        if(allData.category_id && allData.city_id && allData.minPrice ==="" && allData.maxPrice==="" && allData.minArea && allData.maxArea && allData.bed==="" && allData.bath==="" && allData.title==="")
        {
            var api_url1 = window.location.href+'/../../api/properties/search-properties/category-city-area/'+allData.category_id+'/'+allData.city_id+'/'+allData.minArea+'/'+allData.maxArea;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/category-city-area/'+allData.category_id+'/'+allData.city_id+'/'+allData.minArea+'/'+allData.maxArea;
        }
        if(allData.category_id && allData.city_id==="" && allData.minPrice && allData.maxPrice && allData.minArea && allData.maxArea && allData.bed==="" && allData.bath==="" && allData.title==="")
        {
            var api_url1 = window.location.href+'/../../api/properties/search-properties/category-price-area/'+allData.category_id+'/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.minArea+'/'+allData.maxArea;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/category-price-area/'+allData.category_id+'/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.minArea+'/'+allData.maxArea;
        }
        if(allData.category_id==="" && allData.city_id && allData.minPrice && allData.maxPrice && allData.minArea && allData.maxArea && allData.bed==="" && allData.bath==="" && allData.title==="")
        {
            var api_url1 = window.location.href+'/../../api/properties/search-properties/city-price-area/'+allData.city_id+'/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.minArea+'/'+allData.maxArea;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/city-price-area/'+allData.city_id+'/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.minArea+'/'+allData.maxArea;
        }
        if(allData.category_id && allData.city_id && allData.minPrice && allData.maxPrice && allData.minArea && allData.maxArea && allData.bed==="" && allData.bath==="" && allData.title==="")
        {
            var api_url1 = window.location.href+'/../../api/properties/search-properties/category-city-price-area/'+allData.category_id+'/'+allData.city_id+'/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.minArea+'/'+allData.maxArea;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/category-city-price-area/'+allData.category_id+'/'+allData.city_id+'/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.minArea+'/'+allData.maxArea;
        }

        if(allData.category_id==="" && allData.city_id==="" && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea==="" && allData.maxArea==="" && allData.bed && allData.bath && allData.title==="")
        {
            var api_url1 = window.location.href+'/../../api/properties/search-properties/bed-bath/'+allData.bed+'/'+allData.bath;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/bed-bath/'+allData.bed+'/'+allData.bath;
        }
        if(allData.category_id==="" && allData.city_id==="" && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea==="" && allData.maxArea==="" && allData.bed && allData.bath==="" && allData.title==="" && allData.title==="")
        {
            //bed
            var api_url1 = window.location.href+'/../../api/properties/search-properties/bed/'+allData.bed;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/bed/'+allData.bed;
        }
        if(allData.category_id==="" && allData.city_id==="" && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea==="" && allData.maxArea==="" && allData.bed==="" && allData.bath && allData.title==="" && allData.title==="")
        {
            //bath
            var api_url1 = window.location.href+'/../../api/properties/search-properties/bath/'+allData.bath;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/bath/'+allData.bath;
        }
        if(allData.category_id && allData.city_id==="" && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea==="" && allData.maxArea==="" && allData.bed && allData.bath==="" && allData.title==="" && allData.title==="")
        {
            //category-bed
            var api_url1 = window.location.href+'/../../api/properties/search-properties/category-bed/'+allData.category_id+'/'+allData.bed;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/category-bed/'+allData.category_id+'/'+allData.bed;
        }
        if(allData.category_id && allData.city_id==="" && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea==="" && allData.maxArea==="" && allData.bed==="" && allData.bath && allData.title==="" && allData.title==="")
        {
            //category-bath
            var api_url1 = window.location.href+'/../../api/properties/search-properties/category-bath/'+allData.category_id+'/'+allData.bath;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/category-bath/'+allData.category_id+'/'+allData.bath;
        }
        if(allData.category_id && allData.city_id==="" && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea==="" && allData.maxArea==="" && allData.bed && allData.bath && allData.title==="")
        {
            //category-bed-bath
            var api_url1 = window.location.href+'/../../api/properties/search-properties/category-bed-bath/'+allData.category_id+'/'+allData.bed+'/'+allData.bath;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/category-bed-bath/'+allData.category_id+'/'+allData.bed+'/'+allData.bath;
        }
        if(allData.category_id==="" && allData.city_id && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea==="" && allData.maxArea==="" && allData.bed && allData.bath==="" && allData.title==="")
        {
            //city-bed
            var api_url1 = window.location.href+'/../../api/properties/search-properties/city-bed/'+allData.city_id+'/'+allData.bed;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/city-bed/'+allData.city_id+'/'+allData.bed;
        }
        if(allData.category_id==="" && allData.city_id && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea==="" && allData.maxArea==="" && allData.bed==="" && allData.bath && allData.title==="")
        {
            //city-bath
            var api_url1 = window.location.href+'/../../api/properties/search-properties/city-bath/'+allData.city_id+'/'+allData.bath;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/city-bath/'+allData.city_id+'/'+allData.bath;
        }
        if(allData.category_id==="" && allData.city_id && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea==="" && allData.maxArea==="" && allData.bed && allData.bath && allData.title==="")
        {
            //city-bed-bath
            var api_url1 = window.location.href+'/../../api/properties/search-properties/city-bed-bath/'+allData.city_id+'/'+allData.bed+'/'+allData.bath;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/city-bed-bath/'+allData.city_id+'/'+allData.bed+'/'+allData.bath;
        }
        if(allData.category_id==="" && allData.city_id==="" && allData.minPrice && allData.maxPrice && allData.minArea==="" && allData.maxArea==="" && allData.bed && allData.bath==="" && allData.title==="")
        {
            //price-bed
            var api_url1 = window.location.href+'/../../api/properties/search-properties/price-bed/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.bed;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/price-bed/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.bed;
        }
        if(allData.category_id==="" && allData.city_id==="" && allData.minPrice && allData.maxPrice && allData.minArea==="" && allData.maxArea==="" && allData.bed==="" && allData.bath && allData.title==="")
        {
            //price-bath
            var api_url1 = window.location.href+'/../../api/properties/search-properties/price-bath/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.bath;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/price-bath/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.bath;
        }
        if(allData.category_id==="" && allData.city_id==="" && allData.minPrice && allData.maxPrice && allData.minArea==="" && allData.maxArea==="" && allData.bed && allData.bath && allData.title==="")
        {
            //price-bed-bath
            var api_url1 = window.location.href+'/../../api/properties/search-properties/price-bed-bath/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.bed+'/'+allData.bath;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/price-bed-bath/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.bed+'/'+allData.bath;
        }
        if(allData.category_id==="" && allData.city_id==="" && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea && allData.maxArea && allData.bed && allData.bath==="" && allData.title==="")
        {
            //area-bed
            var api_url1 = window.location.href+'/../../api/properties/search-properties/area-bed/'+allData.minArea+'/'+allData.maxArea+'/'+allData.bed;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/area-bed/'+allData.minArea+'/'+allData.maxArea+'/'+allData.bed;
        }
        if(allData.category_id==="" && allData.city_id==="" && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea && allData.maxArea && allData.bed==="" && allData.bath && allData.title==="")
        {
            //area-bath
            var api_url1 = window.location.href+'/../../api/properties/search-properties/area-bath/'+allData.minArea+'/'+allData.maxArea+'/'+allData.bath;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/area-bath/'+allData.minArea+'/'+allData.maxArea+'/'+allData.bath;
        }
        if(allData.category_id==="" && allData.city_id==="" && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea && allData.maxArea && allData.bed && allData.bath && allData.title==="")
        {
            //area-bed-bath
            var api_url1 = window.location.href+'/../../api/properties/search-properties/area-bed-bath/'+allData.minArea+'/'+allData.maxArea+'/'+allData.bed+'/'+allData.bath;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/area-bed-bath/'+allData.minArea+'/'+allData.maxArea+'/'+allData.bed+'/'+allData.bath;
        }
        if(allData.category_id && allData.city_id && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea==="" && allData.maxArea==="" && allData.bed && allData.bath==="" && allData.title==="")
        {
            //category-city-bed
            var api_url1 = window.location.href+'/../../api/properties/search-properties/category-city-bed/'+allData.category_id+'/'+allData.city_id+'/'+allData.bed;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/category-city-bed/'+allData.category_id+'/'+allData.city_id+'/'+allData.bed;
        }
        if(allData.category_id && allData.city_id && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea==="" && allData.maxArea==="" && allData.bed==="" && allData.bath && allData.title==="")
        {
            //category-city-bath
            var api_url1 = window.location.href+'/../../api/properties/search-properties/category-city-bath/'+allData.category_id+'/'+allData.city_id+'/'+allData.bath;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/category-city-bath/'+allData.category_id+'/'+allData.city_id+'/'+allData.bath;
        }
        if(allData.category_id && allData.city_id && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea==="" && allData.maxArea==="" && allData.bed && allData.bath && allData.title==="")
        {
            //category-city-bed-bath
            var api_url1 = window.location.href+'/../../api/properties/search-properties/category-city-bed-bath/'+allData.category_id+'/'+allData.city_id+'/'+allData.bed+'/'+allData.bath;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/category-city-bed-bath/'+allData.category_id+'/'+allData.city_id+'/'+allData.bed+'/'+allData.bath;
        }


        if(allData.category_id && allData.city_id && allData.minPrice && allData.maxPrice && allData.minArea==="" && allData.maxArea==="" && allData.bed && allData.bath==="" && allData.title==="")
        {
            //category-city-price-bed
            var api_url1 = window.location.href+'/../../api/properties/search-properties/category-city-price-bed/'+allData.category_id+'/'+allData.city_id+'/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.bed;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/category-city-price-bed/'+allData.category_id+'/'+allData.city_id+'/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.bed;
        }
        if(allData.category_id && allData.city_id && allData.minPrice && allData.maxPrice && allData.minArea==="" && allData.maxArea==="" && allData.bed==="" && allData.bath && allData.title==="")
        {
            //category-city-price-bath
            var api_url1 = window.location.href+'/../../api/properties/search-properties/category-city-price-bath/'+allData.category_id+'/'+allData.city_id+'/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.bath;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/category-city-price-bath/'+allData.category_id+'/'+allData.city_id+'/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.bath;
        }
        if(allData.category_id && allData.city_id && allData.minPrice && allData.maxPrice && allData.minArea==="" && allData.maxArea==="" && allData.bed && allData.bath && allData.title==="")
        {
            //category-city-price-bed-bath
            var api_url1 = window.location.href+'/../../api/properties/search-properties/category-city-price-bed-bath/'+allData.category_id+'/'+allData.city_id+'/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.bed+'/'+allData.bath;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/category-city-price-bed-bath/'+allData.category_id+'/'+allData.city_id+'/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.bed+'/'+allData.bath;
        }


        if(allData.category_id && allData.city_id && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea && allData.maxArea && allData.bed && allData.bath==="" && allData.title==="")
        {
            //category-city-area-bed
            var api_url1 = window.location.href+'/../../api/properties/search-properties/category-city-area-bed/'+allData.category_id+'/'+allData.city_id+'/'+allData.minArea+'/'+allData.maxArea+'/'+allData.bed;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/category-city-area-bed/'+allData.category_id+'/'+allData.city_id+'/'+allData.minArea+'/'+allData.maxArea+'/'+allData.bed;
        }
        if(allData.category_id && allData.city_id && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea && allData.maxArea && allData.bed==="" && allData.bath && allData.title==="")
        {
            //category-city-area-bath
            var api_url1 = window.location.href+'/../../api/properties/search-properties/category-city-area-bath/'+allData.category_id+'/'+allData.city_id+'/'+allData.minArea+'/'+allData.maxArea+'/'+allData.bath;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/category-city-area-bath/'+allData.category_id+'/'+allData.city_id+'/'+allData.minArea+'/'+allData.maxArea+'/'+allData.bath;
        }
        if(allData.category_id && allData.city_id && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea && allData.maxArea && allData.bed && allData.bath && allData.title==="")
        {
            //category-city-area-bed-bath
            var api_url1 = window.location.href+'/../../api/properties/search-properties/category-city-area-bed-bath/'+allData.category_id+'/'+allData.city_id+'/'+allData.minArea+'/'+allData.maxArea+'/'+allData.bed+'/'+allData.bath;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/category-city-area-bed-bath/'+allData.category_id+'/'+allData.city_id+'/'+allData.minArea+'/'+allData.maxArea+'/'+allData.bed+'/'+allData.bath;
        }
        if(allData.category_id && allData.city_id && allData.minPrice && allData.maxPrice && allData.minArea && allData.maxArea && allData.bed && allData.bath && allData.title==="")
        {
            //category-city-price-area-bed-bath
            var api_url1 = window.location.href+'/../../api/properties/search-properties/category-city-price-area-bed-bath/'+allData.category_id+'/'+allData.city_id+'/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.minArea+'/'+allData.maxArea+'/'+allData.bed+'/'+allData.bath;
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/category-city-price-area-bed-bath/'+allData.category_id+'/'+allData.city_id+'/'+allData.minPrice+'/'+allData.maxPrice+'/'+allData.minArea+'/'+allData.maxArea+'/'+allData.bed+'/'+allData.bath;
        }
        if(allData.category_id==="" && allData.city_id==="" && allData.minPrice==="" && allData.maxPrice==="" && allData.minArea==="" && allData.maxArea==="" && allData.bed==="" && allData.bath==="" && allData.title)
        {
            //category-city-price-area-bed-bath
            var api_url1 = window.location.href+'/../../api/properties/search-properties/title/'+allData.title
            var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/title/'+allData.title;
        }
        console.log(api_url);

        if (document.getElementById("map") !== null) {
            var mapOptions = {
                scrollWheelZoom: false
            }
            window.map = L.map('map', mapOptions);
            $('#scrollEnabling').hide();





            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: " &copy;  <a href='https://www.mapbox.com/about/maps/'>Mapbox</a> &copy;  <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a>",
                maxZoom: 10,
                id: 'mapbox.streets',
                accessToken: 'pk.eyJ1IjoidmFzdGVyYWQiLCJhIjoiY2p5cjd0NTc1MDdwaDNtbnVoOGwzNmo4aSJ9.BnYb645YABOY2G4yWAFRVw'
            }).addTo(map);
            markers = L.markerClusterGroup({
                spiderfyOnMaxZoom: true,
                showCoverageOnHover: false,
            });

            async function getData(){
                const response = await fetch(api_url);
                console.log(response);
                const locations = await response.json();

                for (var i = 0; i < locations.length; i++) {

                    var listeoIcon = L.divIcon({
                        iconAnchor: [20, 51],
                        popupAnchor: [0, -51],
                        className: 'listeo-marker-icon',
                        html: '<div class="marker-container">' +
                        '<div class="marker-card">' +
                        '<img src="'+"{{url('/')}}"+'/images/others/marker.png" alt="..."/>' +
                        '</div>' +
                        '</div>'
                    });
                    var popupOptions = {
                        'maxWidth': '270',
                        'className': 'leaflet-infoBox'
                    }
                    var markerArray = [];
                    marker = new L.marker([locations[i].lat, locations[i].lon], {
                        icon: listeoIcon,
                    }).bindPopup( '<div class="container map_container">' +
                        '<div class="row">' +
                        '<div class="col-md-12 px-0">' +
                        '<div class="marker-info" id="marker_info">' +
                        '<img src="'+"{{url('/')}}"+'/images/thumbnail/' + locations[i].thumbnail + '" alt="..."/>' +

                        '<div class = "marker_price trend-open">' +
                        '<p>' + '$' + locations[i].price +
                        '<span>month</span>' +
                        '</p>' +
                        '</div>' +
                        '<span class="featured_btn">' + locations[i].type + '</span>' +
                        '</div>' +
                        '<div class="marker-text">' +
                        '<h3 class="marker_title"><a href="properties/' + locations[i].id + '">' + locations[i].title + '</a></h3>' +
                        '<ul class ="map_property_info">' +
                        '<li>' + locations[i].property_details.bed + '<span>Bed</span>' +
                        '</li>' +
                        '<li>' + locations[i].property_details.bath + '<span>Bath</span>' +
                        '</li>' +
                        '<li>' + locations[i].property_details.room_size + '<span>Sq Ft</span>' +
                        '</li>' +
                        '<li>' + locations[i].property_details.garage + '<span>Garage</span>' +
                        '</li>' +
                        '</ul>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>', popupOptions);
                    marker.on('click', function (e) {});
                    map.on('popupopen', function (e) {
                        L.DomUtil.addClass(e.popup._source._icon, 'clicked');
                    }).on('popupclose', function (e) {
                        if (e.popup) {
                            L.DomUtil.removeClass(e.popup._source._icon, 'clicked');
                        }
                    });
                    markers.addLayer(marker);
                }
                map.addLayer(markers);
                markerArray.push(markers);
                if (markerArray.length > 0) {
                    map.fitBounds(L.featureGroup(markerArray).getBounds().pad(0.2));
                }
                map.removeControl(map.zoomControl);
                var zoomOptions = {
                    zoomInText: '+',
                    zoomOutText: '-',
                };
                var zoom = L.control.zoom(zoomOptions);
                zoom.addTo(map);
            }

            getData();

        }
    });

</script>

{{-- <script>
    $('#place-event').on('keyup',function(){
        var search = $(this).val();
        $.ajax({
            method:'post',
            url: '{{route('search.properties')}}',
            data: {search:search,"_token":"{{csrf_token()}}"},
            dataType:'html',
            success:function(response){
                $('.get-properties').html(response);
            }
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
</script> --}}
<script>
    $(document).on('change','#propType',function(){
        var propertyType = $(this).val();
        // alert(propertyType);
        if(propertyType == 1)
        {
            $("#bed").show();
            $("#bath").show();
        }else{
            $("#bed").hide();
            $("#bath").hide();
        }
    });

    $(function() {
    var minPrice = 0;
    var maxPrice = 20000;
    var minArea = 0;
    var maxArea = 500;
    var currentMinArea = $("#minAreaSize").val();;
    var currentMaxArea = $("#maxAreaSize").val();;
    var currentMinValue = $("#minPropPrice").val();
    var currentMaxValue = $("#maxPropPrice").val();

    $( "#slider-range" ).slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [ currentMinValue, currentMaxValue ],
        slide: function( event, ui ) {
            $( "#amount" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
            $("#min").val(ui.values[ 0 ]);
            $("#max").val(ui.values[ 1 ]);
            currentMinValue = ui.values[ 0 ];
            currentMaxValue = ui.values[ 1 ];
            // alert(currentMinValue,currentMaxValue);
        },
        stop: function( event, ui ) {
            currentMinValue = ui.values[ 0 ];
            currentMaxValue = ui.values[ 1 ];

            // console.log(currentMaxValue,currentMinValue);
        }
    });

    $( "#slider-range_area" ).slider({
        range: true,
        min: minArea,
        max: maxArea,
        values: [ currentMinArea, currentMaxArea ],
        slide: function( event, ui ) {
            $( "#area" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
            $("#minArea").val(ui.values[ 0 ]);
            $("#maxArea").val(ui.values[ 1 ]);
            currentMinArea = ui.values[ 0 ];
            currentMaxArea = ui.values[ 1 ];
            // alert(currentMinValue,currentMaxValue);
        },
        stop: function( event, ui ) {
            currentMinArea = ui.values[ 0 ];
            currentMaxArea = ui.values[ 1 ];
        }
    });

    $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) +
"-" + $( "#slider-range" ).slider( "values", 1 ) );


   $( "#area" ).val($( "#slider-range_area" ).slider( "values", 0 ) +
"-" + $( "#slider-range_area" ).slider( "values", 1 ) );

});

</script>
@endpush
