@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="payment_receipt--wrapper">
                        <div class="payment_receipt--contents">
                            <h2 class="atbd_thank_you">Thank you for your order!</h2>
                            <div class="atbd_payment_instructions">
                                <p>Please make your payment directly to our bank account
                                    and use your ORDER ID (#103) as a Reference. Our bank account information is given
                                    below.</p>
                                <h4>Account details:</h4>
                                <ul class="list-unstyled">
                                    <li>Account Name: <span>sarchholm Inc.</span></li>
                                    <li>Account Number: <span>000-333-880-55</span></li>
                                    <li>Bank Name: <span>State Bank, Neverland</span></li>
                                </ul>
                                <p>Please remember that your order may be canceled if you do not make your payment within next 48 hours.</p>
                            </div>
                            <div class="row atbd_payment_summary_wrapper">
                                <div class="col-md-12">
                                    <p class="atbd_payment_summary">Here is your order summery:</p>
                                </div>
                                <div class="col-lg-6">
                                    <div class="table-responsive">
                                        <table class="table ">
                                            <tbody>
                                            <tr>
                                                <td>ORDER #</td>
                                                <td>103</td>
                                            </tr>
                                            <tr>
                                                <td>Total Amount</td>
                                                <td>$ 110.00</td>
                                            </tr>
                                            <tr>
                                                <td>Date</td>
                                                <td>Feb 9, 2019 9:17 pm</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="table-responsive">
                                        <table class="table ">
                                            <tbody>
                                            <tr>
                                                <td>Payment Method</td>
                                                <td>Bank Transfer</td>
                                            </tr>
                                            <tr>
                                                <td>Payment Status</td>
                                                <td>Created</td>
                                            </tr>
                                            <tr>
                                                <td>Transaction ID</td>
                                                <td>#CD1234</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <p class="atbd_payment_summary">Ordered Item(s)</p>
                            <div class="checkout-table table-responsive">
                                <table id="directorist-checkout-table" class="table ">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Details</th>
                                        <th><strong>Price</strong></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <h4>Standard Pass</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo,
                                                labore.</p>
                                        </td>
                                        <td>
                                            $110.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-right">
                                            <strong>Total amount</strong>
                                        </td>
                                        <td class="">
                                            <div id="atbdp_checkout_total_amount">$110.00</div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center mar-top-20"><a href="" class="btn v3">Print this invoice</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection