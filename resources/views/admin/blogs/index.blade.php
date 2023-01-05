@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Blogs</h5><br>

                            <a href="{{route('admin.blogs.create')}}" class="btn v3">Add New Blog</a>
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table" id="package_table">
                                    <thead>
                                    <tr class="invoice-headings">
                                        <th style="max-width:100px">Action</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>Title</th>
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
                url: "{{  route('admin.blogs.index') }}"
            },
            columns:[
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
                {
                    data: 'category',
                    name: 'category'
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
                }
            ]
        });
    })(jQuery);
</script>

@endpush
