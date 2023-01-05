<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\ViewModels\ICategoryTranslationModel;
use App\ViewModels\ICityTranslationModel;
use App\ViewModels\ICountryTranslationModel;
use App\ViewModels\ICurrencyModel;
use App\ViewModels\IFacilityTranslationModel;
use App\ViewModels\IPackageUserModel;
use App\ViewModels\IPropertyModel;
use App\ViewModels\IPropertyTranslationModel;
use App\ViewModels\IStateTranslationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;


class PropertyController extends Controller
{
    private $_propertyModel;
    private $_propertyTranslationModel;
    private $_categoryTranslationModel;
    private $_facilityTranslationModel;
    private $_countryTranslationModel;
    private $_stateTranslationModel;
    private $_cityTranslationModel;
    private $_packageUserModel;
    private $_currencyModel;
    public function __construct(IPackageUserModel $packageUserModel,
                                IPropertyModel $propertyModel,
                                IPropertyTranslationModel $propertyTranslationModel,
                                ICategoryTranslationModel $categoryTranslationModel,
                                IFacilityTranslationModel $facilityTranslationModel,
                                ICountryTranslationModel $countryTranslationModel,
                                IStateTranslationModel $stateTranslationModel,
                                ICityTranslationModel $cityTranslationModel,
                                ICurrencyModel $currencyModel)
    {
        $this->middleware('credit', ['except' => ['index','edit','update','myProperties']]);
//        $this->middleware('isApprove', ['only' => ['edit','update']]);
        $this->_propertyModel = $propertyModel;
        $this->_propertyTranslationModel = $propertyTranslationModel;
        $this->_categoryTranslationModel = $categoryTranslationModel;
        $this->_facilityTranslationModel = $facilityTranslationModel;
        $this->_countryTranslationModel = $countryTranslationModel;
        $this->_stateTranslationModel = $stateTranslationModel;
        $this->_cityTranslationModel = $cityTranslationModel;
        $this->_packageUserModel = $packageUserModel;
        $this->_currencyModel = $currencyModel;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->_propertyModel->getAll($request);
        }
        return view('admin.properties.index');
    }

    public function create()
    {
        App::setLocale(Session::get('currentLocal'));
        $categories = $this->_categoryTranslationModel->getByLocale();
        $facilities = $this->_facilityTranslationModel->getByLocale();
        $packages = $this->_packageUserModel->getPackages();
        $countries = $this->_countryTranslationModel->getByLocale();
        $currencies = $this->_currencyModel->getAllCurrencies();
        return view('admin.properties.create',compact('currencies','categories','facilities','packages','countries'));
    }

    public function store(Request $request)
    {
        $this->_propertyModel->add($request);
        return redirect()->route('admin.properties.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $property = $this->_propertyModel->getById($id);

        $propertyTranslation = $this->_propertyTranslationModel->getById($id);
        $user = auth()->user();
        $categories = $this->_categoryTranslationModel->getByLocale();
        $facilities = $this->_facilityTranslationModel->getByLocale();
        $package_user = $this->_packageUserModel->getByUser($user->id);
        $packages = $this->_packageUserModel->getPackages();
        $countries = $this->_countryTranslationModel->getByLocale();
        $states = $this->_stateTranslationModel->getByLocale();
        $cities = $this->_cityTranslationModel->getByLocale();
        $currencies = $this->_currencyModel->getAllCurrencies();

        return view('admin.properties.edit',compact('currencies','property','user','categories','facilities','package_user','packages','countries','states','cities','locale','propertyTranslation'));
    }

    public function update(Request $request,$id)
    {
        // dd($request->oldImages);
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.properties.index');
        }else{
            // $user = auth()->user();
            // if($user->type == 'admin')
            // {
            //     $this->_propertyModel->updateModerationStatus($request,$id);
            // }else{
                $this->_propertyModel->update($request,$id);
            // }
            notify()->success('Property updated successfully!');
            return redirect()->route('admin.properties.index');
        }
    }

    public function destroy($id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.properties.index');
        }else{
            $this->_propertyModel->delete($id);
            notify()->success('Property deleted!');
            return redirect()->route('admin.properties.index');
        }
    }

    public function destroyGalleryImage(Request $request)
    {

        $img = $request->image;
        $excludeImage = explode(",",$request->image);
        $fileModal = Image::where('property_id',$request->id)->first();
        $oldImages = json_decode($fileModal->name);
        $getImage = array_search($img,$oldImages);
        File::delete(public_path() . "/images/gallery/{$img}");

        // $finalimages = array_diff($oldImages, $excludeImage);
        unset($oldImages[$getImage]);
        $array = array_values($oldImages);

        // $s = json_encode($finalimages,true);
        // return response()->json($array);
        // $finalimages = unset($oldImages[1]);
        // $fileModal->property_id = $id;

        $fileModal->name = json_encode($array);
        $fileModal->image_path = json_encode($array);

        $fileModal->save();

        return response()->json('Image deleted!');

    }
}

