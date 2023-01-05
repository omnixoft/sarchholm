@extends('frontend.main')
@section('content')
    <!--Breadcrumb section starts-->
    @if(!env('USER_VERIFIED'))
    <div class="breadcrumb-section bg-h" style="background-image: url('{{asset('images/breadcrumb/breadcrumb_2.jpg')}}')">
    @else
    <div class="breadcrumb-section bg-h" style="background-image: url('{{asset('images/header/'.$headerImage->url)}}')">
    @endif
        <div class="overlay op-5"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="breadcrumb-menu">
                        <h2>{{trans('file.news_details')}}</h2>
                        <span><a href="#">{{trans('file.home')}}</a></span>
                        <span>{{trans('file.news_details')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb section ends-->
    <!--Blog Details section starts-->
    <div class="blog-area">
        <div class="container">
            <div class="row">
                <!-- left Sidebar starts-->
                <div class="col-xl-4 col-md-12">
                    <div class="sidebar">
                        <div class="sidebar-left">
                            {{-- <div class="widget search">
                                <form>
                                    <input type="text" class="form-control" placeholder="Search">
                                    <button type="submit" class="search-button"><i class="lnr lnr-magnifier"></i></button>
                                </form>
                            </div> --}}
                            <div class="widget categories">
                                <h3 class="widget-title">{{trans('file.popular_topic')}}</h3>
                                <ul class="icon">
                                    @foreach($popularTopics as $popularTopic)
                                    <li><a href="{{route('news.popular-topic',$popularTopic->name)}}">{{$popularTopic->blogCategoryTranslation->name ?? $popularTopic->blogCategoryTranslationEnglish->name  ?? null }}</a><span>({{$popularTopic->blogs->count()}})</span></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget recent">
                                <h3 class="widget-title">{{trans('file.recent_post')}}</h3>
                                <ul class="post-list">
                                    @foreach($recentlyAddedPosts as $recentlyAddedPost)
                                        @php
                                            $createdAt = \Carbon\Carbon::parse($recentlyAddedPost->created_at);
                                        @endphp
                                    <li class="row recent-list">
                                        <div class="col-lg-5 col-4">
                                            <div class="entry-img">
                                            @if(!env('USER_VERIFIED'))
                                            <img src="{{asset('/images/blog/news_1.jpg')}}" alt="place-image">
                                            @else
                                                @if(file_exists( public_path() . '/images/thumbnail/'.$recentlyAddedPost->image))
                                                    <img loading="lazy" src="{{URL::asset('/images/thumbnail/'.$recentlyAddedPost->image)}}" alt="...">
                                                @else
                                                    <img src="{{asset('/images/blog/news_1.jpg')}}" alt="place-image">
                                                @endif
                                            @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-8 no-pad-left">
                                            <div class="entry-text">
                                                <h4 class="entry-title"><a href="{{route('news.show',$recentlyAddedPost)}}">{{$recentlyAddedPost->blogTranslation->title ?? $recentlyAddedPost->blogTranslationEnglish->title  ?? 'title' }}</a></h4>
                                                <div class="property-location no-pad-lr">
                                                    <p>{{$createdAt->toFormattedDateString()}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget">
                                <h3 class="widget-title">{{trans('file.tags')}}</h3>
                                <ul class="list-tags">
                                    @foreach($tags as $tag)
                                    <li><a href="#" class="btn v2">{{$tag->tagTranslation->name ?? $tag->tagTranslation->name  ?? $tag->tagTranslationEnglish->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left Sidebar ends -->
                <!--Blog post starts-->
                @php
                    $createdAt = \Carbon\Carbon::parse($news->created_at);
                @endphp
                <div class="col-xl-8 col-md-12 py-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <article class="post-single">
                                    <div class="post-content-wrap">
                                        <div class="post-content">
                                            <h1 class="post-title text-center">{{$news->blogTranslation->title ?? $news->blogTranslationEnglish->title  ?? null }}</h1>
                                            <div class="post-meta text-center">
                                                <p class="date mt-0">{{$createdAt->toFormattedDateString()}} by <a href="#" class="text-dark">{{$news->user->f_name}} {{$news->user->l_name}}</a></p>
                                            </div>
                                        @if(!env('USER_VERIFIED'))
                                        <img class="post-img" src="{{asset('/images/blog/news_1.jpg')}}" alt="place-image">
                                        @else
                                            @if(file_exists( public_path() . '/images/gallery/'.$news->image))
                                                <img loading="lazy" class="post-img" src="{{ URL::asset('/images/gallery/'.$news->image) }}" alt="...">
                                            @else
                                                <img class="post-img" src="{{asset('/images/blog/news_1.jpg')}}" alt="place-image">
                                            @endif
                                        @endif
                                            <p>
                                                {!! $news->blogTranslation->body ?? $news->blogTranslation->body  ?? null !!}
                                            </p>
                                            <div class="row my-40">
                                                <div class="col-md-12">
                                                    <div class="post-tags">
                                                        <span>Tags :</span>
                                                        <ul class="list-tags">
                                                            @foreach($news->tags as $tag)
                                                            <li><a href="#" class="btn v2">{{$tag->tagTranslation->name ?? $tag->tagTranslationEnglish->name  ?? null }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-12 mt-3">
                                                    <div class="post-tags">
                                                        <span>Share :</span>
                                                        <ul class="social-buttons style1">
                                                            <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                                                            <li><a href="#"><i class="lab la-twitter"></i></a></li>
                                                            <li><a href="#"><i class="lab la-instagram"></i></a></li>
                                                            <li><a href="#"><i class="lab la-pinterest-p"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="author">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-4 col-xs-12">
                                                    <div class="author-img">
                                                @if(!env('USER_VERIFIED'))
                                                <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="#">
                                                @else
                                                        @if(file_exists( public_path() . '/images/users/'.$news->user->image))
                                                            <img loading="lazy" src="{{ URL::asset('/images/users/'.$news->user->image) }}" alt="image">
                                                        @else
                                                            <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="#">
                                                        @endif
                                                @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-9 col-sm-8 col-xs-12">
                                                    <div class="author-name">
                                                        <h4 class="d-tc">{{$news->user->f_name}} {{$news->user->l_name}}</h4>
                                                        <span class="d-tc">Real estate consultant</span>
                                                    </div>
                                                    <div class="author-info">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta in rerum cupiditate, culpa deleniti, ullam quo consequatur, perspiciatis earum blanditiis voluptatem laboriosam quia officiis. Consequuntur. Lorem ipsum dolor sit amet.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-nav">
                                        <div class="row">
                                            @if($previousPost)
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="page-prev">
                                                    <a href="{{route('news.show',$previousPost)}}">
                                                        <span>Previous Post</span>
                                                        <p>{{$previousPost->blogTranslation->title ?? $previousPost->blogTranslationEnglish->title  ?? null }}</p>
                                                    </a>
                                                </div>
                                            </div>
                                            @else
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="page-prev">
                                                    {{-- <a href="{{route('news.show',$previousPost)}}">
                                                        <span>Previous Post</span>
                                                        <p>{{$previousPost->blogTranslation->title ?? $previousPost->blogTranslationEnglish->title  ?? null }}</p>
                                                    </a> --}}
                                                </div>
                                            </div>
                                            @endif

                                            @if($nextPost)
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="page-next">
                                                    <a href="{{route('news.show',$nextPost)}}">
                                                        <span>Next Post</span>
                                                        <p>{{$nextPost->blogTranslation->title ?? $nextPost->blogTranslationEnglish->title  ?? null }}</p>
                                                    </a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Blog post ends-->
            </div>
        </div>
    </div>
    <!--Blog Details section  ends-->
@endsection
