@extends('admin.main')
@section('content')
<div class="sticky-top" id="alert_message"></div>
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Add google analytics view id:</h5>
                        </div>


                        <div class="db-add-listing">
                            <form id="analyticSubmit">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Analytics Id:</label><span class="text-danger">*</span>
                                        <input type="text" name="analytics_id" class="form-control"  value="{{env('ANALYTICS_VIEW_ID')}}">
                                        @if($errors->has('name'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
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
