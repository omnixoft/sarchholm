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
    <!--Listing filter starts-->
    <div class="filter-wrapper style1 section-padding" style="margin-top: 30px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row pt-60   align-items-center">
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
                        <div class="col-lg-4 col-sm-7 col-7">
                            <select class="listing-input hero__form-input  form-control custom-select">
                                <option>Sort by Newest</option>
                                <option>Sort by Oldest</option>
                                <option>Sort by Featured</option>
                                <option>Sort by Price(Low to High)</option>
                                <option>Sort by Price(Low to High)</option>
                            </select>
                        </div>
                        <div class="col-lg-5 col-sm-12">
                            <div class="item-element res-box  text-right sm-left">
                                <p>Showing <span> {{($properties->currentPage()-1)* $properties->perPage()+($properties->total() ? 1:0)}} to {{($properties->currentPage()-1)*$properties->perPage()+count($properties)}}  of  {{$properties->total()}}</span>  Listings</p>
                            </div>
                        </div>
                    </div>
                    <div class="item-wrapper pt-40   ">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane  fade property-grid" id="grid-view">
                                 <div class="row">
                                    @foreach ($properties as $property )
                                        <div class="col-xl-4 col-md-6 col-sm-12">
                                            <div class="single-property-box">
                                                <div class="property-item">
                                                    <a class="property-img" href="{{route('front.property',['property'=>$property->id])}}">
                                                        @if(file_exists( public_path() . '/images/thumbnail/'.$property->thumbnail))
                                                            <img loading="lazy" src="{{ URL::asset('images/thumbnail/'.$property->thumbnail) }}" alt="">
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
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="tab-pane  show active fade property-list fullwidth" id="list-view">
                                @foreach ($properties as $property)
                                <div class="single-property-box">
                                    <div class="row">
                                        <div class="col-xl-5 col-lg-4 col-md-12">
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
                                        <div class="col-xl-4 col-lg-5 col-md-12">
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
                            <!--pagination starts-->
                            {{ $properties->links('vendor.pagination.custom') }}
                            <!--pagination ends-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Listing filter ends-->
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
        const api_url = window.location.href+'/../../api/properties';


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
                const locations = await response.json();
                for (var i = 0; i < locations.length; i++) {
                    var listeoIcon = L.divIcon({
                        iconAnchor: [20, 51],
                        popupAnchor: [0, -51],
                        className: 'listeo-marker-icon',
                        html: '<div class="marker-container">' +
                        '<div class="marker-card">' +
                        '<img src="images/others/marker.png" alt="..."/>' +
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
                        '<img src="storage/thumbnail/' + locations[i].thumbnail + '" alt="..."/>' +

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
@endpush
