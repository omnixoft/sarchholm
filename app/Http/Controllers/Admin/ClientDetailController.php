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
use App\Models\ClientDetailTranslation;

class ClientDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd('asd');
        if ($request->ajax()) {
            App::setLocale(Session::get('currentLocal'));
            $locale = Session::get('currentLocal');
            $data = ClientDetail::latest()->get();
                // ->groupBy('client_id')
                // ->latest()
                

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('client_name', function ($row) use ($locale) {
                    return $row->client->name ?? $row->client->name ?? null;
                })
                ->addColumn('client_phone', function ($row) use ($locale) {
                    return $row->client->phone ?? $row->client->phone ?? null;
                })
                ->addColumn('project', function ($row) use ($locale) {
                    return $row->project->name ?? $row->project->name ?? null;
                })
                ->addColumn('unit', function ($row) use ($locale) {
                    return $row->unit->name ?? $row->unit->name ?? null;
                })
                ->addColumn('action', function ($row) {
                    $data = $row->project->project_link ?? $row->project->project_link ?? null;
                    return '<a href="javascript:void(0)" data="'.$data.'" class="btn btn-sm btn-primary show-unit-link">Project Link</a>';
                 
                })
                ->addColumn('vists', function ($row) use ($locale) {
                    return ClientDetail::where('client_id',$row->client_id)->count();
                })
                ->addColumn('duration', function ($row) use ($locale) {
                    return $row->duration_per_visit;
                    // $dd = ClientDetail::find($row->id);
                    // return (isset($dd->duration_per_visit) ? $dd->duration_per_visit : 0);
                })
                ->addColumn('request_for_call', function ($row) use ($locale) {
                    return $row->clientTranslation->request_for_call ?? $row->clientTranslationEnglish->request_for_call ?? 0;
                })
                ->addColumn('like', function ($row) use ($locale) {
                    $ddd = Client::find($row->client_id);
                    return (isset($ddd->likes) ? $ddd->likes : 0);
                })
                ->rawColumns(['action','client_name','client_phone','project','unit','vists','duration','request_for_call','like'])
                ->make(true);
        }

        return view('admin.client-units.client-details');
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
        //
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
