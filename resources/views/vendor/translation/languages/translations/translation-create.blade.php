@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>{{ __('translation::translation.add_translation') }}
                            </h5>
                        </div>
                        <div class="db-add-listing">
                            <form action="{{route('admin.languages.translations.store',$language)}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            @include('translation::forms.text_file', ['field' => 'group', 'label' => __('translation::translation.group_label'), 'placeholder' => __('translation::translation.group_placeholder')])

                                            @include('translation::forms.text', ['field' => 'key', 'label' => __('translation::translation.key_label')])


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            @include('translation::forms.text', ['field' => 'value', 'label' => __('translation::translation.value_label')])
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
