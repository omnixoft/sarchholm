@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <form method="POST" action="{{ route('admin.change.password') }}">
                    @csrf
                    <div class="col-md-12">
                        <div class="db-add-list-wrap">
                            <div class="act-title">
                                <h5>Change Password</h5>
                            </div>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            @if(count($errors) > 0)
                                @foreach( $errors->all() as $message )
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button>
                                        <span>{{ $message }}</span>
                                    </div>
                                @endforeach
                            @endif
                            <div class="db-add-listing">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Current Password</label>
                                            <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>New Confirm Password</label>
                                            <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn v3">Change Password</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript">

    (function (e) {
        "use strict";


        $('#photo-upload').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#preview-image-before-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

    })(jQuery);

</script>
@endpush