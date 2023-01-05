@extends('admin.main')
@push('styles')
<link rel="stylesheet" href="{{asset('dist/css/bootstrap-tokenfield.min.css')}}">
@endpush
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Add New Blog:</h5>
                        </div>
                        <div class="db-add-listing">
                            <form action="{{route('admin.blogs.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="listing-input hero__form-input form-control custom-select" name="category_id">
                                                <option value="">Select</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title:</label> <span class="text-danger">*</span>
                                            <input type="text" name="title" class="form-control filter-input" id="title" placeholder="Name">
                                            @error('title')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tag:</label> <span class="text-danger">*</span>
                                            <select name="tags[]" id="" class="form-control" multiple>
                                                <option value="">Select</option>
                                                @foreach($tags as $tag)
                                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('tag')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" class="form-control" name="image" id="photo-upload">
                                            @error('image')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="user-image mb-3 text-center">
                                            <img loading="lazy" alt="" id="preview-image-before-upload">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="list_info">Content</label> <span class="text-danger">*</span>
                                            @error('body')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                            <textarea name="body" class="form-control ckeditor" id="list_info" rows="4" placeholder="Enter your text here"></textarea>
                                            @error('body')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
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
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
<script src="{{asset('dist/bootstrap-tokenfield.min.js')}}"></script>
<script type="text/javascript">
    (function($){
        "use strict";
        $('#tags').tokenfield({
            autocomplete:{
                source: ['PHP','Codeigniter','HTML','JQuery','Javascript','CSS','Laravel','CakePHP','Symfony','Yii 2','Phalcon','Zend','Slim','FuelPHP','PHPixie','Mysql'],
                delay:100
            },
            showAutocompleteOnFocus: true
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
