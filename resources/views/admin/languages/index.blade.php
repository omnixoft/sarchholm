@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Languages</h5><br>

                            <a href="{{route('admin.blogs.create')}}" class="btn btn-primary">Add</a>
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table" id="package_table">
                                    <thead>
                                    <tr class="invoice-headings">
                                        <th>Sl</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th style="max-width:100px">Status</th>
                                        <th style="max-width:100px">Action</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('#package_table').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "{{  route('admin.blogs.index') }}"
            },
            columns:[
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {
                    data: 'parent',
                    name: 'parent'
                },
                {
                    data: 'user',
                    name: 'user'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'action1',
                    name: 'action1'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]
        });
    });
</script>

@endpush



@extends('translation::layout')

@section('body')

    @if(count($languages))

        <div class="panel w-1/2">

            <div class="panel-header">

                {{ __('translation::translation.languages') }}

                <div class="flex flex-grow justify-end items-center">

                    <a href="{{ route('admin.languages.create') }}" class="button">
                        {{ __('translation::translation.add') }}
                    </a>

                </div>

            </div>

            <div class="panel-body">

                <table>

                    <thead>
                    <tr>
                        <th>{{ __('translation::translation.language_name') }}</th>
                        <th>{{ __('translation::translation.locale') }}</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($languages as $language)
                        <tr>
                            <td>
                                {{ $language['name'] }}
                            </td>
                            <td>
                                <a href="{{ route('languages.translations.index', $language) }}">
                                    {{ $language }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>

    @endif

@endsection