<!DOCTYPE html>

<html dir="ltr" lang="en-US">
<head>

    <!-- Metas -->

    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="LionCoders" />
    <meta name="description" content="{{isset($siteInfo->description) ? $siteInfo->description : 'description'}}">
    <!--open graph metas-->
    <meta property="og:site_name" content="SarchHolm, Your real estate solution" />
    <meta property=“og:title” content="{{isset($siteInfo->title) ? $siteInfo->title : 'SarchHolm'}}" />
    <meta property="og:description" content="{{isset($siteInfo->description) ? $siteInfo->description : 'description'}}" />
    <meta property="og:url" content="http://demo.lion-coders.com/soft/sarchholm" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="http://demo.lion-coders.com/html/sarchholm-real-estate-template/images/header/hero_1.jpg" />
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:image" content="http://demo.lion-coders.com/html/sarchholm-real-estate-template/images/header/hero_1.jpg" />
    <!-- Links -->

    @if(isset($siteInfo->favicon))
        @if(file_exists( public_path() . '/images/images/'.$siteInfo->favicon))
            <link rel="icon" type="image/png" href="{{ URL::asset('/images/images/'.$siteInfo->favicon) }}" />

        @else
            <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}" />
        @endif
    @else
        <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}" />
    @endif
    <!-- Plugins CSS -->
    <link href="{{asset('css/plugin.css')}}" rel="stylesheet" />

    <!-- style CSS -->
    <link rel="preload" href="{{asset('css/style.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="{{asset('css/style.css')}}" rel="stylesheet"></noscript>

    @if(!env('USER_VERIFIED'))
    <link rel="preload" href="{{asset('css/bootstrap-colorpicker.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="{{asset('css/bootstrap-colorpicker.css')}}" rel="stylesheet"></noscript>
    @endif
    <!-- google fonts-->

    <link rel="preload" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"></noscript>
    <link rel="preload" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" rel="stylesheet"></noscript>

    <style>
        :root {
            --theme-color: {{ isset($siteInfo->color) ? $siteInfo->color : '' }};
        }
    </style>

<style>

    #switcher {list-style: none;margin: 0;padding: 0;overflow: hidden;}#switcher li {float: left;width: 30px;height: 30px;margin: 0 15px 15px 0;border-radius: 3px;}#demo {border-right: 1px solid #d5d5d5;width: 250px;height: 100%;left: -250px;position: fixed;padding: 50px 30px;background-color: #fff;transition: all 0.3s;z-index: 9999;}#demo.open {left: 0;}.demo-btn {background-color: #fff;border: 1px solid #d5d5d5;border-left: none;border-bottom-right-radius: 3px;border-top-right-radius: 3px;color: var(--theme-color);font-size: 30px;height: 40px;position: absolute;right: -40px;text-align: center;top: 35%;width: 40px;}

</style>
    @stack('styles')

    <!-- Document Title -->
    <title>@yield('title',isset($siteInfo->title) ? $siteInfo->title : 'SarchHolm')</title>
</head>

<body>
@if(!env('USER_VERIFIED'))
<div id="demo">

    <h6>Colorways</h6>

    <ul id="switcher">

        <li class="color-change" data-color="#6449e7" style="background-color:#6449e7"></li>

        <li class="color-change" data-color="#f51e46" style="background-color:#f51e46"></li>

        <li class="color-change" data-color="#fa9928" style="background-color:#fa9928"></li>

        <li class="color-change" data-color="#fd6602" style="background-color:#fd6602"></li>

        <li class="color-change" data-color="#59b210" style="background-color:#59b210"></li>

        <li class="color-change" data-color="#ff749f" style="background-color:#ff749f"></li>

        <li class="color-change" data-color="#f8008c" style="background-color:#f8008c"></li>

        <li class="color-change" data-color="#6453f7" style="background-color:#6453f7"></li>

    </ul>

    <h6>Custom color</h6>

    <input type="text" id="color-input" class="form-control" value="#6449e7">

    <div class="demo-btn"><i class="las la-cog"></i></div>

</div>
@endif
    <!--header starts-->

    @include('frontend.includes.header')

    <!--Header ends-->

    @yield('content')

    <!-- Scroll to top starts-->

    <span class="scrolltotop"><i class="lnr lnr-arrow-up"></i></span>

    <!-- Scroll to top ends-->

<!--Footer Starts-->

@include('frontend.includes.footer')
@include('cookieConsent::index')

<!--Footer ends-->

<!--login Modal starts-->

<div class="modal fade" id="user-login-popup">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="lnr lnr-cross"></i></span></button>

            </div>

            <div class="modal-body user-login-section">

                <!--User Login section starts-->

                <ul class="ui-list nav nav-tabs mb-30" role="tablist">

                    <li class="nav-item">

                        <a class="nav-link active" data-toggle="tab" href="#login" role="tab" aria-selected="true">Login</a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" data-toggle="tab" href="#register" role="tab" aria-selected="false">Register</a>

                    </li>

                </ul>

                <div class="login-wrapper">

                    <div class="ui-dash tab-content">

                        <div class="tab-pane fade show active" id="login" role="tabpanel">

                            <form id="login-form" action="{{route('login')}}" method="post">

                                @csrf

                                <div class="form-group">

                                    <input type="text" name="email" id="username" tabindex="1" class="form-control" placeholder="email" value="" required="">

                                </div>

                                <div class="form-group">

                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">

                                </div>

                                <div class="row mt-20">

                                    <div class="col-md-6 col-12 text-left">

                                        <input id="check-l" type="checkbox" name="check"> &nbsp;

                                        <label for="check-l">Remember me</label>

                                    </div>

                                    <div class="col-md-6 col-12 text-right">

                                        <a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>

                                    </div>

                                </div>

                                <div class="res-box text-center mt-30">

                                    <button type="submit" class="btn v8"><span class="lnr lnr-exit"></span> Log In</button>

                                </div>

                            </form>

                        </div>

                        <div class="tab-pane fade" id="register" role="tabpanel">

                            <form id="register-form" action="{{route('register')}}" method="post">

                                @csrf

                                {{--<input type="hidden" value="user" name="type">--}}

                                {{--<input type="hidden" value="0" name="is_approved">--}}

                                <div class="form-group">

                                    <input type="text" name="f_name" tabindex="1" class="form-control" placeholder="First Name" value="">

                                </div>

                                <div class="form-group">

                                    <input type="text" name="l_name" id="l_name" tabindex="1" class="form-control" placeholder="Last Name" value="">

                                </div>

                                <div class="form-group">

                                    <input type="text" name="username" id="user_name" tabindex="1" class="form-control" placeholder="Username" value="">

                                </div>

                                <div class="form-group">

                                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">

                                </div>

                                <div class="form-group">

                                    <input type="password" name="password" id="user_password" tabindex="2" class="form-control" placeholder="Password">

                                </div>

                                <div class="form-group">

                                    <input type="password" name="password_confirmation" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">

                                </div>

                                <div class="res-box text-left">

                                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">

                                    <label for="remember">I've read and accept terms &amp; conditions</label>

                                </div>

                                <div class="res-box text-center mt-30">

                                    <button type="submit" class="btn v8"><i class="lnr lnr-enter"></i>Sign Up</button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

                <!--User login section ends-->

            </div>

        </div>

    </div>

</div>
<!--login Modal ends-->

<!--Scripts starts-->

<!--plugin js-->

<script src="{{asset('js/plugin.js')}}"></script>



<!--Main js-->

<script src="{{asset('js/main.js')}}"></script>

<!--Scripts ends-->

@stack('script')

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-211233993-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-211233993-1');
</script>
<script src="{{asset('js/sweetalert2@11.js')}}"></script>
@if(!env('USER_VERIFIED'))
<script src="{{asset('js/bootstrap-colorpicker.js')}}"></script>

<script>

    $('.demo-btn').on('click', function(){
        $('#demo').toggleClass('open');

        $('.color-change').click(function() {

            var color = $(this).data('color');
            $('#color-input').val(color);
            $('body').css('--theme-color', color);

        });

        $('#color-input').on('change',function() {

            var color = $(this).val();
            $('body').css('--theme-color', color);

        });

    });

    (function ($) {
        "use strict";

        $('#color-input').colorpicker({

        });

    })(jQuery);

</script>

@endif
</body>



</html>
