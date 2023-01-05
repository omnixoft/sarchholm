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
                                                @if(count($errors) > 0)
                                                    @foreach( $errors->all() as $message )
                                                        <div class="alert alert-danger display-hide">
                                                            <button class="close" data-close="alert"></button>
                                                            <span>{{ $message }}</span>
                                                        </div>
                                                    @endforeach
                                                @endif
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

                                                            <a href="{{url('forget-password')}}" tabindex="5" class="forgot-password">Forgot Password?</a>

                                                        </div>

                                                    </div>

                                                    <div class="res-box text-center mt-30">

                                                        <button type="submit" class="btn v8"><span class="lnr lnr-exit"></span> Log In</button>


                                                        <h5>or Login with</h5>
                                                        <ul class="social-btn">
                                                            <li class="bg-fb"><a href="{{route('redirect.provider','facebook')}}"><i class="lab la-facebook-f"></i></a></li>
                                                            <li class="bg-tt"><a href="{{route('redirect.provider','google')}}"><i class="lab la-google"></i></a></li>
                                                            <li class="bg-ig"><a href="{{route('redirect.provider','github')}}"><i class="lab la-github"></i></a></li>
                                                        </ul>

                                                    </div>
                                                    @if(!env('USER_VERIFIED'))
                                                    <div class="mt-30">
                                                    <p class="btn btn-success admin-btn">LogIn as Admin</p>
                                                    <p class="btn btn-info agent-btn">LogIn as Agent</p>
                                                    </div>
                                                    @endif
                                                </form>

                                            </div>

                                            <div class="tab-pane fade" id="register" role="tabpanel">

                                                <form id="register-form" action="{{route('register')}}" method="post">

                                                    @csrf

                                                    <input type="hidden" value="user" name="type">

                                                    <input type="hidden" value="0" name="is_approved">

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

                                                        <button type="submit" class="btn v8"><span class="lnr lnr-enter"></span> Sign Up</button>

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
                </div>
            </div>
        </div>
    </div>
    <!--error ends-->
@endsection
@push('script')
<script>
    $('.admin-btn').on('click', function(){
   $("input[name='email']").focus().val('admin@lion-coders.com');
   $("input[name='password']").focus().val('admin');
});

$('.agent-btn').on('click', function(){
 $("input[name='email']").focus().val('tony_stark@sarchholm.com');
 $("input[name='password']").focus().val('000000');
});

$('.customer-btn').on('click', function(){
 $("input[name='name']").focus().val('shakalaka');
 $("input[name='password']").focus().val('shakalaka');
});
</script>
@endpush
