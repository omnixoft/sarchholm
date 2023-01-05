@extends('admin.main')

@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Add New Project:</h5>
                        </div>
                        <div class="db-add-listing">
                            <form action="{{ route('admin.projects.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Project name:</label>
                                            <input type="text" name="name" value="{{ $row->name }}" class="form-control filter-input"
                                                id="name" placeholder="Name">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Location:</label> <span class="text-danger">*</span>
                                            <input type="text" name="location" value="{{ $row->location }}" class="form-control filter-input"
                                                id="location" placeholder="Location">
                                            @error('location')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="list_info">Description:</label>
                                            <textarea name="description" class="form-control ckeditor" id="list_info" rows="4"
                                                placeholder="Enter your text here">{{ $row->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="list_info">Overall SQM:</label> <span
                                                class="text-danger">*</span>
                                            <input type="text" name="overall_sqm" value="{{ $row->overall_sqm }}" class="form-control filter-input"
                                                id="overall_sqm" placeholder="Overall SQM">
                                            @error('overall_sqm')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="act-title">
                                            <h5>Project Cover Media:</h5>
                                        </div>
                                    </div>
                                    @php
                                        $medias = json_decode($row->cover_media_img);
                                        $vid_urls = json_decode($row->cover_media_vid_url);
                                    @endphp
                                    <input type="hidden" name="eximgs" value="{{ $row->cover_media_img }}">
                                    @if (!empty($medias))
                                    @foreach ($medias as $key => $media)
                                    <div class="col-md-12 fixed-div-1">
                                        <div class="form-row fixed-div">
                                            <div class="form-group col-md-4 img-box-divvv">
                                                <div class="white-box-divv"
                                                    style="background-image:url('{{ asset('project_cover_media/'.$media) }}'); background-size:cover; position: relative; height: 130px; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;, rgb(0 0 0 / 30%) 0px 3px 7px -3px;">
                                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger d-none"
                                                        style="position: absolute; top:0px; right:0px; opacity:0.8;">X</a>
                                                </div>
                                                <div class="upload-btn"
                                                    style="position: relative; text-align: center; color: #fff; padding: 20px; border-radius: 4px; background: #626262;">
                                                    Upload Image
                                                    <input type="file" name="cover_media_img[]" class="file-control file2222" multiple
                                                        style="cursor: pointer; position: absolute; left: 0; top: 0; opacity: 0; width: 100%; height: 100%; border: solid 1px white;">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="list_info">Video url:</label>
                                                <input type="text" name="cover_media_vid_url[]" class="form-control filter-input" id="available_units"
                                                    placeholder="Video url" value="{{ (isset($vid_urls[$key]) ? $vid_urls[$key] : '') }}">
                                                @error('available_units')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            @if ($key > 0)
                                            <div class="form-group col-md-2 float-right">
                                                <a href="javascript:void(0)" class="btn btn-sm btn-danger remove-media-btn"
                                                        style="position: absolute; top:0px; right:0px; opacity:0.8;">X</a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    @include('admin.projects.cover_media')
                                    @endif
                                    <div class="col-md-12 media-div">
                                        <div class="act-title">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-primary add-more-cover-media">Add More Cover Media</a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="list_info">Project Link:</label> <span
                                                class="text-danger">*</span>
                                            <input type="text" name="project_link" value="{{ $row->project_link }}" class="form-control filter-input"
                                                id="overall_sqm" placeholder="Project Link">
                                            @error('project_link')
                                                <p class="text-danger">Project link is required </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-5">
                                        <div class="add-btn">
                                            <input type="hidden" name="id" value="{{ $row->id }}">
                                            <button class="btn v3">UPDATE</button>
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
    <script type="text/javascript">
        $('.photo-upload').change(function() {
            let reader = new FileReader();

            reader.onload = (e) => {

                $('#preview-image-before-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

        $(document).on('click','.add-more-cover-media',function(){
            $(this).parents('.media-div').before(`<div class="col-md-12 fixed-div-1">
    <div class="form-row fixed-div">
        <div class="form-group col-md-4 img-box-divvv">
            <div class="white-box-divv"
                style="position: relative; background: white; height: 130px; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;, rgb(0 0 0 / 30%) 0px 3px 7px -3px;">
                <a href="javascript:void(0)" class="btn btn-sm btn-danger d-none"
                    style="position: absolute; top:0px; right:0px; opacity:0.8;">X</a>
            </div>
            <div class="upload-btn"
                style="position: relative; text-align: center; color: #fff; padding: 20px; border-radius: 4px; background: #626262;">
                Upload Image
                <input type="file" name="cover_media_img[]" class="file-control file2222" multiple
                    style="cursor: pointer; position: absolute; left: 0; top: 0; opacity: 0; width: 100%; height: 100%; border: solid 1px white;">
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="list_info">Video url:</label>
            <input type="text" name="cover_media_vid_url[]" class="form-control filter-input" id="available_units"
                placeholder="Video url">
            @error('available_units')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group col-md-2 float-right">
            <a href="javascript:void(0)" class="btn btn-sm btn-danger remove-media-btn"
                    style="position: absolute; top:0px; right:0px; opacity:0.8;">X</a>
        </div>
    </div>
</div>
`);
        });


        $(document).on("change", ".file2222", function() {
        var output = "";
        var uploadFile = $(this);
        var arr = this.files;
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test(files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function() { // set image data as background of div
                uploadFile.closest(".img-box-divvv").find('.white-box-divv').css({
                    "background-image": "url(" + this.result + ")",
                    "background-size": "cover"
                });
            }
        }
    });


    $(document).on('click','.remove-media-btn',function (){
        $(this).parents('.fixed-div-1').remove();
        $(this).remove();
    });
    </script>
@endpush
