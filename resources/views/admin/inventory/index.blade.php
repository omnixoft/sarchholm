@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Inventories</h5><br>

                            <a href="{{route('admin.inventory.create')}}" class="btn v3">Add New Inventory</a>
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table" id="package_table">
                                    <thead>
                                    <tr class="invoice-headings">
                                        <th style="max-width:100px">Action</th>
                                        <th>Unit Name or Code</th>
                                        <th>Builing</th>
                                        <th>Project</th>
                                        <th>SQM</th>
                                        <th>Price</th>
                                        <th>Available</th>
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
                url: "{{    route('admin.inventory.index') }}"
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
                    data: 'building',
                    name: 'building'
                },
                {
                    data: 'project',
                    name: 'project'
                },
                {
                    data: 'sqm',
                    name: 'sqm'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'available',
                    name: 'available'
                }
            ]
        });
    })(jQuery);
</script>

@endpush
