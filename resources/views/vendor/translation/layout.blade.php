<!DOCTYPE html>

<html dir="ltr" lang="en-US">



<head>

    <!-- Metas -->

    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="LionCoders" />

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

    <!-- Perfect scrollbar CSS-->

    <link rel="preload" href="{{asset('css/perfect-scrollbar.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">

    <noscript><link href="{{asset('css/perfect-scrollbar.css')}}" rel="stylesheet"></noscript>

    <!-- style CSS -->

    <link rel="preload" href="{{asset('css/style.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">

    <noscript><link href="{{asset('css/style.css')}}" rel="stylesheet"></noscript>

    <!-- Dashboard CSS -->

    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet" />

    <link rel="preload" href="{{asset('css/bootstrap4-toggle.min.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="{{asset('css/bootstrap4-toggle.min.css')}}" rel="stylesheet"></noscript>

    <link rel="preload" href="{{ asset('datatable/dataTables.bootstrap4.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="{{ asset('datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet"></noscript>

    <link rel="preload" href="{{asset('datatable/datatable.responsive.boostrap.min.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="{{ asset('datatable/dataTables.responsive.boostrap.min.css') }}" rel="stylesheet"></noscript>

    <link rel="preload" href="{{ asset('datatable/datatables.flexheader.boostrap.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="{{ asset('datatable/datatables.flexheader.boostrap.min.css') }}" rel="stylesheet"></noscript>

    <link rel="stylesheet" href="{{ asset('/vendor/translation/css/main.css') }}">

    <!-- google fonts-->

    <link rel="preload" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">

    <noscript><link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"></noscript>

    <link rel="preload" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">

    <noscript><link href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" rel="stylesheet"></noscript>

    <style>

        :root {

            --theme-color: {{isset($siteInfo->color) ? $siteInfo->color : '#000000'}};

        }

    </style>

    @stack('styles')
    @notifyCss

    <!-- Document Title -->

    <title>SarchHolm - Real Estate HTML Template</title>

</head>



<body>

<div class="page-wrapper">

@php

    $languages = \Illuminate\Support\Facades\DB::table('languages')

               ->select('id','name','locale')

               // ->where('default','=',0)

               ->where('locale','!=',\Illuminate\Support\Facades\Session::get('currentLocal'))

               ->orderBy('name','ASC')

               ->get();

\Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('currentLocal'));

@endphp

    <!--Sidebar Menu Starts-->

        @include('admin.includes.left-sidear')

    <!--Sidebar Menu ends-->

    <!--Dashboard content Wrapper starts-->

    <div class="dash-content-wrap">

        <!-- Top header starts-->

        @include('admin.includes.header')

        <!-- Top header ends-->

        @if(session()->has('migration'))

            <div class="alert alert-success">

                {{ session()->get('migration') }}

            </div>

        @endif

        @yield('body')

        <!--Dashboard footer starts-->

        @include('admin.includes.footer')

        <!--Dashboard footer ends-->

    </div>

    <!--Dashboard content Wrapper ends-->

</div>

<!-- Plugin JS-->

<script src="{{asset('js/plugin.js')}}"></script>

<!--Perfect Scrollbar JS-->

<script src="{{asset('js/perfect-scrollbar.min.js')}}"></script>

<!-- Chart JS -->

<script src='{{asset('js/chart.js')}}'></script>

<!-- Main JS-->

<script src="{{asset('js/main.js')}}"></script>

<!-- Dashboard JS-->

<script src="{{asset('js/dashboard.js')}}"></script>

<script src="{{asset('js/bootstrap4-toggle.min.js')}}"></script>

<script type="text/javascript" src="{{ asset('datatable/vfs_fonts.js') }}"></script>

<script type="text/javascript" src="{{ asset('datatable/jquery.dataTables.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('datatable/dataTables.bootstrap4.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('datatable/datatable.fixedheader.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('datatable/datatable.responsive.min.js') }}"></script>

<script src="{{ asset('/vendor/translation/js/app.js') }}"></script>

@stack('scripts')
@notifyJs
<x:notify-messages />
</body>
</html>
