@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="inbox-wrap">
                        <div class="act-title">
                            <h5>Inbox</h5>
                        </div>
                        <div class="au-inbox-wrap js-inbox-wrap">
                            <div class="au-message js-list-load">
                                <p>{{$notification->data['name']}}</p>
                                <p>{{$notification->data['phone']}}</p>
                                <p>{{$notification->data['email']}}</p>
                                <p>{{$notification->data['message']}}</p>
                                <br>
                                <a href="{{route('admin.messages.index')}}" class="btn v3">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
