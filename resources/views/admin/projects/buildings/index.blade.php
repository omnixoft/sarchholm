@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Buildings</h5><br>

                            <a href="javascript:void(0)" class="btn v3" data-toggle="modal" data-target="#addProjectBuilding">Add
                                Building</a>
                        </div>
                        <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Project</a></li>
                            <li class="breadcrumb-item">{{$project->name}}</li>
                            <li class="breadcrumb-item active" aria-current="page">Project Buildings</li>
                          </ol>
                        </nav>
                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table" id="payment_term_table">
                                    <thead>
                                        <tr class="invoice-headings">
                                            <th style="max-width:100px">Action</th>
                                            <th>Name</th>
                                            <th>Capacity</th>
                                            <th>Code</th>
                                            <th>Status</th>
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

    <div class="modal" tabindex="-1" role="dialog" id="addProjectBuilding">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Project Building</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="db-add-list-wrap">
                                <div class="act-title">
                                    <h5>Payment Term :</h5>
                                </div>


                                <div class="db-add-listing">
                                    <form action="{{ route('admin.projects.buildings.store', $project_id) }}"
                                        method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Terms:</label>@include('required')
                                                    <select name="payment_term_ids[]" multiple="multiple"
                                                        class="listing-input hero__form-input  form-control custom-select {{ $errors->has('building_id') ? 'has-error' : '' }}">
                                                        {{-- <option selected disabled hidden>Select Payment Term</option> --}}
                                                        @foreach ($terms as $b)
                                                            <option value="{{ $b->id }}">{{ $b->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('payment_term_ids')
                                                        <p class="text-danger">Payment term is required</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Name:</label>@include('required')
                                                    <input type="text" name="name"
                                                        class="form-control filter-input {{ $errors->has('name') ? 'has-error' : '' }}"
                                                        placeholder="Name">
                                                    @if ($errors->has('name'))
                                                        <span class="help-block text-danger">
                                                            <strong> {{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Capacity:</label>@include('required')
                                                    <input type="text" name="capacity"
                                                        class="form-control filter-input {{ $errors->has('capacity') ? 'has-error' : '' }}"
                                                        placeholder="Capacity">
                                                    @if ($errors->has('capacity'))
                                                        <span class="help-block text-danger">
                                                            <strong> {{ $errors->first('capacity') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description:</label>@include('required')
                                                    <input type="text" name="description"
                                                        class="form-control filter-input {{ $errors->has('description') ? 'has-error' : '' }}"
                                                        placeholder="Capacity">
                                                    @if ($errors->has('description'))
                                                        <span class="help-block text-danger">
                                                            <strong> {{ $errors->first('description') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Code:</label>@include('required')
                                                    <input type="text" name="code"
                                                        class="form-control filter-input {{ $errors->has('code') ? 'has-error' : '' }}"
                                                        placeholder="Code">
                                                    @if ($errors->has('code'))
                                                        <span class="help-block text-danger">
                                                            <strong> {{ $errors->first('code') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Status:</label>@include('required')
                                                    <select name="status"
                                                        class="listing-input hero__form-input  form-control custom-select multiple {{ $errors->has('building_id') ? 'has-error' : '' }}">
                                                        <option selected disabled hidden>Select Availability Status</option>
                                                        <option value="1">Avalable</option>
                                                        <option value="0">Not Avalable</option>
                                                    </select>
                                                    @error('status')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-5">
                                                <div class="add-btn">
                                                    <button class="btn v3">SAVE</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="editProjectBuilding" style="overflow: visible !important;">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Project Building</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        (function($) {
            "use strict";
            $('#payment_term_table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "{{ route('admin.projects.buildings.index', $project_id) }}"
                },
                columns: [{
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'capacity',
                        name: 'capacity'
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    }
                ]
            });
        })(jQuery);

        $(document).on('click','.edit-project-building',function(e){
            let id = $(this).attr('data');
            let project = $(this).attr('project');
            let url = $(this).attr('url');

            $.ajax({
                type: "GET",
                url: url,
                success: function (data) {
                    $('#editProjectBuilding').find('.modal-body').html(data);
                    $('#editProjectBuilding').modal('show');
                }
            });
        });
    </script>
@endpush
