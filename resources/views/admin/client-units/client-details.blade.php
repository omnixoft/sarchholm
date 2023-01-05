@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Clients Unit Detail</h5><br>
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table" id="country_table">
                                    <thead>
                                    <tr class="invoice-headings">
                                        <th style="max-width:100px">Project Link</th>
                                        <th>Client name</th>
                                        <th>Client phone</th>
                                        <th>Project</th>
                                        <th>Unit</th>
                                        <th>Vists</th>
                                        <th>Duration</th>
                                        <th>Request For Call</th>
                                        <th>Likes</th>
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
                url: "{{  route('admin.clients-unit-detail.index') }}"
            },
            columns:[
                {
                    data: 'action',
                    name: 'action',                    
                    orderable: false
                },
                {
                    data: 'client_name',
                    name: 'client_name',
                },
                {
                    data: 'client_phone',
                    name: 'client_phone'
                },
                {
                    data: 'project',
                    name: 'project'
                },
                {
                    data: 'unit',
                    name: 'unit'
                },
                {
                    data: 'vists',
                    name: 'vists'
                },
                {
                    data: 'duration',
                    name: 'duration',
                    orderable: false
                },
                {
                    data: 'request_for_call',
                    name: 'request_for_call'
                },
                {
                    data: 'like',
                    name: 'like'
                },
                
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
