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
                                <div class="au-message-list">
                                    @foreach($notifications as $notification)
                                    <a href="#">
                                        <div class="au-message__item unread">
                                            <div class="au-message__item-inner">
                                                <div class="au-message__item-text">
                                                    <div class="avatar-wrap">
                                                        <div class="avatar">
                                                            <img loading="lazy" src="{{asset('images/agents/agent.jpg')}}" alt="John Smith">
                                                        </div>
                                                    </div>
                                                    <div class="text">
                                                        <h5 class="name">{{$notification->data['name']}}</h5>
                                                        <p>{{$notification->data['message']}}</p>
                                                    </div>
                                                </div>
                                                <div class="au-message__item-time">
                                                    <span>12 Min ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                        @foreach($oldNotifications as $notification)
                                            @if($notification->read_at != null)
                                            <a href="{{route('admin.messages.show',$notification->id)}}">
                                            <div class="au-message__item">
                                                <div class="au-message__item-inner">
                                                    <div class="au-message__item-text">
                                                        <div class="avatar-wrap">
                                                            <div class="avatar">
                                                                <img loading="lazy" src="{{asset('images/agents/agent.jpg')}}" alt="John Smith">
                                                            </div>
                                                        </div>
                                                        <div class="text">
                                                            <h5 class="name">{{$notification->data['name']}}</h5>
                                                            <p>{{$notification->data['message']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="au-message__item-time">
                                                        <span>{{$notification->created_at->diffForHumans()}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                            @endif
                                        @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
