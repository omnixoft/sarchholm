<div class="row">
    <div class="col-md-12">
        <div class="db-add-list-wrap">
            <div class="act-title">
                <h5>Add New Project Amenity:</h5>
            </div>
            <div class="db-add-listing">
                <form action="{{ url('admin/projects/amenities/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Amenity name:</label>
                                <input type="text" name="name" value="{{ $row->name }}" class="form-control filter-input"
                                    id="name" placeholder="Amenity Name">
                                @error('name')
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
                        <input type="hidden" name="eximg" value="{{ $row->image }}">
                        <div class="col-md-12">
                            <div class="form-group col-md-6 img-box-divvv">
                                <div class="white-box-divv"
                                    style="position: relative; background-image:url('{{ asset('amenities/'.$row->image) }}'); background-size:cover; height: 130px; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;, rgb(0 0 0 / 30%) 0px 3px 7px -3px;">
                                </div>
                                <div class="upload-btn"
                                    style="position: relative; text-align: center; color: #fff; padding: 20px; border-radius: 4px; background: #626262;">
                                    Upload Image
                                    <input type="file" name="image" class="file-control file2222"
                                        multiple
                                        style="cursor: pointer; position: absolute; left: 0; top: 0; opacity: 0; width: 100%; height: 100%; border: solid 1px white;">
                                </div>
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="user-image mb-3 text-center">
                                <img loading="lazy" alt="" id="preview-image-before-upload">
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $row->id }}">
                        <div class="col-md-12 mb-5">
                            <div class="add-btn">
                                <button class="btn v3">UPDATE</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
