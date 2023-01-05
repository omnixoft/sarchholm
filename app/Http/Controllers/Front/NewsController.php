<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\HeaderImage;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    public function __construct()
    {
        Session::put('currentLocal', 'en');
        App::setLocale('en');
    }

    public function index()
    {
        App::setLocale(Session::get('currentLocal'));
        $newses = Blog::with('blogTranslation','user')->where('status','approved')->orderBy('id','desc')->paginate(4);
        $popularTopics = BlogCategory::with('blogCategoryTranslation','blogs')->where('status',1)->get()->keyBy('id');
        $tags = Tag::with('tagTranslation','tagTranslationEnglish')->where('status',1)->get();
        $headerImage = HeaderImage::where('page','news')->first();
        return view('frontend.news',compact('newses','popularTopics','tags','headerImage'));
    }

    public function show($news)
    {
        App::setLocale(Session::get('currentLocal'));

        $news = Blog::where('slug',$news)->first();

        $popularTopics = BlogCategory::where('status',1)->get();
        $recentlyAddedPosts = Blog::latest()->take(3)->get();
        $tags = Tag::where('status',1)->get();
        // dd($post);
        $previous = Blog::where('id', '<', $news->id)->max('id');
        $next = Blog::where('id', '>', $news->id)->min('id');

        $previousPost = Blog::where('id',$previous)->first();
        $nextPost = Blog::where('id',$next)->first();
        // dd($previousPost);
        $headerImage = HeaderImage::where('page','single-news')->first();

        return view('frontend.single-news',compact('news','popularTopics','recentlyAddedPosts','tags','previousPost','nextPost','previous','next','headerImage'));
    }

    public function searchBlogs(Request $request)
    {
        $blogs = Blog::where('title','LIKE','%'.$request->search.'%')->where('status','approved')->get();

        if(count($blogs) > 0)
        {
            foreach($blogs as $blog)
            {
                $createdAt = Carbon::parse($blog->created_at);

                $html = '
             <div class="col-md-6 col-sm-12">
                <div class="card single-blog-item v1">
                    <img src="images/thumbnail/'.$blog->image.'" alt="...">
                    <div class="card-body">
                        <a href="#" class="blog-cat">'.$blog->category->name.'</a>
                        <h4 class="card-title"><a href="'.route('news.show',$blog).'">'.$blog->title.'</a></h4>
                    </div>
                    <div class="bottom-content">
                        <p>By<a href="#">'.$blog->user->f_name.'.'.$blog->user->l_name.'</a><span class="date">'.$createdAt->toFormattedDateString().'</span> </p>
                    </div>
                </div>
            </div>
            ';
                echo $html;
            }
        }else{
            $html = '<div class="col-md-6 col-sm-12">
                        <h1>No Results Found!</h1>
                     </div>';
            echo $html;
        }

    }

    public function popularTopic($category)
    {
        App::setLocale(Session::get('currentLocal'));
        $category = BlogCategory::where('name',$category)->first();
        $popularTopics = BlogCategory::with('blogCategoryTranslation','blogs')->where('status',1)->get()->keyBy('id');
        $newses = Blog::with('blogTranslation','user')
                        ->where('category_id',$category->id)
                        ->where('status','approved')
                        ->orderBy('id','desc')
                        ->paginate(4);
        $tags = Tag::with('tagTranslation','tagTranslationEnglish')->where('status',1)->get();

        return view('frontend.news-category',compact('newses','popularTopics','tags'));

    }

    public function previousNextPost($id)
    {
        // $post = Blog::find($id);

        // $previous = Blog::where('id', '<', $post->id)->max('id');
        // $next = Blog::where('id', '>', $post->id)->min('id');
    }
}
