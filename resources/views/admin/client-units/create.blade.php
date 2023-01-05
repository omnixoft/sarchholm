@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Send units to client :</h5>
                        </div>


                        <div class="db-add-listing">
                            <form action="{{ route('admin.client-units.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Client Name:</label>@include('required')
                                            <input type="text" name="name"
                                                class="form-control filter-input {{ $errors->has('name') ? 'has-error' : '' }}"
                                                placeholder="Client Name">
                                            @if ($errors->has('name'))
                                                <span class="help-block text-danger">
                                                    <strong> {{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Project</label><span class="text-danger">*</span>
                                        <select name="project_id"
                                            class="listing-input hero__form-input  form-control custom-select">
                                            <option selected disabled hidden>Select Project</option>
                                            @foreach ($projects as $u)
                                                <option value="{{ $u->id }}">{{ $u->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('project_id'))
                                            <span class="help-block text-danger">
                                                <strong> Project is required </strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label>Unit</label><span class="text-danger">*</span>
                                        <select name="unit_id"
                                            class="listing-input hero__form-input  form-control custom-select">
                                            <option selected disabled hidden>Select Unit</option>
                                            @foreach ($units as $u)
                                                <option value="{{ $u->id }}">{{ $u->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('unit_id'))
                                            <span class="help-block text-danger">
                                                <strong> Unit is required </strong>
                                            </span>
                                        @endif
                                    </div>


                                    <div class="col-md-6">
                                        <label>Client Phone</label>
                                        <input type="number" name="phone" class="form-control filter-input"
                                            placeholder="Client Phone">
                                    </div>

                                </div>
                                <div class="row mt-3">
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
