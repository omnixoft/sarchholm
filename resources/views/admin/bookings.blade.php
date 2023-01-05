@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="dash-bookings">
                        <div class="act-title">
                            <h5>Bookings</h5>
                        </div>
                        <div class="db-booking-wrap table-content table-responsive">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Date/Time</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Property</th>
                                    <th scope="col">User Info</th>
                                    <th scope="col">Exception</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="bg-white">
                                    <th scope="row">#203</th>
                                    <td>21/10/19</td>
                                    <td>Sara conor</td>
                                    <td>
                                        <div class="property-title-box">
                                            <h4><a href="single-listing-one.html">Family home in Glasgow</a></h4>
                                            <div class="property-location">
                                                <i class="las la-map-marker-alt"></i>
                                                <p>60 High St, Glasgow, London</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <ul class="list">
                                            <li>
                                                <div class="contact-info">
                                                    <div class="text"><a href="tel:44078767595">+44 078 767 595</a></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="contact-info">
                                                    <div class="text"><a href="#">sarah@mail.com</a></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <div class="listing-button">
                                            <a href="#" class="btn v3">Cancel</a>
                                            <a href="#" class="btn v4">Approve</a>
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