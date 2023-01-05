@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Facility :</h5>
                        </div>
                        <div class="db-add-listing">
                            <form action="{{route('admin.facilities.update',$facility->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="local" value="{{$locale}}">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Name:</label>@include('required')
                                            <input type="text" name="name" @if(isset($facilityTranslation->name)) value="{{$facilityTranslation->name}}" @else value="" @endif class="form-control filter-input" placeholder="Name">
                                            @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Status</label>@include('required')
                                        <select class="listing-input hero__form-input  form-control custom-select" name="status">
                                            <option value="">Select</option>
                                            <option value="1" {{$facility->status == 1 ? 'selected': ''}}>Active</option>
                                            <option value="0" {{$facility->status == 0 ? 'selected': ''}}>Inactive</option>
                                        </select>
                                        @error('status')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
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
