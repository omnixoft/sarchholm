@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Our Partners :</h5>
                        </div>


                        <div class="db-add-listing">
                            <form action="{{route('admin.ourPartners.update',$ourPartner->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name:</label><span class="text-danger">*</span>
                                            <input type="text" name="name" class="form-control filter-input {{ $errors->has('name') ? 'has-error' : '' }}" value="{{$ourPartner->name}}" placeholder="Client Name">
                                            @if($errors->has('name'))
                                                <span class="help-block text-danger">
                                            <strong> {{ $errors->first('name') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">File:</label> <span class="text-danger">*</span>
                                            <input type="file" name="image" class="form-control filter-input" id="photo-upload">
                                            @error('image')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="user-image mb-3">
                                            <img loading="lazy" src="{{ URL::asset('/images/images/'.$ourPartner->image)  }}" alt="" id="preview-image-before-upload">
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
        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });

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