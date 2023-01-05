<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ClientTranslation;
use App\Models\Project;
use App\Models\Inventory;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\App;
use App\Models\ClientDetail;
class ClientUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            App::setLocale(Session::get('currentLocal'));
            $locale = Session::get('currentLocal');
            $data = Client::with(['clientTranslation', 'clientTranslationEnglish'])
                ->orderBy('id', 'DESC')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($row) use ($locale) {
                    return $row->clientTranslation->name ?? $row->clientTranslationEnglish->name ?? null;
                })
                ->addColumn('unit', function ($row) use ($locale) {
                    return $row->clientTranslation->unit->name ?? $row->clientTranslationEnglish->unit->name ?? null;
                })
                ->addColumn('project', function ($row) use ($locale) {
                    return $row->clientTranslation->project->name ?? $row->clientTranslationEnglish->project->name ?? null;
                })
                ->addColumn('phone', function ($row) use ($locale) {
                    return $row->clientTranslation->phone ?? $row->clientTranslationEnglish->phone ?? null;
                })
                ->addColumn('visits', function ($row) use ($locale) {
                    // return $row->clientTranslation->phone ?? $row->clientTranslationEnglish->phone ?? null;
                    return ClientDetail::where('client_id',$row->id)->count();
                })
                ->addColumn('duration', function ($row) use ($locale) {
                    // return $row->clientTranslation->phone ?? $row->clientTranslationEnglish->phone ?? null;
                    return ClientDetail::where('client_id',$row->id)->sum('duration_per_visit');
                })
                ->addColumn('api_call_req', function ($row) use ($locale) {
                    // return $row->clientTranslation->phone ?? $row->clientTranslationEnglish->phone ?? null;
                    return ClientDetail::where('client_id',$row->id)->sum('request_for_call');
                })
                ->addColumn('likes', function ($row) use ($locale) {
                    // return $row->clientTranslation->phone ?? $row->clientTranslationEnglish->phone ?? null;
                    return $row->clientTranslation->likes ?? $row->clientTranslationEnglish->likes ?? 0;
                })
                ->addColumn('link', function ($row) use ($locale) {
                    $link =  '/'.$row->project_id .'/'.$row->id .'/'.$row->unit_id;
                    $data = $row->clientTranslation->project->project_link . $link?? $row->clientTranslationEnglish->project->project_link  . $link?? null;
                    return '<a href="javascript:void(0)" data="'.$data.'" class="btn btn-sm btn-primary show-unit-link">Link</a>';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="d-flex justify-content-end">
                    <a href="' . route('admin.client-units.edit',  $row->id) . '" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>

                 | <form action="' . route('admin.client-units.destroy', $row->id) . '" method="POST">
                    ' . csrf_field() . '
                    ' . method_field("DELETE") . '
               <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                </form>
                </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'phone', 'unit', 'name','link'])
                ->make(true);
        }

        return view('admin.client-units.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'projects'  =>  Project::latest()->get(),
            'units'     =>  Inventory::where('available',1)->latest()->get()
        ];
        return view('admin.client-units.create', $data);
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
            'name'      =>  'required',
            'project_id'        =>  'required',
            'unit_id'       =>  'required',
        ]);
        $data = $request->all();
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['link'] = url('/');
        $c = Client::create($data);
        $data['client_id'] = $c->id;
        ClientTranslation::create($data);
        notify()->success('Unit successfully sent to client!');
        return redirect()->route('admin.client-units.index');
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
            'projects'  =>  Project::latest()->get(),
            'units'     =>  Inventory::latest()->get(),
            'row'       =>  Client::find($id)
        ];

        return view('admin.client-units.edit',$data);
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
            'name'      =>  'required',
            'project_id'        =>  'required',
            'unit_id'       =>  'required',
        ]);
        $data = $request->all();
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['link'] = url('/');
        $c = Client::find($id);
        $c->update($data);
        $data['client_id'] = $c->id;
        ClientTranslation::updateOrCreate(
            [
                'client_id' =>  $c->id,
                'locale'    =>  $locale
            ],
            [
                'name'      => $request->name,
                'project_id'        => $request->project_id,
                'unit_id'       => $request->unit_id,
                'link'      =>  $data['link'],
                'phone'     => $request->phone,
            ]
        );
        notify()->success('Sent units updated successfully!');
        return redirect()->route('admin.client-units.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c = Client::find($id);
        ClientTranslation::where('client_id')->delete();
        $c->delete();
        notify()->success('Sent units deleted successfully!');
        return redirect()->route('admin.client-units.index');

    }
}
