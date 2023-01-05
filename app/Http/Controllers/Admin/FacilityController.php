<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ViewModels\IFacilityModel;
use App\ViewModels\IFacilityTranslationModel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    private $_facilityModel;
    private $_facilityTranslationModel;
    public function __construct(IFacilityModel $model,IFacilityTranslationModel $translationModel)
    {
        $this->middleware('admin');
        $this->_facilityModel = $model;
        $this->_facilityTranslationModel = $translationModel;
    }

    public function index(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));

        if ($request->ajax()) {
            return $this->_facilityModel->getAll($request);
        }
        return view('admin.facilities.index');
    }

    public function create()
    {
        return view('admin.facilities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_facilityModel->add($request);
        notify()->success('Facility added successfully!');
        return redirect()->route('admin.facilities.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $facility = $this->_facilityModel->getById($id);
        $facilityTranslation = $this->_facilityTranslationModel->getById($id);
        return view('admin.facilities.edit',compact('facility','locale','facilityTranslation'));
    }


    public function update(Request $request,$id)
    {
        $this->_facilityModel->update($request,$id);
        $this->_facilityTranslationModel->update($request,$id);
        notify()->success('Facility updated successfully!');
        return redirect()->route('admin.facilities.index');
    }

    public function destroy($id)
    {
        $this->_facilityModel->delete($id);
        $this->_facilityTranslationModel->delete($id);
        notify()->success('Facility deleted successfully!');
        return redirect()->route('admin.facilities.index');
    }
}
