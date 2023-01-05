@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="recent-activity my-listing">
                        <div class="act-title">
                            <h5>Favourite Property</h5>
                        </div>
                        <div class="db-booking-wrap favourite table-content table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Property</th>
                                    <th scope="col">Added date</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="bg-white">
                                    <th scope="row">
                                        <div class="most-viewed-item">
                                            <div class="most-viewed-img">
                                                <a href="#"><img loading="lazy" src="images/property/property_6.jpg" alt="..."></a>
                                                <ul class="feature_text">
                                                    <li class="feature_or"><span>For Sale</span></li>
                                                </ul>
                                            </div>
                                            <div class="most-viewed-detail">
                                                <h3><a href="single-listing-one.html">Apartment in Cecil Lake</a></h3>
                                                <p class="list-address"><i class="las la-map-marker-alt"></i>131 midlas , Cecil Lake, BC</p>
                                                <div class="trend-open">
                                                    <p><span class="per_sale">starts from</span>$9000</p>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                    <td>19/9/19</td>
                                    <td>
                                        <div class="listing-button">
                                            <a href="#" class="btn v4">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="most-viewed-item">
                                            <div class="most-viewed-img">
                                                <a href="#"><img loading="lazy" src="images/property/property_2.jpg" alt="..."></a>
                                                <ul class="feature_text">
                                                    <li class="feature_or"><span>For Rent</span></li>
                                                </ul>
                                            </div>
                                            <div class="most-viewed-detail">
                                                <h3><a href="single-listing-one.html">Bay view Apartment</a></h3>
                                                <p class="list-address"><i class="las la-map-marker-alt"></i>1797 Hillcrest Lane, Boulevard, CA</p>
                                                <div class="trend-open">
                                                    <p>$4000<span class="per_month">month</span></p>
                                                </div>
                                            </div>

                                        </div>
                                    </th>
                                    <td>6/9/19</td>
                                    <td>
                                        <div class="listing-button">
                                            <a href="#" class="btn v4">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="bg-white">
                                    <th scope="row">
                                        <div class="most-viewed-item">
                                            <div class="most-viewed-img">
                                                <a href="#"><img loading="lazy" src="images/property/property_1.jpg" alt="..."></a>
                                                <ul class="feature_text">
                                                    <li class="feature_or"><span>For Sale</span></li>
                                                </ul>
                                            </div>
                                            <div class="most-viewed-detail">
                                                <h3><a href="single-listing-one.html">Villa on Hartford</a></h3>
                                                <p class="list-address"><i class="las la-map-marker-alt"></i>2854 Meadow View Drive, Hartford, USA</p>
                                                <div class="trend-open">
                                                    <p><span class="per_sale">starts from</span>$25000</p>
                                                </div>
                                            </div>

                                        </div>
                                    </th>
                                    <td>17/8/19</td>
                                    <td>
                                        <div class="listing-button">
                                            <a href="#" class="btn v4">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="most-viewed-item">
                                            <div class="most-viewed-img">
                                                <a href="#"><img loading="lazy" src="images/property/property_3.jpg" alt="..."></a>
                                                <ul class="feature_text">
                                                    <li class="feature_or"><span>For Rent</span></li>
                                                </ul>
                                            </div>
                                            <div class="most-viewed-detail">
                                                <h3><a href="single-listing-one.html">Family home in Glasgow</a></h3>
                                                <p class="list-address"><i class="las la-map-marker-alt"></i>60 High St, Glasgow, London</p>
                                                <div class="trend-open">
                                                    <p>$25000<span class="per_month">month</span></p>
                                                </div>
                                            </div>

                                        </div>
                                    </th>
                                    <td>4/8/19</td>
                                    <td>
                                        <div class="listing-button">
                                            <a href="#" class="btn v4">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection