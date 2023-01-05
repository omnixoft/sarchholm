@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>City :</h5>
                        </div>
                        <div class="db-add-listing">
                            <form action="{{route('admin.cities.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Country:</label><span class="text-danger">*</span>
                                            <select name="country_id" class="listing-input hero__form-input  form-control custom-select {{ $errors->has('country_id') ? 'has-error' : '' }}" id="country">
                                                <option value="">Select</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->country_id}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('country_id'))
                                                <span class="help-block text-danger">
                                                    <strong> {{ $errors->first('country_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>State:</label><span class="text-danger">*</span>
                                            <select name="state_id" class="listing-input hero__form-input  form-control custom-select" {{ $errors->has('state_id') ? 'has-error' : '' }}" id="state">
                                            </select>
                                            @if($errors->has('state_id'))
                                                <span class="help-block text-danger">
                                                    <strong> {{ $errors->first('state_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>City Name:</label><span class="text-danger">*</span>
                                            <input type="text" name="name" class="form-control filter-input {{ $errors->has('name') ? 'has-error' : '' }}" placeholder="State Name" value="{{old('name')}}">
                                            @if($errors->has('name'))
                                                <span class="help-block text-danger">
                                            <strong> {{ $errors->first('name') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Status</label><span class="text-danger">*</span>
                                        <select name="status" class="listing-input hero__form-input  form-control custom-select {{ $errors->has('status') ? 'has-error' : '' }}">
                                            <option value="">Select</option>
                                            <option value="1">Published</option>
                                            <option value="0">Pending</option>
                                        </select>
                                        @if($errors->has('status'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('status') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" class="form-control" name="image" id="photo-upload">
                                            @error('image')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="user-image mb-3">
                                            <img loading="lazy" src="" alt="" id="preview-image-before-upload">
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
    $(document).on('change','#country',function(){
        var country = $(this).val();
        $.ajax({
            method:'post',
            url: '{{route('admin.get.state')}}',
            data: {country:country,"_token":"{{csrf_token()}}"},
            dataType:'html',
            success:function(response){
                $('#state').html(response);
                $('#state').selectpicker('refresh');
            }
        });
    });
</script>
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
