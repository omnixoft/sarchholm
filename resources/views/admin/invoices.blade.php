@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title">
                            <h5>Invoices</h5>
                        </div>
                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table">
                                    <thead>
                                    <tr class="invoice-headings">
                                        <th>Invoice No</th>
                                        <th>Date</th>
                                        <th>Total Amount</th>
                                        <th style="max-width:100px">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="bg-white">
                                        <td>
                                            #103 </td>
                                        <td>
                                            <time datetime="2019-04-26T01:06:30+00:00">Mar 21,2019</time>
                                        </td>
                                        <td>
                                            <span class="amount">$3000.00</span> </td>
                                        <td>
                                            <a href="db-single-invoice.html" class="invoice-action" data-toggle="tooltip" title="View Invoice"> <i class="ion-ios-eye-outline"></i></a>
                                            <a href="#" class="invoice-action" data-toggle="tooltip" title="Delete"> <i class="ion-android-delete"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            #105 </td>
                                        <td>
                                            <time datetime="2019-04-26T01:06:30+00:00">Mar 9, 2019</time>
                                        </td>
                                        <td>
                                            <span class="amount">$210.00</span> </td>
                                        <td>
                                            <a href="db-single-invoice.html" class="invoice-action" data-toggle="tooltip" title="View Invoice"> <i class="ion-ios-eye-outline"></i></a>
                                            <a href="#" class="invoice-action" data-toggle="tooltip" title="Delete"> <i class="ion-android-delete"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="bg-white">
                                        <td>
                                            #110 </td>
                                        <td>
                                            <time datetime="2019-04-26T01:06:30+00:00">Feb 19, 2019</time>
                                        </td>
                                        <td>
                                            <span class="amount">$80.00</span> </td>
                                        <td>
                                            <a href="db-single-invoice.html" class="invoice-action" data-toggle="tooltip" title="View Invoice"> <i class="ion-ios-eye-outline"></i></a>
                                            <a href="#" class="invoice-action" data-toggle="tooltip" title="Delete"> <i class="ion-android-delete"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            #111 </td>
                                        <td>
                                            <time datetime="2019-04-26T01:06:30+00:00">Feb 12, 2019</time>
                                        </td>
                                        <td>
                                            <span class="amount">$180.00</span> </td>
                                        <td>
                                            <a href="db-single-invoice.html" class="invoice-action" data-toggle="tooltip" title="View Invoice"> <i class="ion-ios-eye-outline"></i></a>
                                            <a href="#" class="invoice-action" data-toggle="tooltip" title="Delete"> <i class="ion-android-delete"></i></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection