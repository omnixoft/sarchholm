@extends('admin.main')
@section('content')
<div class="sticky-top" id="alert_message"></div>
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Mail Setting</h5>
                        </div>


                        <div class="db-add-listing">
                            <form id="mailSettingsSubmit">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('Mail Host')}} *</label>
                                        <input type="text" name="mail_host" class="form-control" value="{{env('MAIL_HOST')}}" required />
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('Mail Address')}} *</label>
                                        <input type="text" name="mail_address" class="form-control" value="{{env('MAIL_FROM_ADDRESS')}}" required />
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('Mail From Name')}} *</label>
                                        <input type="text" name="mail_name" class="form-control" value="{{env('MAIL_FROM_NAME')}}" required />
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('Mail Port')}} *</label>
                                        <input type="text" name="port" class="form-control" value="{{env('MAIL_PORT')}}" required />
                                    </div>
                                    <div class="form-group">
                                        <label>{{trans('file.Password')}} *</label>
                                        <input type="password" name="password" class="form-control" value="" required />
                                    </div>
                                    <div class="form-group">
                                        <label>{{trans('file.Encryption')}} *</label>
                                        <input type="text" name="encryption" class="form-control" value="{{env('MAIL_ENCRYPTION')}}" required />
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

        $('#mailSettingsSubmit').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{route('admin.mail-settings.store')}}",
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
