<div class="form-group">
    <div class="card">
        <h5 class="card-header bg-white">Razorpay</h5>
        <div class="card-body">
            <h5 class="card-title">Configuration instruction for Razorpay</h5>
            <p class="card-text">
               <span>First you need to create account on razorpay. then you can easily get account key id and key secret:</span><br>
                1.Create Account from <a href="https://www.razorpay.com" style="color:rgb(0, 140, 255)" target="_blank">here</a>.<br>
                2.After registration at Razorpay, you will have  key id and key secret from <a href="https://dashboard.razorpay.com/app/keys" target="_blank" style="color:rgb(0, 140, 255)">here</a><br>
                3.Enter Public, Secret keys by Clicking Edit button below:<br>


            </p>
            <a class="btn v3" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4">Edit</a>
            <div class="collapse mt-4" id="collapseExample4">
                <div class="card card-body">
                    <form id="razorpaySubmit">
                        @csrf
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Razorpay Key<span class="text-danger">*</span></b></label>
                            <div class="col-sm-8">
                                <input type="text" name="public_key" class="form-control"  value="{{env('RAZORPAY_KEY')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><b>Razorpay Secret<span class="text-danger">*</span></b></label>
                            <div class="col-sm-8">
                                <input type="text" name="secret_key" class="form-control" value="{{env('RAZORPAY_SECRET')}}">
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
