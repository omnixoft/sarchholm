<div class="form-group">
    <div class="card">
        <h5 class="card-header bg-white">Paypal</h5>
        <div class="card-body">
            <h5 class="card-title"> Configuration instruction for PayPal</h5>
            <p class="card-text">
                <span>To use PayPal, you need:</span><br>
                1. <a href="https://www.paypal.com/bizsignup/#/checkAccount" target="_blank">Register with PayPal</a><br>

                2.After registration at PayPal, you will have Client ID, Client Secret <br>

                3.Enter Client ID, Secret by Clicking Edit button below: <br>


            </p>
            <a class="btn v3" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">Edit</a>
            <div class="collapse mt-4" id="collapseExample1">
                <div class="card card-body">
                    <form id="paypalSubmit">
                        @csrf
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Status</b></label>
                            <div class="col-sm-8">
                                <div class="form-check mt-1">
                                    <input type="checkbox" value="1" name="status" @isset($setting_paypal->status) {{$setting_paypal->status=="1" ? 'checked':''}} @endisset class="form-check-input">
                                    <label class="p-0 form-check-label" for="exampleCheck1">Enable Paypal</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><b>Label <span class="text-danger">*</span></b></label>
                            <div class="col-sm-8">
                                <input type="text" name="label" class="form-control" @isset($setting_paypal->label) value="{{$setting_paypal->label}}" @endisset>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><b>Description <span class="text-danger">*</span></b></label>
                            <div class="col-sm-8">
                                <textarea name="description" cols="30" rows="10" class="form-control">@isset($setting_paypal->description) {{$setting_paypal->description}} @endisset</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Sandbox</b></label>
                            <div class="col-sm-8">
                                <div class="form-check mt-1">
                                    <input type="checkbox" value="1" name="sandbox" @isset($setting_paypal->sandbox) {{$setting_paypal->sandbox=="1" ? 'checked':''}} @endisset class="form-check-input">
                                    <label class="p-0 form-check-label" for="exampleCheck1">Enable Free Shipping</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><b>Client ID <span class="text-danger">*</span></b></label>
                            <div class="col-sm-8">
                                <input type="text" name="client_id" class="form-control" value="{{env('PAYPAL_CLIENT_ID')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><b>Secret<span class="text-danger">*</span></b></label>
                            <div class="col-sm-8">
                                <input type="text" name="secret" class="form-control" value="{{env('PAYPAL_SECRET')}}">
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
