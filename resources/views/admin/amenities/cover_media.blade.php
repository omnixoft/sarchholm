<div class="col-md-6">
    <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control photo-upload" name="cover_media_img[]">
        @error('cover_media_img')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>Video Url</label>
        <input type="text" name="cover_media_vid_url[]" class="form-control filter-input"
            id="available_units" placeholder="Video Url">
        @error('cover_media_vid_url')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="col-md-12">
    <div class="user-image mb-3 text-center">
        <img loading="lazy" alt="" id="preview-image-before-upload">
    </div>
</div>


