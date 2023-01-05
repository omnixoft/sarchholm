<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ViewModels\IPartnerModel;
use Illuminate\Http\Request;

class OurPartnerController extends Controller
{
    private $_partnerModel;
    public function __construct(IPartnerModel $model)
    {
        $this->_partnerModel = $model;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->_partnerModel->getAll($request);
        }
        return view('admin.our-partners.index');
    }

    public function create()
    {
        return view('admin.our-partners.create');
    }

    public function store(Request $request)
    {
        $this->_partnerModel->add($request);
        return redirect()->route('admin.ourPartners.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $ourPartner = $this->_partnerModel->getById($id);
        return view('admin.our-partners.edit',compact('ourPartner'));
    }

    public function update(Request $request,$id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.ourPartners.index');
        }else{
            $this->_partnerModel->update($request,$id);
            notify()->success('Updated successfully!');
            return redirect()->route('admin.ourPartners.index');
        }
    }

    public function destroy($id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.ourPartners.index');
        }else{
            $this->_partnerModel->delete($id);
            notify()->success('Deleted successfully!');
            return redirect()->route('admin.ourPartners.index');
        }

    }
}
