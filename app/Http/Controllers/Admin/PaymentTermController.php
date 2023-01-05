<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ViewModels\IPaymentTermModel;
use App\ViewModels\IPaymentTermTranslationModel;
use App\Models\PaymentTerm;
use App\Models\PaymentTermTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class PaymentTermController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
           return PaymentTerm::getAllPaymentTerm($request);
        }
        return view('admin.payment-terms.index');
    }

    public function create()
    {
        return view('admin.payment-terms.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'down_payment' => 'required',
            'max_installments' => 'required',
        ]);

        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;

        $paymentTerm = PaymentTerm::create($data);
        $data['payment_term_id'] = $paymentTerm->id;
        $paymentTermTranslation = PaymentTermTranslation::create($data);

        notify()->success('Payment Term added successfully!');
        return redirect()->route('admin.payment-terms.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $paymentTerm = PaymentTerm::findOrFail($id);
        $paymentTermTranslation =  PaymentTermTranslation::where('payment_term_id', $id)->where('locale', $locale)->first();
        return view('admin.payment-terms.edit',compact('paymentTerm', 'paymentTermTranslation','locale'));
    }

    public function update(Request $request,$id)
    {
        $data = request()->validate([
            'name' => 'required',
            'down_payment' => 'required',
            'max_installments' => 'required',
        ]);
        $data['payment_term_id'] = $id;
        $locale = Session::get('currentLocal');
        $data['paymentTermId'] = $id;
        $data['locale'] = $locale;

        if ($data['locale'] == 'en') {
            $paymentTerm = PaymentTerm::findOrFail($id);
            $paymentTerm->update($data);
        }

        PaymentTermTranslation::updateOrCreate(
            [
                'payment_term_id' => $data['paymentTermId'],
                'locale'    =>  $data['locale'],
            ], //condition
            [
                'name' => $data['name'],
                'down_payment' => $data['down_payment'],
                'max_installments' => $data['max_installments']
            ]
        );

        notify()->success('Payment Term updated successfully!');
        return redirect()->route('admin.payment-terms.index');
    }

    public function destroy($id)
    {
        $paymentTerm = PaymentTerm::findOrFail($id);
        $paymentTerm->delete();

        PaymentTermTranslation::where('payment_term_id', $id)->delete();

        notify()->success('Payment Term deleted successfully!');
        return redirect()->route('admin.payment-terms.index');
    }

}
