<?php
namespace App\ViewModels;

use App\Services\PartnerService;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class PartnerModel implements IPartnerModel
{
    use ImageUpload;
    private $_partnerService;
    public function __construct(PartnerService $service)
    {
        $this->_partnerService = $service;
    }

    public function getAll(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = $this->_partnerService->getAll();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('image', function ($row) use ($locale)
            {
                return $row->image;
            })
            ->addColumn('action', function($row){
                $actionBtn = '<div class="d-flex justify-content-end">
                    <a href="'.route('admin.ourPartners.edit',$row).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a> 

                 | <form action="'.route('admin.ourPartners.destroy',$row).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
               <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                </form></div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);

    }

    public function getById($id)
    {
        return $this->_partnerService->getById($id);
    }

    public function add(Request $request)
    {
        request()->validate([
            'name'=> 'nullable',
            'image'=>'required',
        ]);

        $data['name'] = $request->input('name');
        //thumbnail image save start
        $thumbnailImage = $request->file('image');
        $slug = $request->input('name');
        $thumbnailName = $this->imageUpload($thumbnailImage,$slug,'images',150,100);
        $data['image'] = $thumbnailName;
        //thumbnail image save end
       $this->_partnerService->add($data);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'name'=> 'nullable',
            'image'=>'nullable',
        ]);
        $data['name'] = $request->input('name');
        //thumbnail image save start
        $thumbnailImage = $request->file('image');
        $slug = $request->input('name');
        $partner  = $this->getById($id);
        $thumbnailName = $this->imageUpdate($thumbnailImage,$slug,$partner,'images',150,100);
        //thumbnail image save end
        $data['image'] = $thumbnailName;
        $this->_partnerService->update($data,$id);
    }

    public function delete($id)
    {
        $partner  = $this->getById($id);
        Storage::disk('public')->delete("images/{$partner->image}");
        $this->_partnerService->delete($id);
    }

}