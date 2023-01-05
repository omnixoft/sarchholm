@extends('admin.main')

@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Add New Inventory:</h5>
                        </div>
                        <div class="db-add-listing">
                            <form action="{{ route('admin.inventory.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Project:</label>@include('required')
                                            <select name="project_id" class="listing-input hero__form-input  form-control custom-select select-project {{ $errors->has('building_id') ? 'has-error' : '' }}">
                                                <option selected disabled hidden>Select Project</option>
                                                @foreach ($Projects as $b)
                                                    <option value="{{$b->id}}">{{$b->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('project_id')
                                                <p class="text-danger">Project is required</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group select-project-building">
                                            <label>Project Building:</label>@include('required')

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Unit name or Code:</label>@include('required')
                                            <input type="text" name="name" class="form-control filter-input"
                                                id="name" placeholder="Unit name or Code">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>SQM:</label> @include('required')
                                            <input type="text" name="sqm" class="form-control filter-input"
                                                id="location" placeholder="Location">
                                            @error('sqm')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="list_info">Price:</label>@include('required')
                                            <input type="number" name="price" class="form-control filter-input"
                                                id="available_units" placeholder="Price">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="list_info">Discounted Price:</label>
                                            <input type="number" name="discount_price" class="form-control filter-input"
                                                id="available_units" placeholder="Discounted Price">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group col-md-6 img-box-divvv">
                                            <div class="white-box-divv"
                                                style="position: relative; background: white; height: 130px; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;, rgb(0 0 0 / 30%) 0px 3px 7px -3px;">
                                            </div>
                                            <div class="upload-btn"
                                                style="position: relative; text-align: center; color: #fff; padding: 20px; border-radius: 4px; background: #626262;">
                                                Upload Image
                                                <input type="file" name="image[]" class="file-control file2222"
                                                    multiple
                                                    style="cursor: pointer; position: absolute; left: 0; top: 0; opacity: 0; width: 100%; height: 100%; border: solid 1px white;">
                                            </div>
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 media-div">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-primary add-more-imgs">Add More Images</button>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description:</label>
                                            <textarea name="description" class="form-control filter-input" placeholder="Description" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Unit Material:</label>@include('required')
                                            <input type="text" name="material" class="form-control filter-input"
                                                id="name" placeholder="Unit Material">
                                            @error('material')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Building:</label>@include('required')
                                            <select name="available" class="listing-input hero__form-input  form-control custom-select">
                                                <option selected disabled hidden>Select Availability</option>
                                                <option value="1">Available</option>
                                                <option value="0">Not Available</option>
                                            </select>
                                            @error('available')
                                                <p class="text-danger">{{ $message }}</p>
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
    <script type="text/javascript">

        $(document).on('click','.add-more-imgs',function(){
            $(this).parents('.media-div').before(`<div class="col-md-6 fixed-div-1">
                                        <div class="form-group col-md-6 img-box-divvv">
                                            <div class="white-box-divv"
                                                style="position: relative; background: white; height: 130px; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;, rgb(0 0 0 / 30%) 0px 3px 7px -3px;">
                                                <a href="javascript:void(0)" class="btn btn-sm btn-danger remove-media-btn"
                    style="position: absolute; top:0px; right:0px; opacity:0.8;">X</a>
                                            </div>
                                            <div class="upload-btn"
                                                style="position: relative; text-align: center; color: #fff; padding: 20px; border-radius: 4px; background: #626262;">
                                                Upload Image
                                                <input type="file" name="image[]" class="file-control file2222"
                                                    multiple
                                                    style="cursor: pointer; position: absolute; left: 0; top: 0; opacity: 0; width: 100%; height: 100%; border: solid 1px white;">
                                            </div>
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
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

    $(document).on('change','select.select-project',function (e) {
        let project_id = $(this).children('option:selected').val();
        $.ajax({
            type: "GET",
            url: "{{ url('/admin/units/get-buildings') }}",
            data: {project_id:project_id},
            success: function (data) {
                $('.select-project-building').html(data);
            }
        });
    });
    </script>
@endpush
