@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Payment Term :</h5>
                        </div>


                        <div class="db-add-listing">
                            <form action="{{route('admin.payment-terms.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Term Name:</label>@include('required')
                                        <input type="text" name="name" class="form-control filter-input {{ $errors->has('name') ? 'has-error' : '' }}" placeholder="Term Name">
                                        @if($errors->has('name'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Term Down Payment:</label>@include('required')
                                        <input type="number" name="down_payment" class="form-control filter-input {{ $errors->has('down_payment') ? 'has-error' : '' }}" placeholder="Term Down Payment">
                                        @if($errors->has('down_payment'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('down_payment') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Term Max Installments:</label>@include('required')
                                        <input type="number" name="max_installments" class="form-control filter-input {{ $errors->has('max_installments') ? 'has-error' : '' }}" placeholder="Term Max Installments">
                                        @if($errors->has('max_installments'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('max_installments') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-5">
                                    <div class="add-btn">
                                        <button class="btn v3">SAVE</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection