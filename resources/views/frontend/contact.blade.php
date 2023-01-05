@extends('frontend.main')
@push('styles')
<style>
    .load-overlay{
        display: none;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 999;
        background: rgba(255,255,255,0.8) url({{asset('images/breadcrumb/loader3.gif')}}) center no-repeat;
    }
    /* Turn off scrollbar when body element has the loading class */
    body.loading{
        overflow: hidden;
    }
    /* Make spinner image visible when body element has the loading class */
    body.loading .load-overlay{
        display: block;
    }
</style>
@endpush
@section('content')
    <!--Breadcrumb section starts-->
    @if(!env('USER_VERIFIED'))
    <div class="breadcrumb-section bg-h" style="background-image: url('{{asset('images/breadcrumb/breadcrumb_2.jpg')}}')">
    @else
    <div class="breadcrumb-section bg-h" style="background-image: url('{{asset('images/header/'.$headerImage->url)}}')">
    @endif
        <div class="overlay op-5"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="breadcrumb-menu">
                        <h2>Contact us</h2>
                        <span><a href="home-v1.html">Home</a></span>
                        <span>Contact us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb section ends-->

    <!--Contact info starts -->
    <div class="contact-info section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-item">
                        <i class="las la-map-marker-alt"></i>
                        <h4>Corporate Office</h4>
                        <p>7652 Washington Avenue, Suite 315
                            Miami Beach, FL 33139</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-item">
                        <i class="las la-phone-alt"></i>
                        <h4>Direct Contact</h4>
                        <p><strong>Phone : </strong> 800 987 6543</p>
                        <p><strong>Email : </strong> 800 987 6543</p>
                        <p><strong>Website : </strong> 800 987 6543</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-item">
                        <i class="las la-business-time"></i>
                        <h4>Business Hours</h4>
                        <p><strong>Sunday : </strong> Closed</p>
                        <p><strong>Monday-Friday : </strong>10AM - 8PM</p>
                        <p><strong>Saturday : </strong>10AM - 2PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Contact info ends -->
    <!--Contact section starts-->
    <div class="contact-section v1 mt-10 mb-120">
        <div class="container">
            <div class="contact-map v1">
                <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2965.0824050173574!2d-93.63905729999999!3d41.998507000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sWebFilings%2C+University+Boulevard%2C+Ames%2C+IA!5e0!3m2!1sen!2sus!4v1390839289319"  width="650" height="500"  style="border:0"></iframe>
            </div>
            <div class="row">
                <div class="col-lg-5 offset-lg-6 col-md-12">
                    <div class="section-title v2">
                        <h2>Write to us</h2>
                    </div>
                    {{-- @if (session('message'))
                    <div class="alert alert-success">
                        <p>{{session('message')}}</p>
                    </div>
                    @endif --}}
                    <form  id="contact_form">
                        <div class="form-control-wrap">
                            {{-- <div id="message" class="alert alert-danger alert-dismissible fade"></div> --}}
                            <div class="form-group">
                                <input type="text" class="form-control" id="InputName" placeholder="Name*" name="name" value="{{old('name')}}">
                                {{-- @error('name')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror --}}
                                <span class="text-danger" id="nameErrorMsg"></span>

                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="InputEmail" placeholder="email*" name="email" value="{{old('email')}}">
                                {{-- @error('email')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror --}}
                                <span class="text-danger" id="emailErrorMsg"></span>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="8" name="message" id="message" placeholder="Your Message">{{old('message')}}</textarea>
                                {{-- @error('message')
                                <div class="text-danger">{{$message}}</div>
                                @enderror --}}
                                <span class="text-danger" id="messageErrorMsg"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn v7">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Contact section ends-->
    <div class="load-overlay"></div>

@endsection
@push('script')
<script type="text/javascript">

    $('#contact_form').on('submit',function(e){
        e.preventDefault();
        $('.v7').text("Submitting...");
        $('.v7').prop('disabled', true);
        let name = $('#InputName').val();
        let email = $('#InputEmail').val();
        let message = $('#message').val();
        $.ajax({
            url: "{{route('contact')}}",
            type:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                name:name,
                email:email,
                message:message,
            },
            success:function(response){
                // $('#successMsg').show();
                // console.log(response);
            $('#InputName').val("");
            $('#InputEmail').val("");
            $('#message').val("");
            $('.v7').text("Send Message");
            $('.v7').prop('disabled', false);

            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Thanks for contacting us!',
                showConfirmButton: false,
                timer: 1500
            })

            },
            error: function(response) {
                $('#nameErrorMsg').text(response.responseJSON.errors.name);
                $('#emailErrorMsg').text(response.responseJSON.errors.email);
                $('#messageErrorMsg').text(response.responseJSON.errors.message);

                $('#nameErrorMsg').delay(3200).fadeOut(300);
                $('#emailErrorMsg').delay(3200).fadeOut(300);
                $('#messageErrorMsg').delay(3200).fadeOut(300);

                $('.v7').text("Send Message");
                $('.v7').prop('disabled', false);

            },
        });
    });

    // Add remove loading class on body element based on Ajax request status
    $(document).on({
        ajaxStart: function(){
            $("body").addClass("loading");
        },
        ajaxStop: function(){
            $("body").removeClass("loading");
        }
    });
</script>
@endpush
