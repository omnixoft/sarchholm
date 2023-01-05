@extends('frontend.main')
@section('content')
    <!--error  start-->
    <div class="error-section mt-150 pb-100">
        <div class="container">
            <div class="row mt-40">
                <div class="col-md-6 offset-md-3  error-text text-center">
                    <div class="error-content">
                        <div class="" id="user-login-popup">

                            <div class="modal-content">

                                <div class="modal-body user-login-section">
                                    <ul class="ui-list nav nav-tabs mb-30" role="tablist">

                                        <li class="nav-item">

                                            <a class="nav-link active" data-toggle="tab" href="#login" role="tab" aria-selected="true">Reset Password</a>

                                        </li>

                                    </ul>
                                    <div class="login-wrapper">

                                        <div class="ui-dash tab-content">

                                            <div class="tab-pane fade show active" id="login" role="tabpanel">
                                                @if(count($errors) > 0)
                                                    @foreach( $errors->all() as $message )
                                                        <div class="alert alert-danger display-hide">
                                                            <button class="close" data-close="alert"></button>
                                                            <span>{{ $message }}</span>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                <form method="POST" action="{{ route('password.email') }}">
                                                    @csrf

                                                    <div class="form-group">

                                                        <input type="text" name="email" id="username" tabindex="1" class="form-control" placeholder="email" value="" required="">
                                                        {{-- <input id="email" placeholder="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required> --}}
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>

                                                    <div class="res-box text-center mt-30">
                                                        <button type="submit" class="btn v8"><span class="lnr lnr-exit"></span>Send Password Reset Link</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--error ends-->
@endsection
