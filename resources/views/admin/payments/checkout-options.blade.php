<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Checkout Options</title>
</head>
<body>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-6 offset-3">
            <h3>Select Payment Options</h3>
            <hr>

            <form role="form" action="{{ route('admin.checkout.stripe') }}" method="post" class="validation"
                  data-cc-on-file="false"
                  data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                  id="payment-form">
                @csrf
                <input type="hidden" name="package_id" class="user_id" value="{{$paymentInfo['package_id']}}">
                <input type="hidden" name="expire_at" class="user_id" value="{{$paymentInfo['expire_at']}}">
                <input type="hidden" name="price" class="user_id" value="{{$paymentInfo['price']}}">
                <input type="hidden" name="item" class="user_id" value="{{$paymentInfo['item']}}">
                <input type="hidden" name="user_id" class="user_id" value="{{$paymentInfo['user_id']}}">
                <input type="hidden" name="credited_by" class="credited_by" value="{{$paymentInfo['credited_by']}}">
                <input type="hidden" name="amount" class="amount" value="{{$paymentInfo['amount']}}">
                <input type="hidden" name="description" class="amount" value="added by {{$paymentInfo['description']}}">
                <input type="hidden" name="validity" class="amount" value="added by {{$paymentInfo['validity']}}">
                <button class="btn btn-primary">Stripe</button>
            </form>
            <br>
            <form role="form" action="{{ route('admin.checkout.paypal') }}" method="post" class="validation"
                  data-cc-on-file="false"
                  data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                  id="payment-form">
                @csrf
                <input type="hidden" name="package_id" class="user_id" value="{{$paymentInfo['package_id']}}">
                <input type="hidden" name="expire_at" class="user_id" value="{{$paymentInfo['expire_at']}}">
                <input type="hidden" name="price" class="user_id" value="{{$paymentInfo['price']}}">
                <input type="hidden" name="item" class="user_id" value="{{$paymentInfo['item']}}">
                <input type="hidden" name="user_id" class="user_id" value="{{$paymentInfo['user_id']}}">
                <input type="hidden" name="credited_by" class="credited_by" value="{{$paymentInfo['credited_by']}}">
                <input type="hidden" name="amount" class="amount" value="{{$paymentInfo['amount']}}">
                <input type="hidden" name="description" class="amount" value="added by {{$paymentInfo['description']}}">
                <input type="hidden" name="validity" class="amount" value="added by {{$paymentInfo['validity']}}">
                <button class="btn btn-primary">Paypal</button>
            </form>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
