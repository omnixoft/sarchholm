<div class="form-group">
    <div class="card">
        <h5 class="card-header bg-white">Paystack</h5>
        <div class="card-body">
            <h5 class="card-title">Configuration instruction for Paystack</h5>
            <p class="card-text">
               <span>To use Paystack, you need:</span><br>
                <a href="https://dashboard.paystack.com/#/signup" style="color:rgb(0, 140, 255)" target="_blank">1.Register with Paystack</a><br>
                2.After registration at Paystack, you will have Public, Secret keys from <a href="https://dashboard.paystack.co/#/settings/developer" target="_blank" style="color:rgb(0, 140, 255)">here</a><br>
                3.Enter Public, Secret keys by Clicking Edit button below:<br>


            </p>
            <a class="btn v3" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">Edit</a>
            <div class="collapse mt-4" id="collapseExample3">
                <div class="card card-body">
                    <form id="paystackSubmit">
                        @csrf
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Merchant Email<span class="text-danger">*</span></b></label>
                            <div class="col-sm-8">
                                <input type="text" name="merchant_email" class="form-control"  value="{{env('MERCHANT_EMAIL')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Paystack Public Key<span class="text-danger">*</span></b></label>
                            <div class="col-sm-8">
                                <input type="text" name="public_key" class="form-control"  value="{{env('PAYSTACK_PUBLIC_KEY')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><b>Paystack Secret Key<span class="text-danger">*</span></b></label>
                            <div class="col-sm-8">
                                <input type="text" name="secret_key" class="form-control" value="{{env('PAYSTACK_SECRET_KEY')}}">
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
