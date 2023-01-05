@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Blog Categories</h5><br>

                            <a href="{{route('admin.blog-categories.create')}}" class="btn v3">Add Blog Category</a>
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table" id="package_table">
                                    <thead>
                                    <tr class="invoice-headings">
                                        <th style="max-width:100px">Action</th>
                                        <th>Name</th>
                                        <th>Parent</th>
                                        <th style="max-width:100px">Status</th>
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
        $('#package_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,

            ajax:{
                url: "{{  route('admin.blog-categories.index') }}"
            },
            columns:[
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'parent',
                    name: 'parent'
                },
                {
                    data: 'action1',
                    name: 'action1'
                }
            ]
        });
    })(jQuery);
</script>

@endpush
