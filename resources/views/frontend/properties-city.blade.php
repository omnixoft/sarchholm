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
                        </div>

                        <form class="hero__form v1 filter listing-filter pt-30" action="{{route('search.property')}}" method="GET">
                            @csrf
                            <input type="hidden" id="min" name="minPrice">
                            <input type="hidden" id="max" name="maxPrice">
                            <input type="hidden" id="maxPropPrice" value="{{$maxPrice}}">
                            <input type="hidden" id="minPropPrice" value="{{$minPrice}}">

                            <input type="hidden" id="minArea" name="minArea">
                            <input type="hidden" id="maxArea" name="maxArea">
                            <input type="hidden" id="minAreaSize" value="{{$minArea}}">
                            <input type="hidden" id="maxAreaSize" value="{{$maxArea}}">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 py-3 pr-0">

                                    <select name="category_id" class="hero__form-input  form-control custom-select  mb-20" id="propType">
                                            <option value="">{{trans('file.property_type')}}</option>
                                        @foreach($categories as $category)

                                            <option value="{{$category->id}}">{{$category->categoryTranslation->name ?? $category->categoryTranslationEnglish->name ?? null}}</option>

                                        @endforeach

                                    </select>

                                </div>

                                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-12 py-3 pr-0">

                                    <div class="input-search autocomplete">

                                        <input type="text" name="title" id="city_name" placeholder="{{trans('file.search')}}">
                                        <div id="cityList">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 py-3">

                                    <div class="submit_btn">

                                        <button class="btn v3 mr-3" type="submit"><i class="las la-search"></i></button>

                                    </div>

                                    <div class="dropdown-filter"><i class="las la-sliders-h"></i></div>

                                </div>
                                <div class="explore__form-checkbox-list full-filter">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 mb-15 pr-0">
                                            <select name="city_id" class="hero__form-input  form-control custom-select" id="state">
                                                <option value="">{{ trans('file.select_city') }}</option>
                                                @foreach($cit as $cit)
                                                    <option value="{{$cit->id}}">{{$cit->cityTranslation->name ?? $cit->cityTranslationEnglish->name ?? null}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-6 mb-15 pr-0" id="bed">
                                            <select class="hero__form-input  form-control custom-select  mb-20" name="bed">

                                                <option value="">Bed</option>

                                                <option value="1">1</option>

                                                <option value="2">2</option>

                                                <option value="3">3</option>

                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>

                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-6 mb-15" id="bath">
                                            <select class="hero__form-input  form-control custom-select  mb-20" name="bath">

                                                <option value="">Bath</option>

                                                <option value="1">1</option>

                                                <option value="2">2</option>

                                                <option value="3">3</option>

                                                <option value="4">4</option>

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="filter-sub-area style1">
                                                <div class="filter-title mb-10">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Price: </span>
                                                        </div>
                                                        <input type="text" id="amount" class="form-control">

                                                    </div>
                                                </div>
                                                <div id="slider-range" class="price-range mb-30">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="filter-sub-area style1">
                                                <div class="filter-title  mb-10">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Area : </span>
                                                        </div>
                                                        <input type="text" id="area" class="form-control">

                                                    </div>
                                                </div>
                                                <div id="slider-range_area" class="price-range mb-30">
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </form>


                        <div class="item-wrapper pt-20">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade  property-grid" id="grid-view">
                                    <div class="row">
                                        <input type="hidden" value="{{$city->id}}" id="cityName">
                                        @foreach($city->properties as $property)

                                            <div class="col-md-6 col-sm-12">
                                                <div class="single-property-box">
                                                    <div class="property-item">
                                                        <a class="property-img" href="{{route('front.property',['property'=>$property->id])}}">
                                                            @if(file_exists( public_path() . '/images/thumbnail/'.$property->thumbnail))
                                                                <img loading="lazy" src="{{ URL::asset('/images/thumbnail/'.$property->thumbnail) }}" alt="">
                                                            @else
                                                                <img loading="lazy" src="{{asset('/images/property/property_1.jpg')}}" alt="#">
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
                                <div class="tab-pane fade show active  property-list get-properties" id="list-view">
                                    @foreach($city->properties as $property)
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
                                </div>
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
<script src="{{asset('js/leaflet-gesture-handling.min.js')}}"></script>
<script>
    $(document).ready(function () {
        var cityId = $("#cityName").val();
        const api_url = window.location.href+'/../../../api/properties/search-properties/cities/'+cityId;
        //var api_url1 = window.location.href+'/../../api/properties/search-properties/'+allData.category_id;
        //var api_url = api_url1.substring(0, api_url1.indexOf('?'))+'/../api/properties/search-properties/'+allData.category_id;


        if (document.getElementById("map") !== null) {
            var mapOptions = {
                scrollWheelZoom: false
            }
            window.map = L.map('map', mapOptions);
            $('#scrollEnabling').hide();



            function locationData(locationURL, locationImg, locationTitle, locationAddress, locationRating, location_bed, location_bath, location_garage, location_area) {
                return ('' +
                    '<div class="container map_container">' +
                    '<div class="row">' +
                    '<div class="col-md-12 px-0">' +
                    '<div class="marker-info" id="marker_info">' +
                    '<img src="' + locationImg + '" alt="..."/>' +

                    '<div class = "marker_price trend-open">' +
                    '<p>' + '$' + locationAddress +
                    '<span>month</span>' +
                    '</p>' +
                    '</div>' +
                    '<span class="featured_btn">' + locationRating + '</span>' +
                    '</div>' +
                    '<div class="marker-text">' +
                    '<h3 class="marker_title"><a href="' + locationURL + '">' + locationTitle + '</a></h3>' +
                    '<ul class ="map_property_info">' +
                    '<li>' + location_bed + '<span>Bed</span>' +
                    '</li>' +
                    '<li>' + location_bath + '<span>Bath</span>' +
                    '</li>' +
                    '<li>' + location_area + '<span>Sq Ft</span>' +
                    '</li>' +
                    '<li>' + location_garage + '<span>Garage</span>' +
                    '</li>' +
                    '</ul>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>'

                )
            }

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
<script src="{{asset('js/leaflet-autocomplete.js')}}"></script>
<script src="{{asset('js/leaflet-control-geocoder.js')}}"></script>

<script>
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
</script>
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

<script>
    $(document).ready(function(){

     $('#city_name').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
             var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ route('autocomplete.fetch') }}",
              method:"POST",
              data:{query:query, _token:_token},
              success:function(data){
               $('#cityList').fadeIn();
                        $('#cityList').html(data);
              }
             });
            }
        });

        $(document).on('click', 'li', function(){
            var text = $(this).text();
            var city = text.substring(0, text.indexOf(','));

            $('#city_name').val(city);
            $('#cityList').fadeOut();
        });

    });
    </script>
@endpush
