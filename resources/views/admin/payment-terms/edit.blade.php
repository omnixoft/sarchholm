@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Edit Payment Term :</h5>
                        </div>


                        <div class="db-add-listing">
                            <form action="{{route('admin.payment-terms.update',$paymentTerm->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="local" value="{{$locale}}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Term Name:</label>
                                            <input type="text" name="name" class="form-control filter-input" placeholder="Term Name" value="{{isset($paymentTermTranslation->name) ? $paymentTermTranslation->name : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Term Down Payment:</label>
                                            <input type="number" name="down_payment" class="form-control filter-input" placeholder="Term Down Payment" value="{{isset($paymentTermTranslation->down_payment) ? $paymentTermTranslation->down_payment : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Term Max Installments:</label>
                                            <input type="number" name="max_installments" class="form-control filter-input" placeholder="Term Max Installments" value="{{isset($paymentTermTranslation->max_installments) ? $paymentTermTranslation->max_installments : ''}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-5">
                                        <div class="add-btn">
                                            <button class="btn v3">SAVE</button>
                                            <a href="{{route('admin.payment-terms.index')}}" class="btn v3">Back</a>
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