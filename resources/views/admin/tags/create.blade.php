@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Add Tag:</h5>
                        </div>
                        <div class="db-add-listing">
                            <form action="{{route('admin.tags.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name:</label> <span class="text-danger">*</span>
                                            <input type="text" name="name" class="form-control filter-input" placeholder="Name">
                                            @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Status</label>
                                        <select class="listing-input hero__form-input  form-control custom-select" name="status">
                                            <option value="">Select</option>
                                            <option value="1">Published</option>
                                            <option value="0">Pending</option>
                                        </select>
                                        @error('status')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Order:</label>
                                            <input type="number" name="order" class="form-control filter-input" value="0">
                                        </div>
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