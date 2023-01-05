<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogCategoryTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        // $this->middleware('isApprove', ['only' =>['edit','update','destroy']]);
    }

    public function index(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = BlogCategory::with(['blogCategoryTranslation','blogCategoryTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($row) use ($locale)
                {
                    return $row->blogCategoryTranslation->name ?? $row->blogCategoryTranslationEnglish->name ?? null;
                })
                ->addColumn('parent', function (BlogCategory $category) {
                    if($category->parent)
                    {
                        return $category->parent->name;
                    }else{
                        return '-';
                    }
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
                    <a href="'.route('admin.blog-categories.edit',$row->id).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>

                 | <form action="'.route('admin.blog-categories.destroy',$row->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
               <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                </form></div>';
                    return $actionBtn;
                })
                ->rawColumns(['action','action1'])
                ->make(true);
        }
        return view('admin.blog-categories.index');
    }

    public function create()
    {
        App::setLocale(Session::get('currentLocal'));
        $categories = BlogCategory::where('status',1)->get();
        return view('admin.blog-categories.create',compact('categories'));
    }

    public function store(Request$request)
    {
        request()->validate([
            'parent_id' => 'nullable',
            'name' => 'required',
            'order' => 'nullable',
            'status' => 'nullable',
        ]);

        $data = $request->all();
        $data['parent_id'] = $data['parent_id'] == "" ? Null : $data['parent_id'];
        $blogCategory = BlogCategory::create($data);
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');

        BlogCategoryTranslation::create([
            'category_id'=> $blogCategory->id,
            'locale'=> $locale,
            'name'=>request('name')
        ]);

        return redirect()->route('admin.blog-categories.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = BlogCategory::find($id);

        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $blogCategoryTranslation = BlogCategoryTranslation::where('category_id',$category->id)->where('locale',$locale)->first();
        if (!isset($blogCategoryTranslation)) {
            $blogCategoryTranslation = BlogCategoryTranslation::where('category_id',$category->id)->where('locale','en')->first();
        }

        $categories = BlogCategory::where('status',1)->get();

        return view('admin.blog-categories.edit',compact('category','categories','blogCategoryTranslation','locale'));
    }

    public function update(Request $request, $id)
    {
        $blog_category = BlogCategory::find($id);
        $blog_category->update($this->validateBlogCategory());

        BlogCategoryTranslation::updateOrCreate(
            [
                'category_id' => $blog_category->id,
                'locale'    => request('locale'),
            ], //condition
            [
                'name' => $blog_category->name,
            ]
        );
        return redirect()->route('admin.blog-categories.index');
    }

    public function destroy($id)
    {
        $category = BlogCategory::find($id);
        BlogCategoryTranslation::where('category_id',$category->id)->delete();
        // Blog::where('category_id',$category->id)->update(['category_id' => null]);
        $category->delete();
        return redirect()->route('admin.blog-categories.index');
    }

    protected function validateBlogCategory()
    {
        return request()->validate([
            'parent_id' => 'nullable',
            'name' => 'required',
            'order' => 'nullable',
            'status' => 'nullable',
        ]);
    }
}
