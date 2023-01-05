<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ViewModels\ICurrencyModel;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $_currencyModel;
    public function __construct(ICurrencyModel $_currencyModel)
    {
        $this->_currencyModel = $_currencyModel;
    }

    public function index(Request $request)
    {
        if($request->ajax())
        {
            return $this->_currencyModel->getAll($request);
        }
        // dd($this->_currencyModel->getAll($request));
        return view('admin.currencies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_currencyModel->add($request);
        notify()->success('Currency added successfully!');
        return redirect()->route('admin.currencies.index');
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
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $currency = $this->_currencyModel->getById($id);
        return view('admin.currencies.edit',compact('currency','locale'));
    }


    public function update(Request $request, $id)
    {
        $this->_currencyModel->update($request,$id);
        notify()->success('Currency updated successfully!');
        return redirect()->route('admin.currencies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->_currencyModel->delete($id);
        notify()->success('Currency deleted successfully!');
        return redirect()->route('admin.currencies.index');
    }
}
