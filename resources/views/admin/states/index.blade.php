@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>States</h5><br>

                            <a href="{{route('admin.states.create')}}" class="btn v3">Add State</a>
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table" id="country_table">
                                    <thead>
                                    <tr class="invoice-headings">
                                        <th style="max-width:100px">Action</th>
                                        <th>Country</th>
                                        <th>State</th>
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
        $('#country_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,

            ajax:{
                url: "{{  route('admin.states.index') }}"
            },
            columns:[
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
                {
                    data: 'country',
                    name: 'country.name'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'status',
                    name: 'status'
                }

            ]
        });
    })(jQuery);
</script>

@endpush