@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Edit Currency :</h5>
                        </div>


                        <div class="db-add-listing">
                            <form action="{{route('admin.currencies.update',$currency->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="local" value="{{$locale}}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Currency Name:</label>
                                            <input type="text" name="name" class="form-control filter-input" placeholder="Enter currency name" value="{{$currency->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Icon:</label>
                                            <input type="text" name="icon" class="form-control filter-input" placeholder="Enter currency symbol" value="{{$currency->icon}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-5">
                                        <div class="add-btn">
                                            <button class="btn v3">UPDATE</button>
                                            <a href="{{route('admin.currencies.index')}}" class="btn v3">Back</a>
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
