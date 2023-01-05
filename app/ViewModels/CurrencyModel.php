<?php
namespace App\ViewModels;

use App\Services\CurrencyService;
use App\Services\PartnerService;
use App\Services\SiteInfoService;
use App\Traits\ImageUpload;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class CurrencyModel implements ICurrencyModel
{
    private $_currencyService;
    public function __construct(CurrencyService $service)
    {
        $this->_currencyService = $service;
    }

    public function getAllCurrencies()
    {
        return $this->_currencyService->getAll();
    }

    public function getAll(Request $request)
    {

        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');

        $data = $this->_currencyService->getAll();
        // dd($data);
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($row) use ($locale) {
                return $row->name;
            })
            ->addColumn('icon', function ($row) use ($locale) {
                return $row->icon;
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '<div class="d-flex justify-content-end">
                <a href="' . route('admin.currencies.edit', $row->id) . '" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>

             | <form action="' . route('admin.currencies.destroy', $row->id) . '" method="POST">
                ' . csrf_field() . '
                ' . method_field("DELETE") . '
           <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
            </form></div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getById($id)
    {
        return $this->_currencyService->getById($id);
    }

    public function add(Request $request)
    {
        request()->validate([
            'name'=> 'required',
            'icon'=>'required'
        ]);

        $data = [];
        $data['name'] = $request->name;
        $data['icon'] = $request->icon;
        $this->_currencyService->add($data);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'name'=> 'required'
        ]);

        $data['name'] = $request->input('name');
        $data['icon'] = $request->input('icon');

        $this->_currencyService->update($data,$id);
    }

    public function delete($id)
    {
        $currency  = $this->getById($id);
        $this->_currencyService->delete($id);
    }

}
