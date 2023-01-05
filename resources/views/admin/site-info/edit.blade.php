@extends('admin.main')
@push('styles')
<style>
    .imgPreview img {
        padding: 8px;
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
                <form action="{{route('admin.properties.update',$property->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="locale" value="{{$locale}}">
                    <div class="col-md-12">
                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Edit Property Information :</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="user_id" value="{{$property->user_id}}">
                                    <input type="hidden" name="package_id" value="{{ $property->package_id}}">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Property Title</label>
                                        <input type="text" name="title" class="form-control filter-input" @if(isset($propertyTranslation->title)) value="{{$propertyTranslation->title}}" @else value="" @endif placeholder="Property Title">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Property Type</label>
                                    <select name="type" class="listing-input hero__form-input  form-control custom-select">
                                        <option>Select</option>
                                        <option value="{{'sale'}}" {{ $property->type == 'sale' ? 'selected' : ''}}>Sale</option>
                                        <option value="{{'rent'}}" {{ $property->type == 'rent' ? 'selected' : ''}}>Rent</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Category</label>
                                    <select name="category_id" class="listing-input hero__form-input  form-control custom-select">
                                        <option>Select</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->category_id}}" {{ $property->category_id == $category->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Country:</label>
                                        <select name="country_id" class="listing-input hero__form-input  form-control custom-select {{ $errors->has('country_id') ? 'has-error' : '' }}" id="country">
                                            <option value="">Select</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->country_id}}" {{ $property->country_id == $country->country_id ? 'selected' : ''}}>{{$country->name}}</option>
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
                                    <label>State</label>
                                    <select name="state_id" class="listing-input hero__form-input  form-control custom-select" id="state">
                                        <option value="">Select</option>
                                        @foreach($states as $state)
                                            <option value="{{$state->state_id}}" {{ $property->state_id == $state->state_id ? 'selected' : ''}}>{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>City</label>
                                    <select name="city_id" class="listing-input hero__form-input  form-control custom-select" id="city">
                                        <option value="">Select</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->city_id}}" {{ $property->city_id == $city->city_id ? 'selected' : ''}}>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" name="lat" class="form-control filter-input" value="{{$property->lat}}" placeholder="Ex: 1.462260">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input type="text" name="lon" class="form-control filter-input" value="{{$property->lon}}" placeholder="Ex:103.812530">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Property Price</label>
                                        <input type="text" name="price" class="form-control filter-input" value="{{$property->price}}" placeholder="$1500">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Currency</label>
                                        <select name="currency_id" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select</option>
                                            <option value="1" {{ $property->currency_id == "1" ? 'selected' : ''}}>USD</option>
                                            <option value="2" {{ $property->currency_id == "2" ? 'selected' : ''}}>Euro</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Status</label>
                                    <select name="status" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select</option>
                                        <option value="1" {{ $property->status == "1" ? 'selected' : ''}}>For Sale</option>
                                        <option value="2" {{ $property->status == "2" ? 'selected' : ''}}>For Rent</option>
                                    </select>
                                </div>
                                @can('isAdmin')
                                <div class="col-md-4">
                                    <label>Moderation Status</label>
                                    <select name="moderation_status" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select</option>
                                        <option value="0" {{ $property->moderation_status == "0" ? 'selected' : ''}}>Pending</option>
                                        <option value="1" {{ $property->moderation_status == "1" ? 'selected' : ''}}>Approved</option>
                                    </select>
                                </div>
                                @endcan
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Is Featured</label>
                                        <input type="checkbox" name="is_featured" checked data-toggle="toggle" data-on="1" data-off="0" data-onstyle="success" data-offstyle="danger">
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
                                    <label>Property ID</label>
                                    <input type="text" name="property_id" class="form-control filter-input" value="{{$property->property_id}}" placeholder="ZOAC25">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Number of Bedrooms</label>
                                        <input type="number" name="bed" class="form-control filter-input" value="{{isset($property->propertyDetails->bed) ? $property->propertyDetails->bed : ''}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Number of Bath</label>
                                        <input type="number" name="bath" class="form-control filter-input" value="{{ isset($property->propertyDetails->bath) ? $property->propertyDetails->bath : ''}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Number of Garages</label>
                                        <input type="number" name="garage" class="form-control filter-input" value="{{isset($property->propertyDetails->garage) ? $property->propertyDetails->garage : ''}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Select Floor</label>
                                    <select name="floor" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select</option>
                                        <option value="First Floor" @if(isset($property->propertyDetails->floor)) {{$property->propertyDetails->floor == 'First Floor' ? 'selected' : ''}} @endif>First Floor</option>
                                        <option value="First Floor" @if(isset($property->propertyDetails->floor)) {{$property->propertyDetails->floor == 'Second Floor' ? 'selected' : ''}} @endif>Second Floor</option>
                                        <option value="First Floor" @if(isset($property->propertyDetails->floor)) {{$property->propertyDetails->floor == 'Third Floor' ? 'selected' : ''}} @endif>Third Floor</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Size of Rooms in Sq Ft</label>
                                        <input type="text" name="room_size" class="form-control filter-input" value="{{ isset($property->propertyDetails->room_size) ? $property->propertyDetails->room_size : '' }}" placeholder="144">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Facilities</label>
                                        <div>
                                            @foreach($facilities as $facility)
                                            <input id="check-a" type="checkbox" name="check">
                                            <label for="check-a">{{$facility->name}}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-30">
                                    <div class="form-group">
                                    <label>Property Video Link</label>
                                    <input type="text" name="video" class="form-control filter-input" value="{{isset($property->propertyDetails->video) ? $property->propertyDetails->video : ''}}" placeholder="https://www.youtube.com/watch?v=dqD0SqMNtks">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <form>
                                        <div class="form-group">
                                            <label for="list_info">Description</label>
                                            <textarea name="description" class="form-control" id="list_info" rows="4" placeholder="Enter your text here">@if(isset($propertyTranslation->description)) {{$propertyTranslation->description}} @else "" @endif</textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="list_info">Content</label>
                                            <textarea name="content" class="form-control ckeditor" id="list_info" rows="4" placeholder="Enter your text here">{!! $property->propertyDetails->propertyDetailTranslation->content ?? $property->propertyDetails->propertyDetailTranslationEnglish->content ?? null !!}</textarea>
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
                                        <img loading="lazy" src="{{ URL::asset('/images/thumbnail/'.$property->thumbnail)  }}" alt="" id="preview-image-before-upload" style="width: 350px;height: 254px;">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Thumbnail Image</label> <span class="text-danger">*</span>
                                        <input type="file" name="thumbnail" class="form-control" id="photo-upload" value="{{$property->thumbnail}}">
                                        @error('thumbnail')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mb-5">
                                    <div class="act-title">
                                        <h5>Gallery :</h5>
                                    </div>
                                    @php
                                        $pic = json_decode($property->image->name);
                                    @endphp
                                    <div class="user-image mb-3 text-center">
                                        <div class="imgPreview">
                                            @foreach($pic as $key=>$p)
                                                    <img loading="lazy"class="" src="{{ URL::asset('images/gallery/'.$p)}}" alt="slide">
                                            @endforeach
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
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
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
        var multiImgPreview = function(input, imgPreviewPlaceholder) {

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