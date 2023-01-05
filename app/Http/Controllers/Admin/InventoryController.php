<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\InventoryTranslation;
use App\Models\ProjectBuilding;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use App\Models\Project;
class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = Inventory::latest()->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('building', function ($p) use ($locale) {
                    return $p->building->name;
                })
                ->addColumn('project', function ($p) use ($locale) {
                    return (isset($p->project->name) ? $p->project->name : '');
                })
                ->addColumn('name', function ($p) {
                    return $p->name;
                })
                // ->addColumn('project', function ($p) {
                //     return $p->project->name;
                // })
                ->addColumn('sqm', function ($p) use ($locale) {
                    return $p->sqm;
                })
                ->addColumn('price', function ($p) use ($locale) {
                    return $p->price;
                })
                ->addColumn('available', function ($p) use ($locale) {
                    return ($p->available == 1 ? 'Available' : 'Not Available') ;
                })
                
                ->addColumn('action', function ($p) {
                    $actionBtn = '<div class="d-flex justify-content-end">
                    <a href="' . route('admin.inventory.edit', $p->id) . '" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>
                    <form action="'.route('admin.inventory.destroy', $p->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
               <button class="btn btn-danger btn-sm"><i class="la la-trash"></i></button>
                </form></div>';
                    return $actionBtn;
                })
                ->make(true);
        }
        return view('admin.inventory.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'buildings' =>  ProjectBuilding::latest()->get(),
            'Projects'  =>  Project::latest()->get()
        ];
        return view('admin.inventory.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_id'       =>  'required',
            'building_id'       =>  'required',
            'name'      =>  'required',
            'sqm'       =>  'required',
            'price'     =>  'required',
            'image'     =>  'required',
            'material'      =>  'required',
            'available'     =>  'required',
        ]);
        $locale = Session::get('currentLocal');
        $data = $request->all();
        $name = NULL;
        $arr = [];
        if ($request->image != NULL) {
            foreach ($request->image as $file) {
                $name = rand() . "." . $file->getClientOriginalExtension();
                $file->move(public_path('inventory'), $name);
                array_push($arr, $name);
            }
        }
        $data['locale'] = $locale;
        $data['image'] = json_encode($arr);
        $i = Inventory::create($data);
        $data['inventory_id'] = $i->id;
        InventoryTranslation::create($data);
        notify()->success('Inventory added successfully!');
        return redirect()->route('admin.inventory.index');

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
        $data = [
            'buildings' =>  ProjectBuilding::latest()->get(),
            'Projects'  =>  Project::latest()->get(),
            'row'       =>  Inventory::find($id)
        ];
        return view('admin.inventory.edit',$data);
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
        $request->validate([
            'building_id'       =>  'required',
            'name'      =>  'required',
            'sqm'       =>  'required',
            'price'     =>  'required',
            'material'      =>  'required',
            'available'     =>  'required',
        ]);
        $locale = Session::get('currentLocal');
        $data = $request->all();
        $name = NULL;
        $arr = [];
        if ($request->image != NULL) {
            foreach ($request->image as $file) {
                $name = rand() . "." . $file->getClientOriginalExtension();
                $file->move(public_path('inventory'), $name);
                array_push($arr, $name);
            }
        }else{
            $arr = json_decode($request->eximgs);
        }
        $data['locale'] = $locale;
        $data['image'] = json_encode($arr);
        $i = Inventory::find($id);
        $i->update($data);
        $data['inventory_id'] = $i->id;
        InventoryTranslation::updateOrCreate(
            [
                'inventory_id'  =>  $i->id,
                'locale'        =>  $locale
            ],
            [
                'building_id'       =>  $request->building_id,
                'name'      =>  $request->name,
                'sqm'       =>  $request->sqm,
                'price'     =>  $request->price,
                'discount_price'        =>  $request->discount_price,
                'image'     =>  $data['image'],
                'description'       =>  $request->description,
                'material'      =>  $request->material,
                'available'     =>  $request->available
            ]
        );
        notify()->success('Inventory updated successfully!');
        return redirect()->route('admin.inventory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inventory::find($id)->delete();
        InventoryTranslation::where('inventory_id',$id)->delete();
        notify()->success('Inventory updated successfully!');
        return redirect()->route('admin.inventory.index');

    }

    public function getBuildings(Request $request)
    {
        $project_id = $request->project_id;
        $data = ProjectBuilding::where('project_id',$project_id)->latest()->get();
        return view('admin.inventory.buildings',['data'=>$data])->render();
    }
}
