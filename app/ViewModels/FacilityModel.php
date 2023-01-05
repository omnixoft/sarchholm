<?php
namespace App\ViewModels;

use App\Services\FacilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class FacilityModel implements IFacilityModel
{
    private $_facilityService;
    public function __construct(FacilityService $service)
    {
        $this->_facilityService = $service;
    }

    public function getAll(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = $this->_facilityService->getAll();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($row) use ($locale)
            {
                return $row->facilityTranslation->name ?? $row->facilityTranslationEnglish->name ?? null;
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
                    <a href="'.route('admin.facilities.edit',$row->id).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a> 

                 | <form action="'.route('admin.facilities.destroy',$row->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
               <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                </form></div>';
                return $actionBtn;
            })
            ->rawColumns(['action','status'])
            ->make(true);

    }

    public function getByLocale()
    {
        // TODO: Implement getByLocale() method.
    }

    public function getById($id)
    {
        return $this->_facilityService->getById($id);
    }

    public function add(Request $request)
    {
        request()->validate([
            'name' =>'required',
            'icon'=> 'nullable',
            'status' => 'required'
        ]);

        $data = $request->all();
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['icon'] = 'icon';
        $this->_facilityService->add($data);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'name' =>'required',
            'icon'=> 'nullable',
            'status' => 'required'
        ]);
        $data = $request->all();
        $data['icon'] = 'icon';
        $this->_facilityService->update($data,$id);
    }

    public function delete($id)
    {
        $this->_facilityService->delete($id);
    }

}