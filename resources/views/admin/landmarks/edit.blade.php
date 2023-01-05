<div class="row">
    <div class="col-md-12">
        <div class="db-add-list-wrap">
            <div class="act-title">
            </div>
            <div class="db-add-listing">
                <form action="{{ url('admin/projects/landmark/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Landmark name:</label>
                                <input type="text" name="name" value="{{ $row->name }}" class="form-control filter-input"
                                    id="name" placeholder="Landmark Name">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Map Location:</label> <span class="text-danger">*</span>
                                <input type="text" name="map_location" value="{{ $row->map_location }}" class="form-control filter-input"
                                    id="location" placeholder="Map Location">
                                @error('map_location')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="list_info">Duration to this location in minutes:</label> <span
                                    class="text-danger">*</span>
                                <input type="number" name="location_minutes" value="{{ $row->location_minutes }}" class="form-control filter-input"
                                    id="available_units" placeholder="Duration to this location in minutes">
                                @error('location_minutes')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="eximg" value="{{ $row->location_image }}">
                        <div class="col-md-12">
                            <div class="form-group col-md-6 img-box-divvv">
                                <div class="white-box-divv"
                                    style="position: relative; background-image:url('{{ asset('landmark/'.$row->location_image) }}'); background-size:cover; height: 130px; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;, rgb(0 0 0 / 30%) 0px 3px 7px -3px;">
                                </div>
                                <div class="upload-btn"
                                    style="position: relative; text-align: center; color: #fff; padding: 20px; border-radius: 4px; background: #626262;">
                                    Upload Image
                                    <input type="file" name="location_image" class="file-control file2222"
                                        multiple
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
