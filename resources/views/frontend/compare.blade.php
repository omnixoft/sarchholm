@extends('frontend.main')
@section('content')
    <!--Breadcrumb section starts-->
    <div class="breadcrumb-section bg-h" style="background-image: url(images/breadcrumb/breadcrumb_1.jpg)">
        <div class="overlay op-5"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="breadcrumb-menu">
                        <h2>Compare</h2>
                        <span><a href="home-v1.html">Home</a></span>
                        <span>Compare</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb section ends-->
    <!--FAQ Section starts-->
    <div class="compare-section py-110 ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-content table-responsive">
                        <table class="table compare-table">
                            <tbody>
                            <tr>
                                <th class="compare_title">Property Info</th>
                                <td>
                                    <div class="remove">
                                        <a href="#">
                                            <i class="lnr lnr-cross"></i>
                                        </a>
                                    </div>
                                    <a href="product-details.html" class="d-block">
                                        <div class="image-wrap">
                                            <img loading="lazy" src="images/property/property_1.jpg" alt="...">
                                        </div>
                                        <h4 class="pd-name mt-15">Villa on Hartford</h4>
                                    </a>
                                    <div class="trend-open">
                                        <p><span class="per_sale">starts from</span>$25000</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="remove">
                                        <a href="#">
                                            <i class="lnr lnr-cross"></i>
                                        </a>
                                    </div>
                                    <a href="product-details.html" class="d-block">
                                        <div class="image-wrap">
                                            <img loading="lazy" src="images/property/property_7.jpg" alt="...">
                                        </div>
                                        <h4 class="pd-name mt-15">Villa on Sunbury</h4>
                                    </a>
                                    <div class="trend-open">
                                        <p>$9200<span class="per_month">month</span> </p>
                                    </div>
                                </td>
                                <td>
                                    <div class="remove">
                                        <a href="#">
                                            <i class="lnr lnr-cross"></i>
                                        </a>
                                    </div>
                                    <a href="product-details.html" class="d-block">
                                        <div class="image-wrap">
                                            <img loading="lazy" src="images/property/property_5.jpg" alt="...">
                                        </div>
                                        <h4 class="pd-name mt-15">Villa in Birmingham</h4>
                                    </a>
                                    <div class="trend-open">
                                        <p><span class="per_sale">starts from</span>$21000</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="bg-cb">
                                <th>Area</th>
                                <td>
                                            <span class="product-price-wrapper">
                                                <span class="money">2142 sqft</span>
                                            </span>
                                </td>
                                <td>
                                            <span class="product-price-wrapper">
                                                <span class="money">2048 sqft</span>
                                            </span>
                                </td>
                                <td>
                                            <span class="product-price-wrapper">
                                                <span class="money">3000 sqft</span>
                                            </span>
                                </td>
                            </tr>
                            <tr class="bg-white">
                                <th>Rooms</th>
                                <td>8</td>
                                <td>9</td>
                                <td>9</td>
                            </tr>
                            <tr class="bg-cb">
                                <th>Bedrooms</th>
                                <td>4</td>
                                <td>5</td>
                                <td>5</td>

                            </tr>
                            <tr class="bg-white">
                                <th>Bathrooms</th>
                                <td>3</td>
                                <td>4</td>
                                <td>4</td>
                            </tr>
                            <tr class="bg-cb">
                                <th>Garage</th>
                                <td>1</td>
                                <td>2</td>
                                <td>1</td>
                            </tr>
                            <tr class="bg-white">
                                <th>Year of build</th>
                                <td>2017</td>
                                <td>2018</td>
                                <td>2017</td>
                            </tr>
                            <tr class="bg-cb">
                                <th>Air Conditioning</th>
                                <td class="check"><i class="las la-check"></i></td>
                                <td class="check"><i class="las la-check"></i></td>
                                <td class="check"><i class="las la-check"></i></td>
                            </tr>
                            <tr class="bg-white">
                                <th>Laundry Room</th>
                                <td class="check"><i class="las la-check"></i></td>
                                <td class="uncheck"><i class="las la-times"></i></td>
                                <td class="check"><i class="las la-check"></i></td>

                            </tr>
                            <tr class="bg-cb">
                                <th>Heating</th>
                                <td class="uncheck"><i class="las la-times"></i></td>
                                <td class="check"><i class="las la-check"></i></td>
                                <td class="check"><i class="las la-check"></i></td>

                            </tr>
                            <tr class="bg-white">
                                <th>Swimming Pool</th>
                                <td class="check"><i class="las la-check"></i></td>
                                <td class="uncheck"><i class="las la-times"></i></td>
                                <td class="check"><i class="las la-check"></i></td>

                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--FAQ Section ends-->
@endsection
@push('script')
    <!--google maps-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_8C7p0Ws2gUu7wo0b6pK9Qu7LuzX2iWY&amp;libraries=places&amp;callback=initAutocomplete"></script>
@endpush