<div class="form-group">
    <div class="card">
        <h5 class="card-header bg-white">Github</h5>
        <div class="card-body">
            <form class="socialSubmit">
                @csrf
                <input type="hidden" name="provider" value="github">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label"><b>GITHUB_CLIENT_ID<span class="text-danger">*</span></b></label>
                    <div class="col-sm-8">
                        <input type="text" name="client_id" class="form-control" value="{{env('GITHUB_CLIENT_ID')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label"><b>GITHUB_CLIENT_SECRET<span class="text-danger">*</span></b></label>
                    <div class="col-sm-8">
                        <input type="text" name="secret" class="form-control" value="{{env('GITHUB_CLIENT_SECRET')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8">
                        <button type="submit" class="btn v3">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>