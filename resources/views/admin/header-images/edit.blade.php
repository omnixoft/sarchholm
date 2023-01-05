@extends('admin.main')
@section('content')
<div class="sticky-top" id="alert_message"></div>
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Pages Header Image Settings:</h5>
                        </div>


                        <div class="db-add-listing">
                            <form action="{{route('admin.header-images.update',$headerImage->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Select Page</label>
                                        <select name="page" id="" class="form-control">
                                            <option value="">Select</option>
                                            <option value="home" {{$headerImage->page == "home" ? 'selected': ''}}>Home Page</option>
                                            <option value="agents" {{$headerImage->page == "agents" ? 'selected': ''}}>Agents</option>
                                            <option value="single-agent" {{$headerImage->page == "single-agent" ? 'selected': ''}}>Single Agents</option>
                                            <option value="news" {{$headerImage->page == "news" ? 'selected': ''}}>News</option>
                                            <option value="single-news" {{$headerImage->page == "single-news" ? 'selected': ''}}>Single News</option>
                                            <option value="contact" {{$headerImage->page == "contact" ? 'selected': ''}}>Contact Us</option>
                                            <option value="about-us" {{$headerImage->page == "about-us" ? 'selected': ''}}>About Us</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Header Image:</label><span class="text-danger">*</span>
                                        <input type="file" name="image" class="form-control">
                                        @if($errors->has('image'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('image') }}</strong>
                                        </span>
                                        @endif
                                        <br>
                                        <img src="{{URL::asset('images/header/'.$headerImage->url)}}" alt="header image" style="width: 100px: height: 70px;">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-5">
                                    <div class="add-btn">
                                        <button class="btn v3">SAVE</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    (function($) {
        "use strict";

        $('#analyticSubmit').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{route('admin.analytics.store')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    // alert(data.errors);
                    let html = '';
                    if (data.errors) {
                        html = '<div class="alert alert-danger">';
                        for (let count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                        $('#alert_message').fadeIn("slow");
                        $('#alert_message').html(html);
                        setTimeout(function() {
                            $('#alert_message').fadeOut("slow");
                        }, 3000);
                    }
                    else if(data.success){

                        $('#alert_message').fadeIn("slow"); //Check in top in this blade
                        $('#alert_message').addClass('alert alert-success').html(data.success);
                        setTimeout(function() {
                            $('#alert_message').fadeOut("slow");
                        }, 3000);
                    }
                }
            });
        });
    })(jQuery);
</script>
@endpush
