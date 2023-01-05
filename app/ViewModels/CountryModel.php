<?php
namespace App\ViewModels;

use Illuminate\Http\Request;
use App\Services\CountryService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class CountryModel implements ICountryModel
{
    private $_countryService;
    public function __construct(CountryService $service)
    {
        $this->_countryService = $service;
    }

    public function getAllCountry(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = $this->_countryService->getAll();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($row) use ($locale) {
                return $row->countryTranslation->name ?? $row->countryTranslationEnglish->name ?? null;
            })
            ->addColumn('status', function ($row) {
                if ($row->status == 1) {
                    $but = '<span class="bg-primary p-1 text-white">Active</span>';
                    return $but;
                } else {
                    $but = '<span class="bg-warning p-1 text-white">Inactive</span>';
                    return $but;
                }
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '<div class="d-flex justify-content-end">
                <a href="' . route('admin.countries.edit', $row->id) . '" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>

             | <form action="' . route('admin.countries.destroy', $row->id) . '" method="POST">
                ' . csrf_field() . '
                ' . method_field("DELETE") . '
           <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
            </form></div>';
                return $actionBtn;
            })
            ->rawColumns(['action', 'status'])
            ->make(true);

    }

    public function getCountryById($id)
    {
        return $this->_countryService->getById($id);
    }

    public function addCountry(Request $request)
    {
        request()->validate([
            'name' =>'required',
            'status' => 'required'
        ]);

        $data = $request->all();
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $this->_countryService->addCountry($data);
    }

    public function updateCountry(Request $request, $id)
    {
        request()->validate([
            'name' =>'required',
            'status' => 'required'
        ]);
        $data = $request->all();
        $locale = Session::get('currentLocal');
        $data['countryId'] = $id;
        $data['locale'] = $locale;
        $this->_countryService->updateCountry($data,$id);
    }

    public function delete($id)
    {
        $this->_countryService->delete($id);
    }

}
