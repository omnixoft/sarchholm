<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ViewModels\ICountryModel;
use App\ViewModels\ICountryTranslationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CountryController extends Controller
{
    private $_countryModel;
    private $_countryTranslationModel;
    public function __construct(ICountryModel $countryModel,ICountryTranslationModel $translationModel)
    {
//        $this->middleware('isApprove', ['only' =>['edit','update','destroy']]);
        $this->_countryModel = $countryModel;
        $this->_countryTranslationModel = $translationModel;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
           return $this->_countryModel->getAllCountry($request);
        }
        return view('admin.countries.index');
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
        $this->_countryModel->addCountry($request);
        notify()->success('Country added successfully!');
        return redirect()->route('admin.countries.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $country = $this->_countryModel->getCountryById($id);
        $countryTranslation = $this->_countryTranslationModel->getById($id);
        return view('admin.countries.edit',compact('country','countryTranslation','locale'));
    }

    public function update(Request $request,$id)
    {
        $this->_countryModel->updateCountry($request,$id);
        //$this->_countryTranslationModel->update($request,$id);
        notify()->success('Country updated successfully!');
        return redirect()->route('admin.countries.index');
    }

    public function destroy($id)
    {
        $this->_countryModel->delete($id);
        $this->_countryTranslationModel->delete($id);
        notify()->success('Country deleted successfully!');
        return redirect()->route('admin.countries.index');
    }

}
