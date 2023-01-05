<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTranslation;
use App\Models\Tag;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    public function __construct()
    {
        // $this->middleware('isApprove', ['only' =>['edit','update','destroy']]);
    }

    public function index(Request $request)
    {
        $user = auth()->user();
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        if($user->type == 'admin')
        {
            $data = Blog::with(['blogTranslation','blogTranslationEnglish'])
                ->orderBy('id','DESC')
                ->get();
        }

        if($user->type == 'user')
        {
            $data = Blog::with(['blogTranslation','blogTranslationEnglish'])
                ->orderBy('id','DESC')
                ->where('user_id','=',$user->id)
                ->get();
        }

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('category', function (Blog $blog) use ($locale){
                    return $blog->category->blogCategoryTranslation->name ?? $blog->category->blogCategoryTranslationEnglish->name ?? null;

                })
                ->addColumn('user', function (Blog $blog) {
                    if($blog->user)
                    {
                        return $blog->user->f_name.' '.$blog->user->l_name;
                    }else{
                        return '-';
                    }
                })
                ->addColumn('title', function ($row) use ($locale)
                {
                    return $row->blogTranslation->title ?? $row->blogTranslationEnglish->title ?? null;
                })
                ->addColumn('action1',function($row){
                    if($row->status == 'approved')
                    {
                        $but =  '<span class="bg-primary p-1 text-white">Approved</span>';
                        return $but;
                    }elseif($row->status == 'pending'){
                        $but = '<span class="bg-warning p-1 text-white">Pending</span>';
                        return $but;
                    }else{
                        $but = '<span class="bg-danger p-1 text-white">Rejected</span>';
                        return $but;
                    }
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<div class="d-flex justify-content-end">
                    <a href="'.route('admin.blogs.edit',$row).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>

                 | <form action="'.route('admin.blogs.destroy',$row).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
               <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                </form></div>';
                    return $actionBtn;
                })
                ->rawColumns(['action','action1'])
                ->make(true);
        }
        return view('admin.blogs.index');
    }

    public function create()
    {
        App::setLocale(Session::get('currentLocal'));
        $categories =  BlogCategory::where('status',1)->get();
        $tags = Tag::all();
        return view('admin.blogs.create',compact('categories','tags'));
    }

    public function store(Request $request)
    {

        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');

        request()->validate([
            'category_id'=>'required',
            'user_id' => 'required',
            'title' => 'required|min:10',
            'slug'=> 'nullable|unique:blogs',
            'image'=>'required',
            'body'=> 'required'
        ],[
            'category_id.required'=>'The category field is required',
            'body.required'=>'content field is required'
        ]);
        //thumbnail image save start
        $thumbnailImage = $request->file('image');
        $slug =  Str::slug($request->input('title'));
        if (isset($thumbnailImage))
        {
            $currentDate = Carbon::now()->toDateString();
            $fileName = $slug.'-'.$currentDate.'-'.uniqid();
            // $image = \Intervention\Image\Facades\Image::make($thumbnailImage)->encode('webp', 90)->fit(750, 500)->save(public_path('images/thumbnail/'  .  $fileName . '.webp'));
            $image = \Intervention\Image\Facades\Image::make($thumbnailImage)->encode('jpg', 90)->fit(750, 500)->save(public_path('images/thumbnail/'  .  $fileName . '.jpg'));
            \Intervention\Image\Facades\Image::make($thumbnailImage)->encode('jpg', 90)->fit(1024, 450)->save(public_path('images/gallery/'  .  $fileName . '.jpg'));
            // \Intervention\Image\Facades\Image::make($thumbnailImage)->encode('webp', 90)->fit(1024, 450)->save(public_path('images/gallery/'  .  $fileName . '.webp'));
            $thumbnailName = $image->basename;
        } else
        {
            $thumbnailName ='default.png';
        }
        //thumbnail image save end


      $blog =   Blog::create([
            'category_id'=>request('category_id'),
            'user_id' => request('user_id'),
            'title' => request('title'),
            'slug'=> $slug,
            'image'=> $thumbnailName,
            'body'=> request('body')
        ]);
        $blog->tags()->sync($request->tags);

        BlogTranslation::create([
            'blog_id'=>$blog->id,
            'locale'=> $locale,
            'title' => request('title'),
            'slug'=> $slug,
            'body'=> request('body')
        ]);
        return redirect()->route('admin.blogs.index');
    }

    public function show($id)
    {
        //
    }


    public function edit(Blog $blog)
    {
        $categories =  BlogCategory::where('status',1)->get();
        $tags = Tag::all();
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $blogTranslation = BlogTranslation::where('blog_id',$blog->id)->where('locale',$locale)->first();
        if (!isset($blogTranslation)) {
            $blogTranslation = BlogTranslation::where('blog_id',$blog->id)->where('locale','en')->first();
        }
        return view('admin.blogs.edit',compact('blog','categories','tags','locale','blogTranslation'));
    }

    public function update(Request $request, Blog $blog)
    {
//        request()->validate([
//            'category_id'=>'required',
//            'user_id' => 'required',
//            'title' => 'required|min:10',
//            'slug'=> 'required',
//            'image'=>'required',
//            'body'=> 'required'
//        ]);
        //thumbnail image save start
        $thumbnailImage = $request->file('image');
//        dd($thumbnailImage);
        $slug =  Str::slug($request->input('title'));

        if (isset($thumbnailImage))
        {
            // Storage::disk('public')->delete("thumbnail/{$blog->image}");
            File::delete(public_path() . "/images/thumbnail/{$blog->image}");
            File::delete(public_path() . "/images/gallery/{$blog->image}");

            $currentDate = Carbon::now()->toDateString();
            $fileName = $slug.'-'.$currentDate.'-'.uniqid();
            $image = \Intervention\Image\Facades\Image::make($thumbnailImage)->encode('jpg', 90)->fit(750, 500)->save(public_path('images/thumbnail/'  .  $fileName . '.jpg'));
            \Intervention\Image\Facades\Image::make($thumbnailImage)->encode('jpg', 90)->fit(1024, 450)->save(public_path('images/gallery/'  .  $fileName . '.jpg'));
            $thumbnailName = $image->basename;
        } else
        {
            $thumbnailName =$blog->image;
        }
        //thumbnail image save end
        $user = auth()->user();
        if($user->type == 'admin')
        {
            $blog->update([
                'category_id'=>request('category_id'),
                'user_id' => request('user_id'),
                'title' => request('title'),
                'slug'=> $slug,
                'image'=> $thumbnailName,
                'body'=> request('body'),
                'status'=>request('status'),
            ]);
        }
        else{

            $blog->update([
                'category_id'=>request('category_id'),
                'user_id' => request('user_id'),
                'title' => request('title'),
                'slug'=> $slug,
                'image'=> $thumbnailName,
                'body'=> request('body')
            ]);
        }



        $blog->tags()->sync($request->tags);
        BlogTranslation::updateOrCreate(
            [
                'blog_id' => $blog->id,
                'locale'    => request('locale'),
            ], //condition
            [
                'title' => $blog->title,
                'slug'=> $slug,
                'body'=> request('body')
            ]
        );

        return redirect()->route('admin.blogs.index');
    }


    public function destroy(Blog $blog)
    {
        File::delete(public_path() . "/images/thumbnail/{$blog->image}");
        File::delete(public_path() . "/images/gallery/{$blog->image}");
        $blog->delete();
        return redirect()->route('admin.blogs.index');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
        return response()->json(['slug'=>$slug]);
    }
}
