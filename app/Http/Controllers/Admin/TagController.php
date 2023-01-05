<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\TagTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = Tag::with(['tagTranslation','tagTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($row) use ($locale)
                {
                    return $row->tagTranslation->name ?? $row->tagTranslationEnglish->name ?? null;
                })
                ->addColumn('action1',function($row){
                    if($row->status == 1)
                    {
                        $but =  '<span class="bg-primary p-1 text-white">Published</span>';
                        return $but;
                    }else{
                        $but = '<span class="bg-warning p-1 text-white">Pending</span>';
                        return $but;
                    }
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<div class="d-flex justify-content-end">
                    <a href="'.route('admin.tags.edit',$row->id).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a> 

                 | <form action="'.route('admin.tags.destroy',$row->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
               <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                </form></div>';
                    return $actionBtn;
                })
                ->rawColumns(['action','action1'])
                ->make(true);
        }
        return view('admin.tags.index');
    }

    public function create()
    {
        App::setLocale(Session::get('currentLocal'));
        return view('admin.tags.create');
    }

    public function store()
    {
       $tag =  Tag::create($this->validateTags());
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        TagTranslation::create([
            'tag_id'=> $tag->id,
            'locale'=> $locale,
            'name'=>request('name')
        ]);
        return redirect()->route('admin.tags.index');
    }

    public function show(Tag $tag)
    {
        //
    }

    public function edit(Tag $tag)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $tagTranslation = TagTranslation::where('tag_id',$tag->id)->where('locale',$locale)->first();
        if (!isset($tagTranslation)) {
            $tagTranslation = TagTranslation::where('tag_id',$tag->id)->where('locale','en')->first();
        }
        return view('admin.tags.edit',compact('tag','tagTranslation','locale'));
    }

    public function update(Tag $tag)
    {
        $tag->update($this->validateTags());
        TagTranslation::updateOrCreate(
            [
                'tag_id' => $tag->id,
                'locale'    => request('locale'),
            ], //condition
            [
                'name' => $tag->name,
            ]
        );
        return redirect()->route('admin.tags.index');
    }

    public function destroy(Tag $tag)
    {
        TagTranslation::where('tag_id',$tag->id)->delete();
        $tag->delete();
        return redirect()->route('admin.tags.index');
    }

    protected function validateTags()
    {
        return request()->validate([
            'name' => 'required',
            'order' => 'nullable',
            'status' => 'nullable',
        ]);
    }
}
