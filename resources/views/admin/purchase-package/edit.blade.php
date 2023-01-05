@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('admin.packages.update',$package->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="db-add-list-wrap">
                            <div class="act-title">
                                <h5>Edit Package :</h5>
                            </div>
                            <div class="db-add-listing">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                            <label>Package Name:</label>
                                            <input type="text" name="name" value="{{$package->name}}" class="form-control filter-input" placeholder="Package Name">
                                            @if($errors->has('name'))
                                                <span class="help-block text-danger">
                                            <strong> {{ $errors->first('name') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Package Type: </label>
                                        <select class="listing-input hero__form-input form-control custom-select {{ $errors->has('package_type') ? 'has-error' : '' }}" name="package_type">
                                            <option value="">Select</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="yearly">Yearly</option>
                                        </select>
                                        @if($errors->has('package_type'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('package_type') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                                            <label>Price</label>
                                            <input type="text" name="price" value="{{$package->price}}" class="form-control filter-input" placeholder="Package Price">
                                            @if($errors->has('price'))
                                                <span class="help-block text-danger">
                                            <strong> {{ $errors->first('price') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Currency</label>
                                        <select class="listing-input hero__form-input  form-control custom-select {{ $errors->has('currency_id') ? 'has-error' : '' }}" name="currency_id">
                                            <option value="">Select</option>
                                            <option value="1">BDT</option>
                                            <option value="2">USD</option>
                                        </select>
                                        @if($errors->has('currency_id'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('currency_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Property Listing:</label>
                                            <input type="text" name="listing" value="{{$package->listing}}" class="form-control filter-input" placeholder="Hom many Listing">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Featured Property: </label>
                                            <input type="text" name="featured" value="{{$package->featured}}" class="form-control filter-input" placeholder="How Many Featured Property">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Status:</label>
                                        <select class="listing-input hero__form-input  form-control custom-select" name="status">
                                            <option value="1">Published</option>
                                            <option value="0">Pending</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <label>Order:</label>
                                        <input type="number" name="order" value="{{$package->order}}" class="form-control filter-input">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="db-add-list-wrap">
                            <div class="db-add-listing">
                                <div class="row">
                                    <div class="col-md-12 mb-5">
                                        <div class="add-btn">
                                            <button class="btn v3">SAVE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection