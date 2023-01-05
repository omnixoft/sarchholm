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
                        <h2>{{trans('file.agent_list')}}</h2>
                        <span><a href="">{{trans('file.home')}}</a></span>
                        <span>{{trans('file.agent_list_view')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb section ends-->
    <!--Listing Filter starts-->
    <div class="filter-wrapper style1">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 order-xl-12 order-xl-2 order-2">
                    <div class="agent-details-wrapper">
                        <div class="row pb-30 align-items-center">
                            <div class="col-lg-3 col-sm-5 col-5">
                                <div class="item-view-mode res-box">
                                    <!-- item-filter-list Menu starts -->
                                    <ul class="nav item-filter-list" role="tablist">
                                        <li><a  data-toggle="tab" href="#grid-view"><i class="las la-th-large"></i></a></li>
                                        <li><a class="active" data-toggle="tab" href="#list-view"><i class="las la-list"></i></a></li>
                                    </ul>
                                    <!-- item-filter-list Menu ends -->
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-7 col-7">
                                <select class="listing-input hero__form-input  form-control custom-select" id="sort">
                                    <option value="1">Sort by Newest</option>
                                    <option value="2">Sort by Oldest</option>
                                    <option>Sort by Featured</option>
                                    <option>Sort by Price(Low to High)</option>
                                    <option>Sort by Price(Low to High)</option>
                                </select>
                            </div>
                            <div class="col-lg-5 col-sm-12">
                                <div class="item-element res-box  text-right sm-left">
                                    <p>Showing <span> {{($agents->currentPage()-1)* $agents->perPage()+($agents->total() ? 1:0)}} to {{($agents->currentPage()-1)*$agents->perPage()+count($agents)}}  of  {{$agents->total()}}</span>  Listings</p>
                                </div>
                            </div>
                        </div>
                        <div class="item-wrapper">
                            <div class="tab-content">
                                <div id="grid-view" class="tab-pane fade agent-grid">
                                    <div class="row">
                                        @foreach($agents as $agent)
                                        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-12">
                                            <div class="single-team-member agent-item v1">
                                                @if(!env('USER_VERIFIED'))
                                                <img loading="lazy" src="{{'images/users/agent_1.jpg'}}" alt="" width="380" height="400">
                                                @else
                                                <img loading="lazy" src="{!! $agent->photo() !!}" alt="">
                                                @endif
                                                <div class="single-team-info">
                                                    <div class="agent-content">
                                                        <h4><a href="{{url('/agents/'.$agent->id)}}">{{$agent->f_name}} {{$agent->l_name}}</a></h4>
                                                        <span>{{$agent->title}}</span>
                                                        <ul class="list">
                                                            <li>
                                                                <div class="contact-info">
                                                                    <div class="icon">
                                                                        <i class="las la-phone-alt"></i>
                                                                    </div>
                                                                    <div class="text"><a href="tel:44078767595">{{$agent->mobile}}</a></div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="contact-info">
                                                                    <div class="icon">
                                                                        <i class="las la-envelope"></i>
                                                                    </div>
                                                                    <div class="text"><a href="#">{{$agent->email}}</a></div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <ul class="social-buttons style2">
                                                            <li><a href="{{$agent->fb}}"><i class="lab la-facebook-f"></i></a></li>
                                                            <li><a href="{{$agent->twitter}}"><i class="lab la-twitter"></i></a></li>
                                                            <li><a href="{{$agent->instagram}}"><i class="lab la-pinterest-p"></i></a></li>
                                                            <li><a href="{{$agent->fb}}"><i class="lab la-youtube"></i></a></li>
                                                        </ul>
                                                        <a href="{{url('/agents/'.$agent->id)}}" class="agent-link">{{trans('file.view_profile')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div id="list-view" class="tab-pane fade show active agent-list">
                                    @foreach($agents as $agent)
                                    <div class="single-agent-box mb-30">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-12">
                                                <div class="single-team-member agent-item">
                                                    @if(!env('USER_VERIFIED'))
                                                    <img loading="lazy" src="{{'images/users/agent_1.jpg'}}" alt="" width="380" height="400">
                                                    @else
                                                    <img loading="lazy" src="{!! $agent->photo() !!}" alt="">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-sm-12">
                                                <div class="single-team-info">
                                                    <div class="agent-content">
                                                        <h4><a href="{{url('/agents/'.$agent->id)}}">{{$agent->f_name}} {{$agent->l_name}}</a></h4>
                                                        <span>{{$agent->title}}</span>
                                                        <ul class="list">
                                                            <li>
                                                                <div class="contact-info">
                                                                    <div class="icon">
                                                                        <i class="las la-phone-alt"></i>
                                                                    </div>
                                                                    <div class="text"><a href="tel:44078767595">{{$agent->mobile}}</a></div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="contact-info">
                                                                    <div class="icon">
                                                                        <i class="las la-envelope"></i>
                                                                    </div>
                                                                    <div class="text"><a href="#">{{$agent->email}}</a></div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <ul class="social-buttons style2">
                                                            <li><a href="{{$agent->fb}}"><i class="lab la-facebook-f"></i></a></li>
                                                            <li><a href="{{$agent->twitter}}"><i class="lab la-twitter"></i></a></li>
                                                            <li><a href="{{$agent->fb}}"><i class="lab la-pinterest-p"></i></a></li>
                                                            <li><a href="{{$agent->fb}}"><i class="lab la-youtube"></i></a></li>
                                                        </ul>
                                                        <a href="{{url('/agents/'.$agent->id)}}" class="agent-link">View Profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!--pagination starts-->
                                    {{ $agents->links('vendor.pagination.custom') }}
                                <!--pagination ends-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 order-xl-12 order-xl-1 order-1">
                    <!--Sidebar starts-->
                    <div class="sidebar-right">
                        <div class="widget categories">
                            <h3 class="widget-title">{{trans('file.property_type')}}</h3>
                            <ul class="icon">
                                @foreach($categories as $category)
                                <li><a href="{{route('get.category',$category->name)}}">{{$category->categoryTranslation->name ?? $category->categoryTranslationEnglish->name ?? null}}</a><span>({{$category->properties->count()}})</span></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget recent">
                            <h3 class="widget-title">{{trans('file.recently_added')}}</h3>
                            <ul class="post-list">
                                @foreach($recentlyAdded as $item)
                                <li class="row recent-list">
                                    <div class="col-lg-5 col-4">
                                        <div class="entry-img">
                                            @if(!env('USER_VERIFIED'))
                                            <img loading="lazy" src="{{'images/thumbnail/property_1.jpg'}}" alt="" width="750" height="500">
                                            @else
                                            <img loading="lazy" src="{!! $item->photo() !!}" alt="">
                                            @endif
                                            <span>For {{$item->type =='sale' ? 'Sale' : 'Rent'}}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-8 no-pad-left">
                                        <div class="entry-text">
                                            <h4 class="entry-title"><a href="{{route('front.property',['property'=>$item->id])}}">{{$item->propertyTranslation->title ?? $item->propertyTranslationEnglish->title ?? null}}</a></h4>
                                            <div class="property-location no-pad-lr d-flex">
                                                <i class="las la-map-marker-alt"></i>
                                                <p>{{$item->state->stateTranslation->name ?? $item->state->stateTranslationEnglish->name ?? null }}, {{$item->city->cityTranslation->name ?? $item->city->cityTranslationEnglish->name ?? null}}</p>
                                            </div>
                                            <div class="trend-open">
                                                @if($item->type == 'rent')<p>${{$item->price}}<span> /month</span></p>@endif
                                                @if($item->type == 'sale')<p><span>starts from/</span> ${{$item->price}}</p>@endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!--Sidebar ends-->
                </div>
            </div>
        </div>
    </div>
    <!--Listing Filter ends-->
@endsection
@push('script')
<script>
    $('#sort').on('change',function(){
        var agent = $(this).val();
$('.list-agent').hide();
        $.ajax({
            method:'post',
            url: '{{route('agent.sort')}}',
            data: {agent:agent,"_token":"{{csrf_token()}}"},
            dataType:'html',
            success:function(response){
                $('#list-view').html(response);
            }
        });
    });
</script>
@endpush
