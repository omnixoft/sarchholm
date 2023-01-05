<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectTranslation;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use App\Models\ProjectLandmark;
use App\Models\ProjectLandmarkTranslation;
use App\Models\Amenity;
use App\Models\AmenityTranslation;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = Project::latest()->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function (Project $p) use ($locale) {
                    return $p->name;
                })
                ->addColumn('location', function (Project $p) {
                    return $p->location;
                })
                ->addColumn('overall_sqm', function (Project $p) use ($locale) {
                    return $p->overall_sqm;
                })
                ->addColumn('action', function (Project $p) {
                    $actionBtn = '<div class="d-flex justify-content-end">
                    <a href="' . route('admin.projects.edit', $p->id) . '" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>
                 | <a href="' . route('admin.projects.destroy', $p->id) . '" class="edit btn btn-danger btn-sm"><i class="la la-trash"></i></a>
                 | <a href="' . url('admin/projects/landmarks', $p->id) . '" class="edit btn btn-primary btn-sm">Landmarks</a>
                 | <a href="' . url('admin/projects/amenities', $p->id) . '" class="edit btn btn-primary btn-sm">Amenities</a>
                 | <a href="' . route('admin.projects.buildings.index', $p->id) . '" class="edit btn btn-primary btn-sm">Buildings</a>
                 </div>';
                // ->addColumn('action', function (Project $p) {
                //     $actionBtn = '<div class="d-flex justify-content-end">
                //     <a href="' . url('admin/projects/edit', $p->id) . '" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>
                //     <a href="' . url('admin/projects/edit', $p->id) . '" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>
                //  | <a href="' . url('admin/projects/delete', $p->id) . '" class="edit btn btn-danger btn-sm"><i class="la la-trash"></i></a>
                //  | <a href="' . url('admin/projects/landmarks', $p->id) . '" class="edit btn btn-primary btn-sm">Landmarks</a>
                //  | <a href="' . url('admin/projects/amenities', $p->id) . '" class="edit btn btn-primary btn-sm">Amenities</a>
                //  </div>';
                    return $actionBtn;
                })
                ->make(true);
        }
        return view('admin.projects.index');
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        
        $data = request()->validate([
            'name' => 'required',
            'location' => 'required',
            'overall_sqm' => 'required',
        ]);

        $name = NULL;
        $arr = [];
        if ($request->cover_media_img != NULL) {
            foreach ($request->cover_media_img as $file) {
                $name = rand() . "." . $file->getClientOriginalExtension();
                $file->move(public_path('project_cover_media'), $name);
                array_push($arr, $name);
            }
        }
        $imgs           =   json_encode($arr);
        $video_urls     =   json_encode($request->cover_media_vid_url);
        $locale = Session::get('currentLocal');
        $data = $request->all();
        $data['cover_media_img']        =   $imgs;
        $data['cover_media_vid_url']    =   $video_urls;
        $data['project_link'] = $request->project_link;
        $pr = Project::create($data);
        $data['locale'] = $locale;
        $data['project_id'] = $pr->id;
        $pt = ProjectTranslation::create($data);
        notify()->success('Project added successfully!');
        return redirect()->route('admin.projects.index');
    }


    public function show(){
        
    }

    public function edit($id)
    {
        $data = [
            'row'   =>  Project::find($id)
        ];
        return view('admin.projects.edit', $data);
    }

    public function update(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'location' => 'required',
            'overall_sqm' => 'required',
        ]);
        $arr = [];
        if ($request->cover_media_img != NULL) {
            foreach ($request->cover_media_img as $file) {
                $name = rand() . "." . $file->getClientOriginalExtension();
                $file->move(public_path('project_cover_media'), $name);
                array_push($arr, $name);
            }
        }
        else{
            $arr = json_decode($request->eximgs);
        }
        $imgs           =   json_encode($arr);
        $video_urls     =   json_encode($request->cover_media_vid_url);
        $data['cover_media_img']        =   $imgs;
        $data['cover_media_vid_url']    =   $video_urls;
        $data['project_link'] = $request->project_link;
        $locale = Session::get('currentLocal');
        $pr = Project::find($request->id);
        $pr->update($data);
        $data['locale'] = $locale;
        $data['project_id'] = $pr->id;
        $pt = ProjectTranslation::updateOrCreate(
            [
                'project_id'    =>  $request->id,
                'locale'        =>  $data['locale']
            ],
            [
                'name'              =>  $request->name,
                'location'          =>  $request->location,
                'description'       =>  $request->description,
                'overall_sqm'   =>  $request->overall_sqm,
                'project_link'=> $request->project_link
            ]
        );
        notify()->success('Project updated successfully!');
        return redirect()->route('admin.projects.index');
    }

    public function delete($id)
    {
        $p = Project::find($id);
        $p->delete();
        return redirect()->route('admin.projects.index');
    }

    public function landmarks(Request $request, $project_id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = ProjectLandmark::where('project_id', $project_id)->latest()->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function (ProjectLandmark $p) use ($locale) {
                    return $p->name;
                })
                ->addColumn('map_location', function (ProjectLandmark $p) {
                    return $p->map_location;
                })
                ->addColumn('location_minutes', function (ProjectLandmark $p) use ($locale) {
                    return $p->location_minutes;
                })
                ->addColumn('action', function (ProjectLandmark $p) {
                    $actionBtn = '<div class="d-flex justify-content-end">
                    <a href="javascript:void(0)" class="edit btn btn-info btn-sm edit-project-landmark" data="'.$p->id.'"><i class="la la-edit"></i></a>
                 | <a href="' . url('admin/projects/landmarks/delete', $p->id) . '" class="edit btn btn-danger btn-sm"><i class="la la-trash"></i></a>
                 </div>';
                    return $actionBtn;
                })
                ->make(true);
        }
        return view('admin.landmarks.index', ['project_id' => $project_id,'project'=>Project::find($project_id)]);
    }

    public function addLandmark($id)
    {
        return view('admin.landmarks.create', ['project_id' => $id]);
    }
    public function saveLandmark(Request $request, $project_id)
    {
        $data = request()->validate([
            'name' => 'required',
            'map_location' => 'required',
            'location_minutes' => 'required',
            'location_image' => 'required',
        ]);
        $name = "";
        if ($request->location_image != NULL) {
            $name = rand() . "." . $request->location_image->getClientOriginalExtension();
            $request->location_image->move(public_path('landmark'), $name);
        }
        $data['location_image'] = $name;
        $data['project_id'] = $project_id;
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $pl = ProjectLandmark::create($data);
        $data['landmark_id'] = $pl->id;
        ProjectLandmarkTranslation::create($data);
        notify()->success('Project Landmark added successfully!');
        return redirect('admin/projects/landmarks/' . $project_id);
    }

    public function editLandmark($id)
    {
        return view('admin.landmarks.edit', ['row' => ProjectLandmark::find($id)])->render();
    }

    public function updateLandmark(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'map_location' => 'required',
            'location_minutes' => 'required',
            // 'location_image' => 'required',
        ]);
        $name = "";
        if ($request->location_image != NULL) {
            $name = rand() . "." . $request->location_image->getClientOriginalExtension();
            $request->location_image->move(public_path('landmark'), $name);
        }
        else{
            $name = $request->eximg;
        }
        $data['location_image'] = $name;
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $pl = ProjectLandmark::find($request->id);
        $pl->update($data);
        $data['landmark_id'] = $pl->id;
        ProjectLandmarkTranslation::updateOrCreate(
            [
                'landmark_id'   =>  $pl->id,
                'locale'        =>  $locale
            ],
            [
                'name'              =>  $request->name,
                'map_location'              =>  $request->map_location,
                'location_minutes'              =>  $request->location_minutes,
                'location_image'                =>  $request->location_image,
            ]
        );
        notify()->success('Project Landmark updated successfully!');
        return redirect('admin/projects/landmarks/' . $pl->project_id);
    }

    public function deleteLandmark($id)
    {
        $pl = ProjectLandmark::find($id)->delete();
        ProjectLandmarkTranslation::where('landmark_id', $id)->delete();
        notify()->success('Project Landmark updated successfully!');
        return redirect()->route('admin.projects.index');
    }


    public function amenities(Request $request, $project_id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = Amenity::where('project_id', $project_id)->latest()->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function (Amenity $p) use ($locale) {
                    return $p->name;
                })
                ->addColumn('action', function (Amenity $p) {
                    $actionBtn = '<div class="d-flex justify-content-end">
                    <a href="javascript:void(0)" class="edit btn btn-info btn-sm edit-project-project" data="'.$p->id.'"><i class="la la-edit"></i></a>
                 | <a href="' . url('admin/projects/amenities/delete', $p->id) . '" class="edit btn btn-danger btn-sm"><i class="la la-trash"></i></a>
                 </div>';
                    return $actionBtn;
                })
                ->make(true);
        }

        return view('admin.amenities.index', ['project_id' => $project_id,'project'=>Project::find($project_id)]);
    }


    public function addAmenities($project_id)
    {
        return view('admin.amenities.create', ['project_id' => $project_id]);
    }


    public function saveAmenities(Request $request, $project_id)
    {
        $data = request()->validate([
            'name' => 'required',
            'image' => 'required',
        ]);

        $data = $request->all();
        $name = "";
        if ($request->image != NULL) {
            $name = rand() . "." . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('amenities'), $name);
        }
        $data['image'] = $name;
        $data['project_id'] = $project_id;
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $am = Amenity::create($data);
        $data['amenity_id'] = $am->id;
        AmenityTranslation::create($data);
        notify()->success('Project Amenity added successfully!');
        return redirect('admin/projects/amenities/' . $project_id);
    }


    
    public function editAmenities($id)
    {
        return view('admin.amenities.edit', ['row' => Amenity::find($id)])->render();
    }

    public function deleteAmenities($id)
    {
        $am = Amenity::find($id)->delete();
        AmenityTranslation::where('amenity_id',$id)->delete();
        notify()->success('Project Landmark updated successfully!');
        return redirect()->route('admin.projects.index');
    }



    public function updateAmenities(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
        ]);

        $data = $request->all();
        $name = "";
        if ($request->image != NULL) {
            $name = rand() . "." . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('amenities'), $name);
        }
        else{
            $name = $request->eximg;
        }
        $data['image'] = $name;
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $am = Amenity::find($request->id);
        $am->update($data);
        $data['amenity_id'] = $am->id;
        AmenityTranslation::updateOrCreate(
            [
                'amenity_id'   =>  $am->id,
                'locale'        =>  $locale
            ],
            [
                'name'              =>  $request->name,
                'image'              =>  $name,
                'description'              =>  $request->description,
            ]
        );
        notify()->success('Project Amenity updated successfully!');
        return redirect('admin/projects/amenities/' . $am->project_id);
    }
}
