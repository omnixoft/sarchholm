@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Edit Blog:</h5>
                        </div>
                        <div class="db-add-listing">
                            <form action="{{route('admin.blogs.update',$blog)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="locale" value="{{$locale}}">
                                <div class="row">
                                    <input type="hidden" name="user_id" value="{{$blog->user_id}}">
                                    @can('isAdmin')
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Moderation Status</label>
                                            <select class="listing-input hero__form-input form-control custom-select" name="status">
                                                <option value="">Select</option>
                                                <option value="pending" {{$blog->status == 'pending' ? 'selected' : ''}}>PENDING</option>
                                                <option value="approved" {{$blog->status == 'approved' ? 'selected' : ''}}>APPROVED</option>
                                                <option value="rejected" {{$blog->status == 'rejected' ? 'selected' : ''}}>REJECTED</option>
                                            </select>
                                        </div>
                                    </div>
                                    @endcan
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="listing-input hero__form-input form-control custom-select" name="category_id">
                                                <option value="">Select</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{$category->id == $blog->category_id ? 'selected' : ''}}>{{$category->blogCategoryTranslation->name ?? $category->blogCategoryTranslationEnglish->name  ?? null }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title:</label> <span class="text-danger">*</span>
                                            <input type="text" name="title" @if(isset($blogTranslation->title)) value="{{$blogTranslation->title}}" @else value="" @endif class="form-control filter-input" id="title" placeholder="Name">
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
                                                    <option value="{{$tag->id}}"
                                                    @foreach($blog->tags as $t)
                                                        {{$t->id == $tag->id ? 'selected' : ''}}
                                                    @endforeach
                                                    >{{$tag->tagTranslation->name ?? $tag->tagTranslationEnglish->name  ?? null }}</option>
                                                @endforeach
                                            </select>
                                            @error('tag')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image" id="photo-upload">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="user-image mb-3 text-center">
                                            <img loading="lazy" src="{{ URL::asset('/images/thumbnail/'.$blog->image)  }}" alt="" id="preview-image-before-upload" style="width: 350px;height: 254px;">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="list_info">Content</label> <span class="text-danger">*</span>
                                            <textarea name="body" class="form-control ckeditor" id="list_info" rows="4" placeholder="Enter your text here">{!! $blog->blogTranslation->body ?? $blog->blogTranslationEnglish->body  ?? null !!}</textarea>
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
    (function ($) {
        "use strict";

        $('#photo-upload').change(function(){

        let reader = new FileReader();

        reader.onload = (e) => {

            $('#preview-image-before-upload').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

        });
        $('.ckeditor').ckeditor();
    })(jQuery);
</script>
@endpush
