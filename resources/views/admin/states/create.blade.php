@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>State :</h5>
                        </div>
                        <div class="db-add-listing">
                            <form action="{{route('admin.states.store')}}" method="POST">
                                @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Country:</label><span class="text-danger">*</span>
                                        <select name="country_id" class="listing-input hero__form-input  form-control custom-select {{ $errors->has('country_id') ? 'has-error' : '' }}">
                                            <option value="">Select</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->country_id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('country_id'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('country_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>State Name:</label><span class="text-danger">*</span>
                                        <input type="text" name="name" class="form-control filter-input {{ $errors->has('name') ? 'has-error' : '' }}" placeholder="State Name" value="{{old('name')}}">
                                        @if($errors->has('name'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Status</label><span class="text-danger">*</span>
                                    <select name="status" class="listing-input hero__form-input  form-control custom-select {{ $errors->has('status') ? 'has-error' : '' }}">
                                        <option value="">Select</option>
                                        <option value="1">Published</option>
                                        <option value="0">Pending</option>
                                    </select>
                                    @if($errors->has('status'))
                                        <span class="help-block text-danger">
                                            <strong> {{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
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