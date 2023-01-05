@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Site Information</h5><br>

                            @can('hasCredit')<a href="{{route('admin.properties.create')}}" class="btn btn-primary">Add Property</a>@endcan
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table" id="propertis_table">
                                    <thead>
                                    <tr class="invoice-headings">
                                        <th>Sl</th>
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
                                        <th style="max-width:100px">Action</th>
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