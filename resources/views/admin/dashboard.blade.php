@extends('admin.main')
@section('content')
<!-- Dashboard Statistics starts-->
<div class="statistic-wrap mt-60">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6 col-12">
                <div class="statistic__item item--red">
                    <h2 class="counter-value">{{$propertyCount}}</h2>
                    <span class="desc">Published Property</span>
                    <div class="icon">
                        <img loading="lazy" src="{{asset('images/dashboard/home.png')}}" alt="...">
                    </div>
                </div>
            </div>
            @if (auth()->user()->type == 'admin')
            <div class="col-xl-3 col-md-6 col-12">
                <div class="statistic__item item--blue">
                    <h2 class="counter-value">{{$newUsers[0]['sessions']}}</h2>
                    <span class="desc">{{$newUsers[0]['type']}} (Last 7 days)</span>
                    <div class="icon">
                        <img loading="lazy" src="{{asset('images/dashboard/review.png')}}" alt="...">
                    </div>
                </div>
            </div>
            @endif

            @if (auth()->user()->type == 'admin')
            <div class="col-xl-3 col-md-6 col-12">
                <div class="statistic__item item--orange">
                    <h2 class="counter-value">{{$result->sum('pageViews')}}</h2>
                    <span class="desc">Total Views (Last 7 days)</span>
                    <div class="icon">
                        <img loading="lazy" src="{{asset('images/dashboard/bar-chart.png')}}" alt="...">
                    </div>
                </div>
            </div>
            @endif

            <div class="col-xl-3 col-md-6 col-12">
                <div class="statistic__item item--green">
                    <h2 class="counter-value">{{$newsCount}}</h2>
                    <span class="desc">Published News</span>
                    <div class="icon">
                        <img loading="lazy" src="{{asset('images/dashboard/like.png')}}" alt="...">
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 col-12">
                <div class="statistic__item item--green">
                    <h2 class="counter-value">{{count($projects)}}</h2>
                    <span class="desc">Projects</span>
                    <div class="icon">
                        <img loading="lazy" src="{{asset('images/dashboard/like.png')}}" alt="...">
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 col-12">
                <div class="statistic__item item--green">
                    <h2 class="counter-value">{{count($units)}}</h2>
                    <span class="desc"> Units</span>
                    <div class="icon">
                        <img loading="lazy" src="{{asset('images/dashboard/like.png')}}" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashboard Statistics ends-->
<!--Dashboard content starts-->
@if (auth()->user()->type == 'admin')
<div class="dash-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7 col-lg-12">
                <div class="act-title">
                    <h5>Property view Statistics</h5>
                </div>

                    <canvas id="canvas" height="250"></canvas>

            </div>
            <div class="col-xl-5 col-lg-12">
                <div class="popular-listing">
                    <div class="act-title">
                        <h5>Recent Properties</h5>
                    </div>
                    <div class="viewd-item-wrap">
                        @foreach($properties->take(3) as $recentlyAddedProperty)
                        <div class="most-viewed-item">
                            <div class="most-viewed-img">
                                <a href="{{route('front.property',['property'=>$recentlyAddedProperty->id])}}">
                                    @if(file_exists( public_path() . '/images/thumbnail/'.$recentlyAddedProperty->thumbnail))
                                        <img loading="lazy" src="{{ URL::asset('/images/thumbnail/'.$recentlyAddedProperty->thumbnail) }}" alt="">
                                    @else
                                        <img loading="lazy" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                    @endif
                                </a>
                                <ul class="feature_text v2">
                                    <li class="feature_or"><span>{{$recentlyAddedProperty->type == 'sale' ? 'For Sale' : 'For Rent'}}</span></li>
                                </ul>
                            </div>
                            <div class="most-viewed-detail">
                                <h3><a href="{{route('front.property',['property'=>$recentlyAddedProperty->id])}}">{{$recentlyAddedProperty->propertyTranslation->title ?? $recentlyAddedProperty->propertyTranslationEnglish->title  ?? null }}</a></h3>
                                <p class="list-address"><i class="las la-map-marker-alt"></i>{{$recentlyAddedProperty->state->stateTranslation->name ?? $recentlyAddedProperty->state->stateTranslationEnglish->name  ?? null }}, {{$recentlyAddedProperty->city->cityTranslation->name ?? $recentlyAddedProperty->city->cityTranslationEnglish->name  ?? null }}</p>
                                <div class="trend-open">
                                    @if($recentlyAddedProperty->type == 'sale') <p><span class="per_sale">starts from</span>${{$recentlyAddedProperty->price}}</p> @endif
                                    @if($recentlyAddedProperty->type == 'rent') <p>${{$recentlyAddedProperty->price}}<span class="per_month">month</span></p> @endif
                                </div>
                                <div class="ratings">
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star-half"></i>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="act-title">
                    <h5>Top Browser</h5>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>BROWSER</th>
                            <th>SESSION</th>
                        </tr>

                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($browsers as $key=>$browser)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$browser['browser']}}</td>
                            <td>{{$browser['sessions']}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="col-xl-6 col-lg-12">
                <div class="act-title">
                    <h5>Top Most Visited Pages</h5>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>URL</th>
                            <th>VIEWS</th>
                        </tr>

                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($topVisitedPages as $key=>$topVisitedPage)
                        <tr>
                            <td>{{++$i}}</td>
                            <td><a href="{{$topVisitedPage['url']}}">{{$topVisitedPage['pageTitle']}}</a></td>
                            <td>{{$topVisitedPage['pageViews']}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="act-title">
                    <h5>Top Referrers</h5>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>URL</th>
                            <th>VIEWS</th>
                        </tr>

                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($topReferrers as $topReferrer)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$topReferrer['url']}}</td>
                            <td>{{$topReferrer['pageViews']}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif

<!--Dashboard content ends-->
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
<script>
    var url = "{{route('admin.dashboard.chart')}}";
    var Months = new Array();
    var Labels = new Array();
    var PageViews = new Array();
    var visitors = new Array();
    (function($){
        "use strict";
        $.get(url, function(response){
            response.forEach(function(data){
                const date = new Date(data.date);  // 2009-11-10
                const d = date.getDate();
                const m = date.getMonth()+1;
                const y = date.getFullYear();
                const y1 = new String(y);
                const month = date.toLocaleString('default', { month: 'long' });
                Months.push(d+'-'+m+'-'+y1[2]+y1[3]);
                Labels.push(data.pageTitle);
                PageViews.push(data.pageViews);
                visitors.push(data.visitors);
            });
            var ctx = document.getElementById("canvas").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels:Months,
                    datasets: [
                        {
                        label: 'Page Views',
                        borderColor: '#2f5ec4',
                        data: PageViews,
                        borderWidth: 1
                        },
                        {
                        label: 'Visitors',
                        borderColor: '#FD777B',
                        backgroundColor: '#FD777B50',
                        data: visitors,
                        borderWidth: 1
                        }

                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        });
    })(jQuery);
</script>
@endpush
