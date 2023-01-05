@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Edit Page :</h5>
                        </div>


                        <div class="db-add-listing">
                            <form action="{{route('admin.pages.update',$page)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Page Name:</label>
                                            <input type="text" name="name" class="form-control filter-input" value="{{$page}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Choose Template: </label>
                                            <select class="listing-input hero__form-input form-control custom-select" name="layout">
                                                <option value="">Select</option>
                                                <option value="default" {{env('PROPERTIES_TEMPLATE')=='default' ? 'selected' : ''}}>Default</option>
                                                <option value="left-map" {{env('PROPERTIES_TEMPLATE')=='left-map' ? 'selected' : ''}}>Left Map</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-5">
                                        <div class="add-btn">
                                            <button class="btn v3">UPDATE</button>
                                            <a href="{{route('admin.pages.index')}}" class="btn v3">Back</a>
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
