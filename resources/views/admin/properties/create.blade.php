@extends('admin.main')
@push('styles')
{{--<style>--}}
    {{--.imgPreview img {--}}
        {{--padding: 8px;--}}
        {{--max-width: 100px;--}}
    {{--}--}}
{{--</style>--}}
<style>
    .images-preview-div img
    {
        padding: 10px;
        max-width: 100px;
    }
</style>
@endpush
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <div class="row">
                <form action="{{route('admin.properties.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="col-md-12">

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Property Information :</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                    <input type="hidden" name="moderation_status" value="2">
                                    <input type="hidden" name="status" value="2">
                                    <div class="form-group">
                                        <label>Packages</label> <span class="text-danger">*</span>
                                        <select name="package_id" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select</option>
                                            @foreach($packages as $package)
                                                @if($package->price > 0)
                                                <option value="{{$package->id}}" {{ old('package_id') == $package->id ? "selected" : "" }}>{{$package->package->packageTranslation->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('package_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Property Title</label> <span class="text-danger">*</span>
                                        <input type="text" name="title" class="form-control filter-input" value="{{old('title')}}" placeholder="Property Title">
                                        @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Property Type</label> <span class="text-danger">*</span>
                                    <select name="type" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select</option>
                                        <option value="{{'sale'}}" {{ old('type') == 'sale' ? "selected" : "" }}>Sale</option>
                                        <option value="{{'rent'}}" {{ old('type') == 'rent' ? "selected" : "" }}>Rent</option>
                                    </select>
                                    @error('type')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label>Category</label> <span class="text-danger">*</span>
                                    <select name="category_id" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->category_id}}" {{ old('category_id') == $category->category_id ? "selected" : "" }}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Country:</label> <span class="text-danger">*</span>
                                        <select name="country_id" class="listing-input hero__form-input  form-control custom-select" id="country">
                                            <option value="">Select</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->country_id}}" {{ old('country_id') == $country->country_id ? "selected" : "" }}>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>State</label> <span class="text-danger">*</span>
                                    <select name="state_id" class="listing-input hero__form-input  form-control custom-select" id="state">
                                    </select>
                                    @error('state_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>City</label> <span class="text-danger">*</span>
                                    <select name="city_id" class="listing-input hero__form-input  form-control custom-select" id="city">
                                    </select>
                                    @error('city_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Latitude</label> <span class="text-danger">*</span>
                                        <input type="text" name="lat" class="form-control filter-input" value="{{old('lat')}}" placeholder="Ex: 1.462260">
                                        @error('lat')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Longitude</label> <span class="text-danger">*</span>
                                        <input type="text" name="lon" class="form-control filter-input" value="{{old('lon')}}" placeholder="Ex:103.812530">
                                        @error('lon')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Property Price</label> <span class="text-danger">*</span>
                                        <input type="text" name="price" class="form-control filter-input" value="{{old('price')}}" placeholder="$1500">
                                        @error('price')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Currency</label> <span class="text-danger">*</span>
                                        <select name="currency_id" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select</option>
                                            @foreach ($currencies as $currency )
                                            <option value="{{$currency->id}}">{{$currency->name}}</option>
                                            @endforeach
                                            {{-- <option value="2" {{ old('currency_id') == "2" ? "selected" : "" }}>Euro</option> --}}
                                        </select>
                                        @error('currency_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Is Featured</label><br>
                                        <input type="checkbox" name="is_featured" checked data-toggle="toggle" data-on="yes" data-off="no" data-onstyle="success" data-offstyle="danger">
                                        @error('is_featured')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Property Details :</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row mb-30">
                                <div class="col-md-4">
                                    <label>Property ID</label> <span class="text-danger">*</span>
                                    <input type="text" name="property_id" class="form-control filter-input" value="{{old('property_id')}}" placeholder="ZOAC25">
                                    @error('property_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Number of Bedrooms</label>
                                        <input type="number" name="bed" class="form-control filter-input" value="{{old('bed')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Number of Bath</label>
                                        <input type="number" name="bath" class="form-control filter-input" value="{{old('bath')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Number of Garages</label>
                                        <input type="number" name="garage" class="form-control filter-input" value="{{old('garage')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Select Floor</label>
                                    <select name="floor" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="First Floor">First Floor</option>
                                        <option value="Second Floor">Second Floor</option>
                                        <option value="Third Floor">Third Floor</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Size of Rooms in Sq Ft</label>
                                        <input type="text" name="room_size" class="form-control filter-input" value="{{old('room_size')}}" placeholder="144">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Facilities</label>
                                        <div>
                                            @foreach($facilities as $facility)
                                                <input id="check-a" type="checkbox" name="facility_id[]" value="{{$facility->facility_id}}">
                                            <label for="check-a">{{$facility->name}}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-30">
                                    <div class="form-group">
                                    <label>Property Video Link</label>
                                    <input type="text" name="video" class="form-control filter-input" placeholder="https://www.youtube.com/watch?v=dqD0SqMNtks" value="{{old('video')}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="list_info">Description</label> <span class="text-danger">*</span>
                                            <textarea name="description" class="form-control" id="list_info" rows="4" placeholder="Enter your text here">{{old('description')}}</textarea>
                                            @error('description')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                </div>
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="list_info">Content</label> <span class="text-danger">*</span>
                                            <textarea name="content" class="form-control ckeditor" id="list_info" rows="4" placeholder="Enter your text here">{{old('content')}}</textarea>
                                            @error('content')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="db-add-list-wrap">


                        <div class="db-add-listing">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class="user-image mb-3 text-center">
                                        <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Thumbnail Image</label> <span class="text-danger">*</span>
                                        <input type="file" name="thumbnail" class="form-control" id="photo-upload">
                                        @error('thumbnail')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mb-5">
                                    <div class="act-title">
                                        <h5>Gallery :</h5>
                                    </div>
                                    {{--<div class="user-image mb-3 text-center">--}}
                                        {{--<div class="imgPreview"> </div>--}}
                                    {{--</div>--}}
                                    <div class="col-md-12">
                                        <div class="mt-1 text-center">
                                            <div class="images-preview-div"> </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="add-listing__input-file-box">
                                                <input class="add-listing__input-file" type="file" name="images[]" multiple="multiple" id="images">
                                                <div class="add-listing__input-file-wrap">
                                                    <i class="lnr lnr-cloud-upload"></i>
                                                    <p>Click here to upload your images</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="db-add-list-wrap">
                        <div class="db-add-listing">
                            <div class="row">
                                <div class="col-md-12 text-right sm-left">
                                    <button class="btn v3" type="submit">Submit</button>
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
<!--CKEditor JS-->
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

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
    $(document).on('change','#state',function(){
        var state = $(this).val();
        $.ajax({
            method:'post',
            url: '{{route('admin.get.city')}}',
            data: {state:state,"_token":"{{csrf_token()}}"},
            dataType:'html',
            success:function(response){
                $('#city').html(response);
                $('#city').selectpicker('refresh');
            }
        });
    });
</script>

<script>
    (function($) {
        "use strict";
        // Multiple images preview with JavaScript
//        var multiImgPreview = function(input, imgPreviewPlaceholder) {
//
//            if (input.files) {
//                var filesAmount = input.files.length;
//                for (i = 0; i < filesAmount; i++) {
//                    var reader = new FileReader();
//                    reader.onload = function(event) {
//                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
//                    }
//                    reader.readAsDataURL(input.files[i]);
//                }
//            }
//        };

//        $('#images').on('change', function() {
//            multiImgPreview(this, 'div.imgPreview');
//        });
        $('#photo-upload').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#preview-image-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

    })(jQuery);
</script>
<script >
    $(function() {
// Multiple images preview with JavaScript
        var previewImages = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#images').on('change', function() {
            previewImages(this, 'div.images-preview-div');
        });
    });
</script>
@endpush
