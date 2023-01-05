@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="inbox-wrap">
                        <div class="act-title">
                            <h5>Booking Details</h5>
                        </div>
                        <div class="au-inbox-wrap js-inbox-wrap">
                            <div class="au-message js-list-load">
                                <p><strong>Name: </strong>{{$notification->data['name']}}</p>
                                <p><strong>Phone: </strong>{{$notification->data['phone']}}</p>
                                <p><strong>Email: </strong>{{$notification->data['email']}}</p>
                                <p><strong>Message: </strong>{{$notification->data['message']}}</p>
                                <br>
                                <a href="{{route('admin.bookings.index')}}" class="btn v3">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
