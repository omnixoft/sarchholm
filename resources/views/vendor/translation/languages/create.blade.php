@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Add New Language:</h5>
                        </div>
                        <div class="db-add-listing">
                            <form action="{{route('admin.languages.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            @include('translation::forms.language-create', ['field' => 'name', 'label' => __('translation::translation.language_name'), ])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            @include('translation::forms.language-create', ['field' => 'locale', 'label' => __('translation::translation.locale'), ])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-check-input" type="checkbox" name="default" id="default" value="1" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">Default Language</label>
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