@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
                <ul class="act-wrap mt-3">
                    @can('zeroCredit')
                        <div class="alert alert-warning" role="alert">
                            Please <span class="review-stat">add your credit to create your own posts here:</span>
                            <a href="{{url('admin/credits')}}" style="color:blue">Add Credit</a>
                        </div>
                    @endcan
                </ul>
                <div class="act-title d-flex justify-content-between">
                    <h5>Properties</h5><br>

                    @can('hasCredit')<a href="{{route('admin.properties.create')}}" class="btn v3">Add Property</a>@endcan
                </div>

                <div class="invoice-body">
                    
                </div>
                <div class="table-responsive">
                        <table class="invoice-table table" id="propertis_table">
                            <thead>
                            <tr class="invoice-headings">
                                <th style="max-width:105px">Action</th>
                                <th>User</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Package</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th style="max-width:100px">Status</th>
                                <th>Moderation Status</th>
                                <th>Remaining Time</th>
                                <th>Is Featured</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    (function($){
        "use strict";
        $('#propertis_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax:{
                url: "{{  route('admin.properties.index') }}"
            },
            columns:[
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
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
                    data: 'category',
                    name: 'category'
                },
                {
                    data: 'package',
                    name: 'package'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action1',
                    name: 'action1'
                },
                {
                    data: 'remainingTime',
                    name: 'remainingTime'
                },
                {
                    data: 'featured',
                    name: 'featured'
                }

            ]
        });
    })(jQuery);
</script>
@endpush