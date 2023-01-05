<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Credit;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $is_free = $user->packages->where('is_free',true)->first();
        if($is_free && $user->type != 'admin')
        {
            $packages = Package::whereNotIn('id',[$is_free->id])->get();
        }else{
            $packages = Package::all();
        }

        $credits = $user->packageUser->sum('price');

        return view('admin.credits.index',compact('packages','credits','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $today = Carbon::now();
        Credit::create($request->all());
        $user = auth()->user();
        $user->packages()->attach($request->package_id,['property_id'=>1,'is_expired'=>0,'active_at'=>$today,'expire_at'=>$request->expire_at,'price'=>$request->price,'item'=>$request->item,'status'=>1]);
        return redirect()->route('admin.credits.index');
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
