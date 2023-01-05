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
                <form action="{{route('admin.siteinfo.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="site_id" value="{{isset($siteInfo->id) ? $siteInfo->id : ''}}">

                <div class="col-md-12">

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Site Information :</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Website Title</label> <span class="text-danger">*</span>
                                        <input type="text" name="title" class="form-control filter-input" value="{{isset($siteInfo->title) ? $siteInfo->title : ''}}" placeholder="Website Title">
                                        @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email:</label> <span class="text-danger">*</span>
                                        <input type="text" name="email" class="form-control filter-input" value="{{isset($siteInfo->email) ? $siteInfo->email : ''}}" placeholder="Email">
                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone:</label> <span class="text-danger">*</span>
                                        <input type="text" name="phone" class="form-control filter-input" value="{{isset($siteInfo->phone) ? $siteInfo->phone : ''}}" placeholder="Phone">
                                        @error('phone')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Website Color: </label>
                                        <input type="text" class="form-control" name="color" value="{{$siteInfo->color}}">
                                        @error('color')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Logo: </label>
                                        <input type="file" class="form-control" name="logo" id="photo-upload">
                                        @error('logo')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    @if(isset($siteInfo->logo))
                                        @if(file_exists( public_path() . '/images/images/'.$siteInfo->logo))
                                            <img loading="lazy" src="{{ URL::asset('/images/images/'.$siteInfo->logo) }}" id="preview-image-before-upload" alt="Image" style="width:300px;height:40px">
                                        @else
                                            <img loading="lazy" src="{{asset('images/logo-blue.png')}}" alt="logo2" class="img-fluid" width="300" height="50">
                                        @endif
                                    @else
                                            <img loading="lazy" src="{{asset('images/logo-blue.png')}}" alt="logo" style="width:300px;height:40px">
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Favicon Icon: </label>
                                        <input type="file" class="form-control" name="favicon">
                                        @error('favicon')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    @if(isset($siteInfo->favicon))
                                        @if(file_exists( public_path() . '/images/images/'.$siteInfo->favicon))
                                            <img loading="lazy" src="{{ URL::asset('/images/images/'.$siteInfo->favicon) }}" id="preview-image-before-upload" alt="favicon">
                                        @else
                                            <img loading="lazy" src="{{asset('images/favicon.png')}}" alt="favicon" class="img-fluid">
                                        @endif
                                    @else
                                        <img loading="lazy" src="{{asset('images/favicon.png')}}" alt="favicon">
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address:</label> <span class="text-danger">*</span>
                                        <input type="text" name="address" class="form-control filter-input" value="{{isset($siteInfo->address) ? $siteInfo->address : ''}}" placeholder="Address">
                                        @error('address')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Copyright Text:</label> <span class="text-danger">*</span>
                                        <input type="text" name="copy_right" class="form-control filter-input" value="{{isset($siteInfo->copy_right) ? $siteInfo->copy_right : 'copy right'}}" placeholder="Copyright Text">
                                        @error('copy_right')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Facebook Link:</label> <span class="text-danger">*</span>
                                        <input type="text" name="fb" class="form-control filter-input" value="{{isset($siteInfo->fb) ? $siteInfo->fb : '#'}}" placeholder="Facebook">
                                        @error('fb')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Twitter Link:</label> <span class="text-danger">*</span>
                                        <input type="text" name="twitter" class="form-control filter-input" value="{{isset($siteInfo->twitter) ? $siteInfo->twitter : '#'}}" placeholder="Twitter">
                                        @error('twitter')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Youtube Link:</label> <span class="text-danger">*</span>
                                        <input type="text" name="yt" class="form-control filter-input" value="{{isset($siteInfo->yt) ? $siteInfo->yt : '#'}}" placeholder="Youtube">
                                        @error('yt')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Pinterest Link:</label> <span class="text-danger">*</span>
                                        <input type="text" name="pinterest" class="form-control filter-input" value="{{isset($siteInfo->pinterest) ? $siteInfo->pinterest : '#'}}" placeholder="Pinterest">
                                        @error('pinterest')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                {{--<div class="col-md-4">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label>Google Analytics ID:</label> <span class="text-danger">*</span>--}}
                                        {{--<input type="text" name="analytics_id" class="form-control filter-input" value="{{env('ANALYTICS_VIEW_ID')}}" placeholder="Google Analytics Id">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="list_info">About Us</label> <span class="text-danger">*</span>
                                        <textarea name="about_us" class="form-control" id="list_info" rows="4" placeholder="Enter your text here">{{isset($siteInfo->about_us) ? $siteInfo->about_us : 'About Us'}}</textarea>
                                        @error('about_us')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="list_info">Description</label> <span class="text-danger">*</span>
                                        <textarea name="description" class="form-control" id="list_info" rows="4" placeholder="Enter your text here">{{isset($siteInfo->description) ? $siteInfo->description : 'description'}}</textarea>
                                        @error('description')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="db-add-list-wrap">
                        <div class="db-add-listing">
                            <div class="row mb-30">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="list_info">Terms & Condition</label> <span class="text-danger">*</span>
                                        <textarea name="terms_condition" class="form-control ckeditor" id="list_info" rows="4">{!! isset($siteInfo->terms_condition) ? $siteInfo->terms_condition : '' !!}</textarea>
                                        @error('terms_condition')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="list_info">Privacy Policy</label> <span class="text-danger">*</span>
                                            <textarea name="privacy_policy" class="form-control ckeditor" id="list_info" rows="4" placeholder="Enter your text here">{!! isset($siteInfo->privacy_policy) ? $siteInfo->privacy_policy : '' !!}</textarea>
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
