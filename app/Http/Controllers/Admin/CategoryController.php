<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ViewModels\ICategoryModel;
use App\ViewModels\ICategoryTranslationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
    private $_categoryModel;
    private $_categoryTranslationModel;

    public function __construct(ICategoryModel $model,ICategoryTranslationModel $translationModel)
    {
        $this->middleware('admin');
        $this->_categoryModel = $model;
        $this->_categoryTranslationModel = $translationModel;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->_categoryModel->getAllCategory($request);
        }
        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->_categoryModel->addCategory($request);
        return redirect()->route('admin.categories.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $locale = Session::get('currentLocal');
        $category =  $this->_categoryModel->getCategoryById($id);
        $categoryTranslation = $this->_categoryTranslationModel->getById($id);
        return view('admin.categories.edit',compact('category','categoryTranslation','locale'));
    }

    public function update(Request $request,$id)
    {
        $this->_categoryModel->updateCategory($request,$id);
//        $this->_categoryTranslationModel->update($request,$id);
        notify()->success('Category updated successfully!');
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.categories.index');
        }else{
            $this->_categoryModel->delete($id);
            $this->_categoryTranslationModel->delete($id);
            notify()->success('Category deleted!');
            return redirect()->route('admin.categories.index');
        }
    }

}
