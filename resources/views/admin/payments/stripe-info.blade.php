<div class="form-group">
    <div class="card">
        <h5 class="card-header bg-white">Stripe</h5>
        <div class="card-body">
            <h5 class="card-title">Configuration instruction for Stripe</h5>
            <p class="card-text">
               <span>To use Stripe, you need:</span><br>
                <a href="https://dashboard.stripe.com/register" target="_blank">1.Register with Stripe</a><br>
                2.After registration at Stripe, you will have Public, Secret keys<br>
                3.Enter Public, Secret keys by Clicking Edit button below:<br>


            </p>
            <a class="btn v3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Edit</a>
            <div class="collapse mt-4" id="collapseExample">
                <div class="card card-body">
                    <form id="stripSubmit">
                        @csrf
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Status</b></label>
                            <div class="col-sm-8">
                                <div class="form-check mt-1">
                                    <input type="checkbox" value="1" name="status" @isset($setting_strip->status) {{$setting_strip->status=="1" ? 'checked':''}} @endisset class="form-check-input">
                                    <label class="p-0 form-check-label" for="exampleCheck1">Enable Strip</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><b>Label <span class="text-danger">*</span></b></label>
                            <div class="col-sm-8">
                                <input type="text" name="label" class="form-control" @isset($setting_strip->label) value="{{$setting_strip->label}}" @endisset>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><b>Description <span class="text-danger">*</span></b></label>
                            <div class="col-sm-8">
                                <textarea name="description" cols="30" rows="10" class="form-control">@isset($setting_strip->description) {{$setting_strip->description}} @endisset</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Stripe Key<span class="text-danger">*</span></b></label>
                            <div class="col-sm-8">
                                <input type="text" name="publishable_key" class="form-control"  value="{{env('STRIPE_KEY')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><b>Secret<span class="text-danger">*</span></b></label>
                            <div class="col-sm-8">
                                <input type="text" name="secret_key" class="form-control" value="{{env('STRIPE_SECRET')}}">
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
