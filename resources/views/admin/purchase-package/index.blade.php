@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>My Packages</h5><br>

                            <a href="{{route('admin.credits.index')}}" class="btn v3">Purchase Package</a>
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table" id="country_table">
                                    <thead>
                                    <tr class="invoice-headings">
                                        <th>Sl</th>
                                        <th>User</th>
                                        <th>Package</th>
                                        <th style="max-width:100px">Status</th>
                                        <th>Credit Left</th>
                                        <th>Listing Left</th>
                                        <th>Expire at</th>
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
        $('#country_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax:{
                url: "{{  route('admin.my-packages.index') }}"
            },

            columns:[
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {
                    data: 'user',
                    name: 'user'
                },
                {
                    data: 'package',
                    name: 'package'
                },
                {
                    data: 'action',
                    name: 'action'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'item',
                    name: 'item'
                },
                {
                    data: 'remainingTime',
                    name: 'remainingTime'
                }
            ]
        });
    })(jQuery);
</script>
@endpush