<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Credit;
use App\Models\PackageUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Response;
use Yajra\DataTables\DataTables;

class PurchasePackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $today = Carbon::now();
        $package_user = PackageUser::where('user_id',$user->id)->get();

        foreach($package_user as $data)
        {
            if($data->expire_at < $today->toDateTimeString())
            {
                $data->is_expired = 1;
                $data->price = 0;
                $data->item = 0;
                $data->save();
            }
        }

        $data = PackageUser::with(['user','package'])->where('user_id',$user->id)->get();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    if($row->is_expired == 1)
                    {
                         $but =  '<span class="badge badge-danger">Expired</span>';
                         return $but;
                    }else{
                        $but = '<span class="badge badge-success">Active</span>';
                        return $but;
                    }
                })
                ->addColumn('remainingTime',function($row){
                    $end_time = new Carbon($row->expire_at);
                    $currentTime = Carbon::now();
                    if($currentTime > $end_time)
                    {
                        return '00:00:00';
                    }else{
                        return  $remainingTime =$end_time->longRelativeDiffForHumans($currentTime->year,$currentTime->month);
                    }
                })
                ->addColumn('user', function ($row) {
                    return $row->user->username;
                })
                ->addColumn('package', function ($row) {
                    return $row->package->name;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.purchase-package.index');
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
        return redirect()->route('admin.purchase-package.index');

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
