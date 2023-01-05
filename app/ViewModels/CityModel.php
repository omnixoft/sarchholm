<?php
namespace App\ViewModels;

use App\Services\CityService;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use Yajra\DataTables\DataTables;

class CityModel implements ICityModel
{
    use ImageUpload;
    private $_cityService;
    public function __construct(CityService $service)
    {
        $this->_cityService = $service;
    }

    public function getAll(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = $this->_cityService->getAll();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('country', function ($row) use ($locale){
                return $row->country->countryTranslation->name ?? $row->country->countryTranslationEnglish->name ?? null;

            })
            ->addColumn('state', function ($row) use ($locale){
                return $row->state->stateTranslation->name ?? $row->state->stateTranslationEnglish->name ?? null;

            })
            ->addColumn('name', function ($row) use ($locale)
            {
                return $row->cityTranslation->name ?? $row->cityTranslationEnglish->name ?? null;
            })
            ->addColumn('status',function($row){
                if($row->status == 1)
                {
                    $but =  '<span class="bg-primary p-1 text-white">Active</span>';
                    return $but;
                }else{
                    $but = '<span class="bg-warning p-1 text-white">Inactive</span>';
                    return $but;
                }
            })
            ->addColumn('action', function($row){
                $actionBtn = '<div class="d-flex justify-content-end">
                    <a href="'.route('admin.cities.edit',$row->id).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a> 

                 | <form action="'.route('admin.cities.destroy',$row->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
               <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                </form></div>';
                return $actionBtn;
            })
            ->rawColumns(['action','status'])
            ->make(true);
    }

    public function getById($id)
    {
        return $this->_cityService->getById($id);
    }

    public function add(Request $request)
    {
        request()->validate([
            'country_id' => 'required',
            'state_id' => 'required',
            'name'=>'required',
            'status' => 'required',
        ]);

        $data = $request->all();
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        //thumbnail image save start
        $thumbnailImage = $request->file('image');
        $slug = $request->input('name');
        $thumbnailName = $this->imageUpload($thumbnailImage,$slug,'cities',384,426);
        $data['image'] = $thumbnailName;
        //thumbnail image save end
        $this->_cityService->add($data);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'country_id' => 'required',
            'state_id' => 'required',
            'name'=>'required',
            'status' => 'required',
        ]);
        $data = $request->all();
        //thumbnail image save start
        $thumbnailImage = $request->file('image');
        $slug = $request->name;
        $city  = $this->getById($id);
        $thumbnailName = $this->imageUpdate($thumbnailImage,$slug,$city,'cities',384,426);
        //thumbnail image save end
        $data['image'] = $thumbnailName;

        $this->_cityService->update($data,$id);
    }

    public function delete($id)
    {
        $city  = $this->getById($id);
        Storage::disk('public')->delete("cities/{$city->image}");
        $this->_cityService->delete($id);
    }
}