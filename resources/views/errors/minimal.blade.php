@extends('frontend.main')
@section('content')
    <!--error  start-->
    <div class="error-section mt-150 pb-100">
        <div class="container">
            <div class="row mt-40">
                <div class="col-md-6 offset-md-3  error-text text-center">
                    <div class="error-content">
                        <h1>@yield('code') | @yield('message')</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--error ends-->
@endsection