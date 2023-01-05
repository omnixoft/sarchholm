@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Project Landmarks</h5><br>

                            <a href="javascript:void(0)" class="btn v3" data-toggle="modal"
                                data-target="#addProjectLandmark">Add New Project Landmark</a>
                        </div>
                        <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Project</a></li>
                            <li class="breadcrumb-item">{{$project->name}}</li>
                            <li class="breadcrumb-item active" aria-current="page">Project Landmarks</li>
                          </ol>
                        </nav>
                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table" id="package_table">
                                    <thead>
                                        <tr class="invoice-headings">
                                            <th style="max-width:100px">Action</th>
                                            <th>Landmark name</th>
                                            <th>Location</th>
                                            <th>Duration to this location in minutes </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="addProjectLandmark">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Project Landmark</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="db-add-list-wrap">
                                <div class="act-title">
                                </div>
                                <div class="db-add-listing">
                                    <form action="{{ url('admin/projects/landmark/save/' . $project_id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Landmark name:</label>
                                                    <input type="text" name="name" class="form-control filter-input"
                                                        id="name" placeholder="Landmark Name">
                                                    @error('name')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Map Location:</label> <span class="text-danger">*</span>
                                                    <input type="text" name="map_location"
                                                        class="form-control filter-input" id="location"
                                                        placeholder="Map Location">
                                                    @error('map_location')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="list_info">Duration to this location in minutes:</label>
                                                    <span class="text-danger">*</span>
                                                    <input type="number" name="location_minutes"
                                                        class="form-control filter-input" id="available_units"
                                                        placeholder="Duration to this location in minutes">
                                                    @error('location_minutes')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group col-md-6 img-box-divvv">
                                                    <div class="white-box-divv"
                                                        style="position: relative; background: white; height: 130px; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;, rgb(0 0 0 / 30%) 0px 3px 7px -3px;">
                                                    </div>
                                                    <div class="upload-btn"
                                                        style="position: relative; text-align: center; color: #fff; padding: 20px; border-radius: 4px; background: #626262;">
                                                        Upload Image
                                                        <input type="file" name="location_image"
                                                            class="file-control file2222" multiple
                                                            style="cursor: pointer; position: absolute; left: 0; top: 0; opacity: 0; width: 100%; height: 100%; border: solid 1px white;">
                                                    </div>
                                                    @error('location_image')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="user-image mb-3 text-center">
                                                    <img loading="lazy" alt="" id="preview-image-before-upload">
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
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="editProjectLandmark">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Project Landmark</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        (function($) {
            "use strict";
            $('#package_table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "{{ url('admin/projects/landmarks/' . $project_id) }}"
                },
                columns: [{
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'map_location',
                        name: 'map_location'
                    },
                    {
                        data: 'location_minutes',
                        name: 'location_minutes'
                    }
                ]
            });
        })(jQuery);


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


        $(document).on('click','.edit-project-landmark',function(e){
            let project_id = $(this).attr('data');
            $.ajax({
                type: "GET",
                url: "{{ url('admin/projects/landmarks/edit') }}"+'/'+project_id,
                data: {project_id:project_id},
                success: function (data) {
                    $('#editProjectLandmark').find('.modal-body').html(data);
                    $('#editProjectLandmark').modal('show');
                }
            });
        });
    </script>
@endpush
