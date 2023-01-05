<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ViewModels\ISiteInfoModel;
use Illuminate\Http\Request;

class SiteInfoController extends Controller
{
    private $_siteInfoModel;
    public function __construct(ISiteInfoModel $model)
    {
        $this->_siteInfoModel = $model;
    }

    public function index()
    {
        return view('admin.site-info.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $siteInfo =  $this->_siteInfoModel->getById(1);
    
        return view('admin.site-info.create',compact('siteInfo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!env('USER_VERIFIED')){
            notify()->error('This feature is disable for demo!');
            return redirect()->back();
        }else{
            $this->_siteInfoModel->add($request);
            notify()->success('Site information updated successfully!');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
