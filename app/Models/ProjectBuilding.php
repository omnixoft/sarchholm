<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class ProjectBuilding extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'payment_term_ids',
        'name',
        'capacity',
        'description',
        'code',
        'status',
    ];

     public static function getAllProjectBuilding(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = ProjectBuilding::with(['projectBuildingTranslation', 'projectBuildingTranslationEnglish'])
            ->orderBy('id', 'DESC')
            ->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($row) use ($locale) {
                return $row->projectBuildingTranslation->name ?? $row->projectBuildingTranslationEnglish->name ?? null;
            })
            ->addColumn('capacity', function ($row) use ($locale) {
                return $row->projectBuildingTranslation->capacity ?? $row->projectBuildingTranslationEnglish->capacity ?? null;
            })
            ->addColumn('code', function ($row) use ($locale) {
                return $row->projectBuildingTranslation->code ?? $row->projectBuildingTranslationEnglish->code ?? null;
            })
            ->addColumn('status', function ($row) use ($locale) {
                return $row->projectBuildingTranslation->status ?? $row->projectBuildingTranslationEnglish->status ?? null;
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '<div class="d-flex justify-content-end">
                <a href="javascript:void(0)" class="edit btn btn-info btn-sm edit-project-building" url="' . route('admin.projects.buildings.edit', [$row->project_id, $row->id]) . '" project="' . $row->project_id . '" data="' . $row->id . '">
                <i class="la la-edit"></i></a>

             | <form action="' . route('admin.projects.buildings.destroy', [$row->project_id, $row->id]) . '" method="POST">
                ' . csrf_field() . '
                ' . method_field("DELETE") . '
           <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
            </form></div>';
                return $actionBtn;
            })
            ->rawColumns(['action', 'capacity', 'code', 'status'])
            ->make(true);
    }

    public function projectBuildingTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(ProjectBuildingTranslation::class,'project_building_id')
            ->where('locale',$locale);
    }

    public function projectBuildingTranslationEnglish()
    {
        return $this->hasOne(ProjectBuildingTranslation::class, 'project_building_id')
            ->where('locale','en');
    }
}
//W0jcZ6t,o2Nu
