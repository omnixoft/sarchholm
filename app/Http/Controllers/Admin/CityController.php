<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use App\ViewModels\ICityModel;
use App\ViewModels\ICityTranslationModel;
use App\ViewModels\ICountryTranslationModel;
use App\ViewModels\IStateTranslationModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CityController extends Controller
{
    private $_cityModel;
    private $_cityTranslationModel;
    private $_countryTranslationModel;
    private $_stateTranslationModel;

    public function __construct(ICityModel $model,ICityTranslationModel $cityTranslationModel,ICountryTranslationModel $countryTranslationModel,IStateTranslationModel $stateTranslationModel)
    {
//        $this->middleware('isApprove', ['only' =>['edit','update','destroy']]);
        $this->_cityModel = $model;
        $this->_cityTranslationModel = $cityTranslationModel;
        $this->_countryTranslationModel = $countryTranslationModel;
        $this->_stateTranslationModel = $stateTranslationModel;
    }

    public function index(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        if ($request->ajax()) {
           return $this->_cityModel->getAll($request);
        }
        return view('admin.cities.index');
    }


    public function create()
    {
        App::setLocale(Session::get('currentLocal'));
        $countries = $this->_countryTranslationModel->getByLocale();
        return view('admin.cities.create',compact('countries'));
    }


    public function store(Request $request)
    {
        $this->_cityModel->add($request);
        notify()->success('City added successfully!');
        return redirect()->route('admin.cities.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $city = $this->_cityModel->getById($id);
        $cityTranslation = $this->_cityTranslationModel->getById($id);
        $countries = $this->_countryTranslationModel->getByLocale();
        $states = $this->_stateTranslationModel->getByLocale();
        return view('admin.cities.edit',compact('city','cityTranslation','countries','states','locale'));
    }

    public function update(Request $request,$id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.cities.index');
        }else{
            $this->_cityModel->update($request,$id);
            $this->_cityTranslationModel->update($request,$id);
            notify()->success('City updated successfully!');
            return redirect()->route('admin.cities.index');

        }

    }

    public function destroy($id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.cities.index');
        }else{
            $this->_cityTranslationModel->delete($id);
            $this->_cityModel->delete($id);
            notify()->success('City deleted successfully!');
            return redirect()->route('admin.cities.index');
        }

    }

    public function getState(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $states = State::with('stateTranslation')->where('country_id',$request->country)->get();
        echo '<option value="">Select State</option>';
        foreach ($states as $state){
             echo '<option value="'.$state->id.'">'.$state->stateTranslation->name.'</option>';
        }
    }
    public function getCity(Request $request)
    {

        App::setLocale(Session::get('currentLocal'));
        $cities = City::with('cityTranslation')->where('state_id',$request->state)->get();
        echo '<option value="0">Select City</option>';
        foreach ($cities as $city){
            echo '<option value="'.$city->id.'">'.$city->cityTranslation->name.'</option>';
        }
    }
}
