<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ViewModels\IUserModel;
use App\ViewModels\IUserTranslationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AgentController extends Controller
{
    private $_userModel;
    private $_userTranslationModel;
    public function __construct(IUserModel $model,IUserTranslationModel $userTranslationModel)
    {
        $this->_userModel = $model;
        $this->_userTranslationModel = $userTranslationModel;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->_userModel->getAll($request);
        }
        return view('admin.agents.index');
    }

    public function create()
    {
        return view('admin.agents.create');
    }

    public function store(Request $request)
    {
        $this->_userModel->add($request);
        notify()->success('Agent Created Successfully!');

        return redirect()->route('admin.agents.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $agent = $this->_userModel->getById($id);
        $locale = Session::get('currentLocal');
        return view('admin.agents.edit',compact('agent','locale'));
    }

   function update(Request $request, $id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.agents.index');
        }else{
            $this->_userModel->update($request,$id);
            $this->_userTranslationModel->update($request,$id);
            notify()->success('Agent Information Updated Successfully!');
            return redirect()->route('admin.agents.index');
        }
    }

    public function destroy($id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.agents.index');
        }else{
            $this->_userModel->delete($id);
            $this->_userTranslationModel->delete($id);
            notify()->success('Agent Deleted Successfully!');
        }
        return redirect()->route('admin.agents.index');
    }
}
