<header class="db-top-header">

    <div class="container-fluid">

        <div class="row align-items-center">

            @php

                $notifications = auth()->user()->unreadNotifications;

                $notifications->markAsRead();
            $languages = DB::table('languages')

                                ->select('id','name','locale')

                                // ->where('default','=',0)

                                ->where('locale','!=',\Illuminate\Support\Facades\Session::get('currentLocal'))

                                ->orderBy('name','ASC')

                                ->get();

             \Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('currentLocal'));

            @endphp

            <div class="col-md-12 col-sm-12 col-12">

                <div class="header-button">
                    <li class="nav-item">
                        <a  class="nav-link" href="{{url('/')}}" target="_blank">
                            <i class="la la-globe"></i>
                            <span>View Website</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                            <i class="la la-language"></i>
                            <span>
                            @if (\Illuminate\Support\Facades\Session::has('currentLocal'))

                                {{ __(strtoupper(\Illuminate\Support\Facades\Session::get('currentLocal'))) }}

                            @endif
                            </span>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            @foreach ($languages as $item)

                                <a class="dropdown-item" href="{{route('language.defaultChange',$item->id)}}">

                                    {{ strtoupper($item->name) }} ({{__(strtoupper($item->locale))}})

                                </a>

                            @endforeach

                        </div>

                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="{{url('public/help/index.html')}}" target="_blank" title="help">
                            <i class="las la-question-circle"></i>
                        </a>
                    </li>
                    <div class="header-button-item has-noti js-item-menu">

                        <i class="las la-bell"></i>

                        <div class="notifi-dropdown js-dropdown">

                            @foreach($notifications as $notification)

                            <div class="notifi__item">
                                <div class="content">
                                    @if($notification->type == 'App\Notifications\MessageReceived')
                                    <a href="{{route('admin.messages.index')}}">
                                    <p>{{$notification->data['message']}}</p>

                                    <span class="date">{{$notification->created_at->diffForHumans()}}</span>
                                    </a>
                                    @endif
                                    @if($notification->type == 'App\Notifications\BookingNotfication')

                                   <a href="{{route('admin.bookings.index')}}"> <p>{{substr($notification->data['message'],0,25)}}</p>

                                    <span class="date">{{$notification->created_at->diffForHumans()}}</span>
                                   </a>
                                    @endif
                                </div>
                            </div>

                            @endforeach

                            <div class="notify-bottom text-center py-20">

                                <a href="{{url('admin/messages')}}">View All Notification</a>

                            </div>

                        </div>

                    </div>

                    <div class="header-button-item js-sidebar-btn">

                    @php

                    $user = auth()->user();

                    @endphp

                    @if(file_exists( public_path() . '/images/users/'.$user->image))
                        <img loading="lazy" src="{{URL::asset('/images/users/'.$user->image)}}" alt="...">
                    @else
{{--                        <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="...">--}}
                        <img loading="lazy" src="{{Auth()->user()->image}}" alt="...">
                    @endif

                        <span>{{auth()->user()->username}} <i class="las la-caret-down"></i></span>

                    </div>

                    <div class="setting-menu js-right-sidebar d-none d-lg-block">

                        <div class="account-dropdown__body">

                            <div class="account-dropdown__item">

                                <a href="{{route('admin.users.index')}}">

                                    Profile</a>

                            </div>
                            {{--<div class="account-dropdown__item">--}}
                                {{--<a href="{{route('admin.change.password.index')}}">Change password</a>--}}
                            {{--</div>--}}

                            <div class="account-dropdown__item">

                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">

                                    Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                    @csrf

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</header>
