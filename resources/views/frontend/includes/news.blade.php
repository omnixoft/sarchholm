<!--Blog section starts-->
<div class="blog-posts v1 mt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title v1">
                    <p>{{trans('file.check_out_our_recent')}}</p>
                    <h2>{{trans('file.news_and_updates')}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($newses->take(3) as $news)
                @php
                    $createdAt = \Carbon\Carbon::parse($news->created_at);
                @endphp
            <div class="col-lg-4 col-md-6">
                <div class="card single-blog-item v1">
                @if(!env('USER_VERIFIED'))
                <img src="{{asset('/images/blog/news_1.jpg')}}" alt="place-image">
                @else
                    @if(file_exists( public_path() . '/images/thumbnail/'.$news->image))
                        <img loading="lazy" src="{{ URL::asset('images/thumbnail/'.$news->image) }}" alt="...">
                    @else
                        <img src="{{asset('/images/blog/news_1.jpg')}}" alt="place-image">
                    @endif
                @endif
                    <div class="card-body">
                        <a href="#" class="blog-cat">{{$popularTopics[$news->category_id]->blogCategoryTranslation->name ?? $popularTopics[$news->category_id]->blogCategoryTranslationEnglish->name  ?? null }}</a>
                        <h4 class="card-title"><a href="{{route('news.show',$news)}}">{{$news->blogTranslation->title ?? $news->blogTranslationEnglish->title  ?? null }}</a></h4>
                    </div>
                    <div class="bottom-content">
                        <p>By<a href="#">{{$news->user->f_name}} {{$news->user->l_name}}</a><span class="date">{{$createdAt->toFormattedDateString()}}</span> </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-12 text-center mt-1">
        <a href="{{url('/news')}}" class="btn v1">{{trans('file.browse_more')}}</a>
    </div>
</div>
<!--Blog section ends-->
