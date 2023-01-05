@extends('frontend.main')
@section('content')
    <!--Breadcrumb section starts-->
    <div class="breadcrumb-section bg-h" style="background-image: url(images/breadcrumb/breadcrumb_1.jpg)">
        <div class="overlay op-5"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="breadcrumb-menu">
                        <h2>{{trans('file.pricing_table')}}</h2>
                        <span><a href="#">{{trans('file.home')}}</a></span>
                        <span>{{trans('file.pricing_table')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb section ends-->
    <!--Pricing table Section starts-->
    <div class="list-details-section py-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center">
                </div>
                <div class="col-md-12">
                    <div class="tab-content mar-top-30 mar-bot-20" id="lionTabContent">
                        <div class="tab-pane fade active show" id="monthly-4">
                            <div class="row">
                                @foreach($packages as $package)
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                                    <div class="pricing-table">
                                        @if($package->name == 'Standard')
                                        <div class="listing-badge">
                                            <span class="featured">Featured</span>
                                        </div>
                                        @endif
                                        <h3 class="title">{{isset($package->packageTranslation->name) ? $package->packageTranslation->name : $package->packageTranslationEnglish->name}}</h3>
                                        <div class="price-value">
                                            <div class="price-num">
                                                <div class="price-num-item"><span class="mouth-cont"><span class="curen">$</span>{{$package->price}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pricing-content">
                                            <li><span>{{$package->listing}}</span> {{trans('file.property_listing')}}</li>
                                            <li><span>{{$package->validity}}</span> {{trans('file.days_availability')}}</li>
                                            <li><span>{{$package->featured}}</span> {{trans('file.featured_property')}}</li>
                                        </ul>
                                        <a href="#" class="btn v3">{{trans('file.select_plan')}}</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Pricing table Section ends-->
@endsection