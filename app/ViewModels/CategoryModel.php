<?php
namespace App\ViewModels;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;

class CategoryModel implements ICategoryModel
{
    private $_categoryService;

    public function __construct(CategoryService $service)
    {
        $this->_categoryService = $service;
    }

    public function getAllCategory(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = $this->_categoryService->getAllCategory();
      if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($row) use ($locale)
                {
                    return $row->categoryTranslation->name ?? $row->categoryTranslationEnglish->name ?? null;
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
                    <a href="'.route('admin.categories.edit',$row->id).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>

                 | <form action="'.route('admin.categories.destroy',$row->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
               <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                </form></div>';
                    return $actionBtn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
    }

    public function getCategoryById($id)
    {
       return $this->_categoryService->getById($id);
    }

    public function addCategory(Request $request)
    {
        request()->validate([
            'name' =>'required',
            'parent_id' => 'nullable',
            'status' =>'required',
            'description' => 'nullable',
            'order' =>'nullable',
        ]);

        $data = $request->all();
        if($data['order'] == null)
        {
            $data['order'] = 0;
        }
        $this->_categoryService->addCategory($data);
    }

    public function updateCategory(Request $request,$id)
    {
        $data = $request->all();

        if($data['order'] == null)
        {
            $data['order'] = 0;
        }
        $this->_categoryService->updateCategory($data,$id);
    }

    public function delete($id)
    {
        $this->_categoryService->delete($id);
    }
}
