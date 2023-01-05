@extends('frontend.main')
@section('title','SarchHolm-Properties')
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
        <!--Listing section starts-->
        <div class="filter-wrapper style1 mt-115 half-map">
            <div class="container-fluid">
                <div class="row">
                    <div class="explore__map-side v2">
                         <!--Leaflet Map starts-->
                    <div id="map-container" class="fullwidth-home-map">
                        <div id="map" data-map-scroll="false">
                            <!-- map goes here -->
                        </div>
                    </div>
                    <!--Leaflet Map ends-->
                    </div>
                    <div class="col-xl-7 offset-xl-5 col-lg-12">
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
                                        <p>Showing <span> {{($properties->currentPage()-1)* $properties->perPage()+($properties->total() ? 1:0)}} to {{($properties->currentPage()-1)*$properties->perPage()+count($properties)}}  of  {{$properties->total()}}</span>  Listings</p>
                                    </div>
                                </div>
                            </div>

                                @include('frontend.includes.filter-form')

                               <div class="item-wrapper pt-20">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade  property-grid" id="grid-view">
                                        <div class="row">
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
                                        </div>
                                    </div>
                                    <div class="tab-pane fade  show active  property-list" id="list-view">
                                        @foreach($properties as $property)
                                        <div class="single-property-box">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="property-item">
                                                        <a class="property-img" href="{{route('front.property',['property'=>$property->id])}}">
                                                            @if(!env('USER_VERIFIED'))
                                                            <img loading="lazy" src="{{'images/thumbnail/property_1.jpg'}}" alt="" width="750" height="500">
                                                            @else
                                                            <img loading="lazy" src="{!! $property->photo() !!}" alt="">
                                                            @endif
                                                        </a>
                                                        <ul class="feature_text">
                                                            @if($property->is_featured == 1)<li class="feature_cb"><span> Featured</span></li>@endif
                                                            @if($property->type == 'sale')<li class="feature_or"><span>For Sale</span></li>@endif
                                                            @if($property->type == 'rent')<li class="feature_or"><span>For Rent</span></li>@endif
                                                        </ul>
                                                        <div class="property-author-wrap">
                                                            <a href="{{route('agents.show',$property->user_id)}}" class="property-author">
                                                                @if(!env('USER_VERIFIED'))
                                                                <img loading="lazy" src="{{'images/users/agent_min_1.jpg'}}" alt="" width="750" height="500">
                                                                @else
                                                                <img loading="lazy" src="{!! $property->user->photo() !!}" alt="">
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
                                                        <h4><a href="{{route('front.property',['property'=>$property->id])}}">{{$property->propertyTranslation->title ?? $property->propertyTranslationEnglish->title ?? null}}</a></h4>
                                                        <div class="property-location no-pad-lr">
                                                            <i class="las la-map-marker-alt"></i>
                                                            <p>{{$property->country->countryTranslation->name ?? $property->country->countryTranslationEnglish->name ?? null}} , {{$property->state->stateTranslation->name ?? $property->state->stateTranslationEnglish->name ?? null}}, {{$property->city->cityTranslation->name ?? $property->city->cityTranslationEnglish->name ?? null}}</p>
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
                                                            @if($property->type == 'sale') <p><span class="per_sale">starts from</span>${{$property->price}}</p> @endif
                                                            @if($property->type == 'rent') <p>${{$property->price}}<span class="per_month">month</span></p> @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                    <!--pagination starts-->
                                    {{ $properties->links('vendor.pagination.custom') }}
                                    <!--pagination ends-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Listing section ends-->
        <div class="load-overlay"></div>
@endsection
@push('script')
<!-- Leaflet js -->
    <script src="{{asset('js/leaflet.min.js')}}"></script>
    <!-- Leaflet Maps Scripts -->
    <script src="{{asset('js/leaflet-markercluster.min.js')}}"></script>
    <script src="{{asset('js/leaflet-gesture-handling.min.js')}}"></script>
    <script src="{{asset('js/leaflet-custom.js')}}"></script>
    <script src="{{asset('js/leaflet-autocomplete.js')}}"></script>
    <script src="{{asset('js/leaflet-control-geocoder.js')}}"></script>


    {{-- <script>
        $('#propType').on('change',function(){
            var category = $(this).val();
            var city = $("#city_id").val();
            var minPrice = $("#minPropPrice").val();
            var maxPrice = $("#maxPropPrice").val();
            var minAreaSize = $("#minAreaSize").val();
            var maxAreaSize = $("#maxAreaSize").val();
            a(category);
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
