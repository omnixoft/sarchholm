<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use App\Services\PaymentTermService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class PaymentTerm extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'down_payment', 'max_installments'];

    // public function __construct(PaymentTermService $service)
    // {
    //     $this->_paymentTermService = $service;
    // }

    public static function getAllPaymentTerm(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        // $data = $this->_paymentTermService->getAll();

        $data = PaymentTerm::with(['paymentTermTranslation', 'paymentTermTranslationEnglish'])
        ->orderBy('id', 'DESC')
        ->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($row) use ($locale) {
                return $row->paymentTermTranslation->name ?? $row->paymentTermTranslationEnglish->name ?? null;
            })
            ->addColumn('down_payment', function ($row) use ($locale) {
                return $row->paymentTermTranslation->down_payment ?? $row->paymentTermTranslationEnglish->down_payment ?? null;
            })
            ->addColumn('max_installments', function ($row) use ($locale) {
                return $row->paymentTermTranslation->max_installments ?? $row->paymentTermTranslationEnglish->max_installments ?? null;
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '<div class="d-flex justify-content-end">
                <a href="' . route('admin.payment-terms.edit', $row->id) . '" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>

             | <form action="' . route('admin.payment-terms.destroy', $row->id) . '" method="POST">
                ' . csrf_field() . '
                ' . method_field("DELETE") . '
           <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
            </form></div>';
                return $actionBtn;
            })
            ->rawColumns(['action', 'down_payment', 'max_installments'])
            ->make(true);
    }

    public function paymentTermTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(PaymentTermTranslation::class,'payment_term_id')
            ->where('locale',$locale);
    }

    public function paymentTermTranslationEnglish()
    {
        return $this->hasOne(PaymentTermTranslation::class, 'payment_term_id')
            ->where('locale','en');
    }
}
//W0jcZ6t,o2Nu
