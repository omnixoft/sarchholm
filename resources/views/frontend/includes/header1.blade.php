<header class="header transparent scroll-hide">
    <!--Header Top Section Starts-->
    <div class="header-top-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-8 col-12">
                    <div class="header-top-left">
                        <ul>
                            <li><i class="las la-phone"></i> <a href="tel:4444356348">+444 435 6348</a></li>
                            <li><i class="las la-envelope"></i><a href="mailto:info@sarchholm.com">info@sarchholm.com</a></li>
                        </ul>
                    </div>
                </div>
                @php
                    $languages = \Illuminate\Support\Facades\DB::table('languages')
                                ->select('id','name','locale')
                                // ->where('default','=',0)
                                ->where('locale','!=',\Illuminate\Support\Facades\Session::get('currentLocal'))
                                ->orderBy('name','ASC')
                                ->get();
                 \Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('currentLocal'));
                @endphp
                <div class="col-sm-4 col-12">
                    <div class="menu-btn">
                        <ul class="user-btn d-flex justify-content-center">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="las la-language">
                                        @if (\Illuminate\Support\Facades\Session::has('currentLocal'))
                                            {{ __(strtoupper(\Illuminate\Support\Facades\Session::get('currentLocal'))) }}
                                        @endif
                                    </i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @foreach ($languages as $item)
                                        <a class="dropdown-item" href="{{route('language.defaultChange',$item->id)}}">
                                            {{ $item->name }} ({{__(strtoupper($item->locale))}})
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                            <li><a href="#"><i class="lar la-heart"></i></a>
                                <span>0</span>
                            </li>
                            @guest
                            <li><a href="#" data-toggle="modal" data-target="#user-login-popup"><i class="las la-user-circle"></i></a>
                            </li>
                            @else
                                <li><a href="{{ route('admin.users.index') }}">{{Auth::user()->username}}</a>
                                </li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="lnr lnr-arrow-right-circle"></i></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Header Top Section Ends-->
    <!--Main Menu starts-->
    <div class="site-navbar-wrap v2">
        <div class="container">
            <div class="site-navbar">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-6 col-7">
                        <a class="navbar-brand" href="{{url('/')}}"><img loading="lazy" src="{{asset('images/logo-blue.png')}}" alt="logo" class="img-fluid"></a>
                    </div>
                    <div class="col-lg-6 col-md-1 col-1  order-2 order-lg-1 pl-xs-0">
                        <nav class="site-navigation text-right">
                            <div class="container">
                                <ul class="site-menu js-clone-nav d-none d-lg-block">
                                    <li class="has-children">
                                        <a class="{{ Request::is('/') ? 'active' : '' }}" href="{{url('/')}}">Home</a>
                                    </li>
                                    <li class="has-children">
                                        <a class="{{ Request::is('properties') ? 'active' : '' }}" href="{{url('properties')}}">{{trans('file.Properties')}}</a>
                                    </li>
                                    <li class="has-children">
                                        <a class="{{ Request::is('agents') ? 'active' : '' }}" href="{{url('agents')}}">{{trans('file.agents')}}</a>
                                    </li>
                                    <li class="has-children">
                                        <a class="{{ Request::is('news') ? 'active' : '' }}" href="{{url('news')}}">{{trans('file.news')}}</a>
                                    </li>
                                    <li class="d-lg-none"><a class="btn v3" href="{{url('add-listing')}}"><i class="las la-home"></i>{{trans('file.add_listing')}}</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="d-lg-none sm-right">
                            <a href="#" class="mobile-bar js-menu-toggle">
                                <span class="las la-bars"></span>
                            </a>
                        </div>
                        <!--mobile-menu starts -->
                        <div class="site-mobile-menu">
                            <div class="site-mobile-menu-header">
                                <div class="site-mobile-menu-close  js-menu-toggle">
                                    <span class="las la-times"></span> </div>
                            </div>
                            <div class="site-mobile-menu-body"></div>
                        </div>
                        <!--mobile-menu ends-->
                    </div>
                    <div class="col-lg-4 col-md-5 col-4 order-1 order-lg-2 text-right pr-xs-0">
                        <div class="menu-btn">
                            <div class="add-list">
                                @guest
                                <a class="btn v1" href="#" data-toggle="modal" data-target="#user-login-popup"><i class="las la-home"></i>{{trans('file.add_listing')}}</a>
                                @else
                                    <a class="btn v1" href="{{url('add-listing')}}"><i class="las la-home"></i>{{trans('file.add_listing')}}</a>
                                    @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Main Menu ends-->
</header>