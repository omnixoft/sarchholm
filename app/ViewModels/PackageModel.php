<?php
namespace App\ViewModels;

use App\Services\PackageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class PackageModel implements IPackageModel
{
    private $_packageService;
    public function __construct(PackageService $service)
    {
        $this->_packageService = $service;
    }

    public function getAll(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = $this->_packageService->getAll();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($row) use ($locale)
            {
                return $row->packageTranslation->name ?? $row->packageTranslationEnglish->name ?? null;
            })
            ->addColumn('is_featured',function($row){
                if($row->is_featured == 1)
                {
                    $but =  '<input data-id="'.$row->id.'" class="mifeature" type="checkbox" checked data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger">';
                    return $but;
                }else{
                    $but = '<input data-id="'.$row->id.'" class="mifeature" type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger">';
                    return $but;
                }
            })
            ->addColumn('status',function($row){
                if($row->status == 1)
                {
                    $but =  ' <input data-id="'.$row->id.'" class="mistatus" type="checkbox" checked data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger"> ';
                    return $but;
                }else{
                    $but = ' <input data-id="'.$row->id.'" class="mistatus" type="checkbox" data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger"> ';
                    return $but;
                }
            })
            ->addColumn('action', function($row){
                $actionBtn = '<div class="d-flex justify-content-end">
                    <a href="'.route('admin.packages.edit',$row->id).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>

                 | <form action="'.route('admin.packages.destroy',$row->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
               <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                </form></div>';
                return $actionBtn;
            })
            ->rawColumns(['action','status','is_featured'])
            ->make(true);

    }

    public function getById($id)
    {
        return $this->_packageService->getById($id);
    }

    public function add(Request $request)
    {
        request()->validate([
            'name' => 'required|max:255',
            'package_type' => 'required',
            'price' => 'required',
            'currency_id'=>'required',
            'is_featured' => 'nullable',
            'is_free' => 'nullable',
            'validity'=>'required',
            'listing' => 'required',
            'featured'=> 'required',
            'status' => 'required',
        ]);
        $data = $request->all();
        // dd($data['order']);
        $is_free =  (int) $request->has('is_free');
        $is_featured = (int) $request->has('is_featured');
        $data['is_featured'] = $is_featured;
        $data['is_free'] = $is_free;
        $data['order'] == "" ? $data['order'] = null : $data['order'] = $data['order'];
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $this->_packageService->add($data);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required|max:255',
            'package_type' => 'required',
            'price' => 'required',
            'currency_id'=>'required',
            'is_featured' => 'nullable',
            'is_free' => 'nullable',
            'validity'=>'required',
            'listing' => 'required',
            'featured'=> 'required',
            'status' => 'required',
        ]);


        $data = $request->all();
        $is_free =  (int) $request->has('is_free');
        $is_featured = (int) $request->has('is_featured');
        $data['is_free'] = $is_free;
        $data['is_featured'] = $is_featured;
        $data['order'] = null;
        $this->_packageService->update($data,$id);
    }

    public function delete($id)
    {
        $this->_packageService->delete($id);
    }

}
