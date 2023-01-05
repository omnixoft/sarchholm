<div class="col-md-12 img-box-divvv">
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

        <div class="form-group col-md-8 float-right">
            <label for="list_info">Video url:</label>
            <input type="text" name="cover_media_vid_url[]" class="form-control filter-input" id="available_units"
                placeholder="Video url">
            @error('available_units')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
