@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Client Units</h5><br>

                            <a href="{{route('admin.client-units.create')}}" class="btn v3">Send Units to client</a>
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table" id="country_table">
                                    <thead>
                                    <tr class="invoice-headings">
                                        <th style="max-width:100px">Action</th>
                                        <th>Link</th>
                                        <th>Name</th>
                                        <th>Unit</th>
                                        <th>Project</th>
                                        <th>Phone</th>
                                         <th>Visits</th>
                                          <th>Duration</th>
                                          <th>Likes</th>
                                          <th>Request For Calls</th>
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
    
    <div class="modal" tabindex="-1" role="dialog" id="showLink">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="name" class="form-control filter-input" id="shareableFileInput">
                            <button class="btn btn-sm btn-info copy-link mt-2">Copy Link</button>
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
                url: "{{  route('admin.client-units.index') }}"
            },
            columns:[
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
                {
                    data: 'link',
                    name: 'link'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'unit',
                    name: 'unit'
                },
                {
                    data: 'project',
                    name: 'project'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'visits',
                    name: 'visits'
                },
                {
                    data: 'duration',
                    name: 'duration'
                },
                 {
                    data: 'likes',
                    name: 'likes'
                },
                {
                    data: 'api_call_req',
                    name: 'api_call_req'
                }
            ]
        });
    })(jQuery);
    
    $(document).on('click','.show-unit-link',function(){
        let link = $(this).attr('data');
        $('#shareableFileInput').val(link);
        $('#showLink').modal('show');
    });
    
    $(document).on('click','.copy-link',function(){
        $('#shareableFileInput').focus();
        $('#shareableFileInput').select();
        document.execCommand('copy');
    });
</script>

@endpush
