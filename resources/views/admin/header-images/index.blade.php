@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Header Images</h5><br>

                            <a href="{{route('admin.header-images.create')}}" class="btn v3">Add</a>
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table" id="header_image_table">
                                    <thead>
                                    <tr class="invoice-headings">
                                        <th style="max-width:100px">Action</th>
                                        <th>Page</th>
                                        <th>Image</th>
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
    (function($){
        "use strict";
        $('#header_image_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax:{
                url: "{{  route('admin.header-images.index') }}"
            },
            columns:[
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
                {
                    data: 'page',
                    name: 'page'
                },
                {
                    data: 'Image',
                    name: 'Image'
                }
            ]
        });
    })(jQuery);
</script>

@endpush
