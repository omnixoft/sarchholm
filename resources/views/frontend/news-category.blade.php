@extends('frontend.main')
@push('styles')
<style>
    .load-overlay{
        display: none;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 999;
        background: rgba(255,255,255,0.8) url({{asset('images/breadcrumb/loader3.gif')}}) center no-repeat;
    }
    /* Turn off scrollbar when body element has the loading class */
    body.loading{
        overflow: hidden;
    }
    /* Make spinner image visible when body element has the loading class */
    body.loading .load-overlay{
        display: block;
    }
</style>
@endpush
@section('content')
    <!--Breadcrumb section starts-->
    @if(!env('USER_VERIFIED'))
    <div class="breadcrumb-section bg-h" style="background-image: url('{{asset('images/breadcrumb/breadcrumb_1.jpg')}}')">
    @else
    <div class="breadcrumb-section bg-h" style="background-image: url('{{asset('images/breadcrumb/breadcrumb_2.jpg')}}')">
    @endif
        <div class="overlay op-5"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="breadcrumb-menu">
                        <h2>{{trans('file.news')}}</h2>
                        <span><a href="#">{{trans('file.home')}}</a></span>
                        <span>{{trans('file.news')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb section ends-->
    <!--Blog section starts-->

    <!--Blog section starts-->
    <div class="blog-area">
        <div class="container">
            <div class="row">

                <!--Blog post starts-->
                <div class="col-xl-8 order-xl-12 order-xl-2 order-2">
                    <div class="blog-section style1 pt-100">
                        <div class="container">
                            <div class="row get-blog">
                                @foreach($newses as $news)
                                    @php
                                        $createdAt = \Carbon\Carbon::parse($news->created_at);
                                    @endphp
                                    <div class="col-md-6 col-sm-12">
                                        <div class="card single-blog-item v1">
                                            @if(file_exists( public_path() . '/images/thumbnail/'.$news->image))
                                                <img loading="lazy" src="{{ URL::asset('images/thumbnail/'.$news->image) }}" alt="...">
                                            @else
                                                <img src="{{asset('/images/blog/news_1.jpg')}}" alt="place-image">
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
                            <!--pagination starts-->
                        {{ $newses->links('vendor.pagination.custom') }}

                        <!--pagination ends-->
                        </div>
                    </div>
                </div>
                <!--Blog post ends-->
                <!-- Sidebar starts-->
                <div class="col-xl-4 order-xl-12 order-xl-1 order-1">
                    <div class="sidebar">
                        <div class="sidebar-right">
                            {{-- <div class="widget search">

                                    <input type="text" class="form-control" placeholder="Search" id="search-blog">
                                    <button type="submit" class="search-button"><i class="lnr lnr-magnifier"></i></button>

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
                                    @foreach($newses as $recentlyAddedPost)
                                        @php
                                            $createdAt = \Carbon\Carbon::parse($recentlyAddedPost->created_at);
                                        @endphp
                                    <li class="row recent-list">
                                        <div class="col-lg-5 col-4">
                                            <div class="entry-img">
                                                @if(file_exists( public_path() . '/images/thumbnail/'.$recentlyAddedPost->image))
                                                    <img loading="lazy" src="{{URL::asset('/images/thumbnail/'.$recentlyAddedPost->image)}}" alt="...">
                                                @else
                                                    <img src="{{asset('/images/blog/news_1.jpg')}}" alt="place-image">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-8 no-pad-left">
                                            <div class="entry-text">
                                                <h4 class="entry-title"><a href="{{route('news.show',$recentlyAddedPost)}}">{{$recentlyAddedPost->blogTranslation->title ?? $recentlyAddedPost->blogTranslationEnglish->title  ?? 'title' }}</a></h4>
                                                <div class="property-location no-pad-lr d-flex">
                                                    <p>{{$createdAt->toFormattedDateString()}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="widget">
                                <h3 class="widget-title">Tags</h3>
                                <ul class="list-tags">
                                    @foreach($tags as $tag)
                                    <li><a href="#" class="btn v2">{{$tag->tagTranslation->name ?? $tag->tagTranslationEnglish->name  ?? null }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Sidebar ends -->

            </div>
        </div>
    </div>
    <!--Blog section ends-->
    <div class="load-overlay"></div>
@endsection
@push('script')
<script>
    $('#search-blog').on('keyup',function(){
        var search = $(this).val();
//        alert(search);
        $.ajax({
            method:'post',
            url: '{{route('search.blogs')}}',
            data: {search:search,"_token":"{{csrf_token()}}"},
            dataType:'html',
            success:function(response){
                $('.get-blog').html(response);
            }
        });
    });

    // Add remove loading class on body element based on Ajax request status
    $(document).on({
        ajaxStart: function(){
            $("body").addClass("loading");
        },
        ajaxStop: function(){
            $("body").removeClass("loading");
        }
    });
</script>
@endpush
