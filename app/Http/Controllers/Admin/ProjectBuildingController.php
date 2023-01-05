<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectBuilding;
use App\Models\ProjectBuildingTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\PaymentTerm;
class ProjectBuildingController extends Controller
{

    public function index($project_id, Request $request)
    {
        if ($request->ajax()) {
           return ProjectBuilding::getAllProjectBuilding($request);
        }
         $data = [
            'terms' =>  PaymentTerm::latest()->get(),
            'project_id'=>$project_id,
            'project'=>Project::find($project_id)
        ];
        return view('admin.projects.buildings.index', $data);
    }

    public function create($project_id)
    {
        $data = [
            'terms' =>  PaymentTerm::latest()->get(),
            'project_id'=>$project_id
        ];
        return view('admin.projects.buildings.create', $data);
    }

    public function store($project_id, Request $request)
    {
        $data = request()->validate([
            'payment_term_ids' => 'required',
            'name' => 'required',
            'capacity' => 'required',
            'description' => 'required',
            'code' => 'required',
            'status' => 'required',
        ]);
        $data['payment_term_ids'] = json_encode($request->payment_term_ids);
        $locale = Session::get('currentLocal');
        $data['project_id'] = $project_id;
        $data['locale'] = $locale;

        $projectBuilding = ProjectBuilding::create($data);
        $data['project_building_id'] = $projectBuilding->id;
        $projectBuildingTranslation = ProjectBuildingTranslation::create($data);

        notify()->success('Building added successfully!');
        return redirect()->route('admin.projects.buildings.index', $project_id);
    }

    public function show($id)
    {
        //
    }

    public function edit($project_id, $id)
    {
        // dd($project_id.'  '.$id);
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $projectBuilding = ProjectBuilding::findOrFail($id);
        $terms =  PaymentTerm::latest()->get();
        $projectBuildingTranslation =  ProjectBuildingTranslation::where('project_building_id', $id)->where('locale', $locale)->first();
        return view('admin.projects.buildings.edit',compact('projectBuilding', 'terms','projectBuildingTranslation','locale', 'project_id'))->render();
    }

    public function update($project_id, Request $request,$id)
    {
        $data = request()->validate([
            'payment_term_ids' => 'required',
            'name' => 'required',
            'capacity' => 'required',
            'description' => 'required',
            'code' => 'required',
            'status' => 'required',
        ]);
        $data['project_building_id'] = $id;
        $locale = Session::get('currentLocal');
        $data['projectBuildingId'] = $id;
        $data['locale'] = $locale;
        $data['payment_term_ids'] = json_encode($request->payment_term_ids);
        if ($data['locale'] == 'en') {
            $projectBuilding = ProjectBuilding::findOrFail($id);
            $projectBuilding->update($data);
        }

        ProjectBuildingTranslation::updateOrCreate(
            [
                'project_building_id' => $data['projectBuildingId'],
                'locale'    =>  $data['locale'],
            ], //condition
            [
                'payment_term_ids' => $data['payment_term_ids'],
                'name' => $data['name'],
                'capacity' => $data['capacity'],
                'description' => $data['description'],
                'code' => $data['code'],
                'status' => $data['status']
            ]
        );

        notify()->success('Building updated successfully!');
        return redirect()->route('admin.projects.buildings.index', $projectBuilding->project_id);
    }

    public function destroy($project_id, $id)
    {
        $projectBuilding = ProjectBuilding::findOrFail($id);
        $projectBuilding->delete();

        ProjectBuildingTranslation::where('project_building_id', $id)->delete();

        notify()->success('Building deleted successfully!');
        return redirect()->route('admin.projects.buildings.index', $project_id);
    }

}
