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
                                <div class="row">
                                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="listing-input hero__form-input form-control custom-select" name="category_id">
                                                <option value="">Select</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{$category->id == $blog->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title:</label> <span class="text-danger">*</span>
                                            <input type="text" name="title" value="{{$blog->title}}" class="form-control filter-input" id="title" placeholder="Name">
                                            @error('title')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Slug:</label> <span class="text-danger">*</span>
                                            <input type="text" name="slug" value="{{$blog->slug}}" class="form-control filter-input" id="slug" placeholder="Slug">
                                            @error('slug')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="list_info">Content</label> <span class="text-danger">*</span>
                                            <textarea name="body" class="form-control ckeditor" id="list_info" rows="4" placeholder="Enter your text here">{!! $blog->body !!}</textarea>
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
<script>
    $('#title').change(function(e){
        $.get('{{route('admin.blogs.checkSlug') }}',
            {'title': $(this).val()},
            function(data){
                $('#slug').val(data.slug);
            }
        )
    });
</script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endpush