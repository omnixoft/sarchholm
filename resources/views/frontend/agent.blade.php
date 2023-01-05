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
                        <h2>{{trans('file.agent_profile')}}</h2>
                        <span><a href="#">{{trans('file.home')}}</a></span>
                        <span>{{trans('file.agent_profile')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb section ends-->
    <!-- Agent section starts -->
    <div class="agent-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 order-xl-12 order-xl-2 order-2">
                    <div class="agent-details-wrapper">
                        <div class="row mb-50">
                            <div class="col-lg-5 col-md-6 col-sm-5">
                            @if(!env('USER_VERIFIED'))
                            <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="#">
                            @else
                                @if(file_exists( public_path() . '/images/users/'.$agent->image))
                                    <img loading="lazy" src="{{ URL::asset('/images/users/'.$agent->image) }}" alt="Image">
                                @else
                                    <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="#">
                                @endif
                            @endif
                            </div>
                            <div class="col-lg-7 col-md-6 col-sm-7">
                                <div class="agent-details">
                                    <h3>{{$agent->f_name}} {{$agent->l_name}}</h3>
                                    <ul class="address-list">
                                        @if($agent->company_name)<li><span>{{trans('file.company')}}:</span>{{$agent->company_name}}</li>@endif
                                        @if($agent->title)<li><span>{{trans('file.title')}}:</span>{{$agent->title}}</li>@endif
                                        @if($agent->mobile_office)<li><span>{{trans('file.mobile_office')}}:</span>{{$agent->mobile_office}}</li>@endif
                                        @if($agent->mobile)<li><span>{{trans('file.mobile')}}:</span>{{$agent->mobile}}</li>@endif
                                        @if($agent->email)<li><span>{{trans('file.email')}}:</span>{{$agent->email}}</li>@endif
                                        @if($agent->skype)<li><span>{{trans('file.skype')}}:</span>{{$agent->skype}}</li>@endif
                                    </ul>
                                    <ul class="social-buttons style1">
                                        <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="lab la-twitter"></i></a></li>
                                        <li><a href="#"><i class="lab la-pinterest-p"></i></a></li>
                                        <li><a href="#"><i class="lab la-youtube"></i></a></li>
                                        <li><a href="#"><i class="lab la-dribbble"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="agent-bio">
                                    <h3>{{trans('file.about_me')}}</h3>
                                    <p>
                                        {{$agent->description}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h3>{{trans('file.my_listing')}}</h3>
                                <div class="agent-listings">
                                    <ul class="nav nav-tabs list-details-tab">
                                        <li class="nav-item active">
                                            <a data-toggle="tab" href="#all_property">{{trans('file.all_property')}}</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a data-toggle="tab" href="#for_sale">{{trans('file.for_sale')}}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#for_rent">{{trans('file.for_rent')}}</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-30 add_list_content">
                                        <div class="tab-pane fade show active" id="all_property">
                                            <div class="row">
                                                @foreach($properties as $property)
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="single-property-box">
                                                        <div class="property-item">
                                                            <a class="property-img" href="{{route('front.property',['property'=>$property->id])}}">
                                                            @if(!env('USER_VERIFIED'))
                                                            <img loading="lazy" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                                            @else
                                                                @if(file_exists( public_path() . '/images/thumbnail/'.$property->thumbnail))
                                                                <img loading="lazy" src="{{ URL::asset('/images/thumbnail/'.$property->thumbnail) }}" alt="">
                                                                @else
                                                                <img loading="lazy" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                                                @endif
                                                            @endif
                                                            </a>
                                                            <ul class="feature_text">
                                                                @if($property->is_featured == 1)<li class="feature_cb"><span> Featured</span></li>@endif
                                                                @if($property->type == 'sale')<li class="feature_or"><span>For Sale</span></li>@endif
                                                                @if($property->type == 'rent')<li class="feature_or"><span>For Rent</span></li>@endif
                                                            </ul>
                                                            <div class="property-author-wrap">
                                                                <a href="{{route('agents.show',$property->user_id)}}" class="property-author">
                                                            @if(!env('USER_VERIFIED'))
                                                            <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="#">
                                                            @else
                                                                    @if(file_exists( public_path() . '/images/users/'.$property->user->image))
                                                                        <img loading="lazy" src="{{ URL::asset('/images/users/'.$property->user->image) }}" alt="Image">
                                                                    @else
                                                                        <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="#">
                                                                    @endif
                                                            @endif
                                                                    <span>{{$property->user->f_name}} {{$property->user->l_name}}</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="property-title-box">
                                                            <h4><a href="{{route('front.property',['property'=>$property->id])}}">{{$property->propertyTranslation->title ?? $property->propertyTranslationEnglish->title ?? null}}</a></h4>
                                                            <div class="property-location no-pad-lr">
                                                                <i class="las la-map-marker-alt"></i>
                                                                <p>{{$property->country->countryTranslation->name ?? $property->country->countryTranslationEnglish->name ?? null}} , {{$property->state->stateTranslation->name ?? $property->state->stateTranslationEnglish->name ?? null}}, {{$property->city->cityTranslation->name ?? $property->city->cityTranslationEnglish->name ?? null}}</p>
                                                            </div>
                                                            <ul class="property-feature no-pad-lr">
                                                                <li> <i class="las la-bed"></i>
                                                                    <span>{{$property->propertyDetails->bed}} Bedrooms</span>
                                                                </li>
                                                                <li> <i class="las la-bath"></i>
                                                                    <span>{{$property->propertyDetails->bath}} Bath</span>
                                                                </li>
                                                                <li> <i class="las la-arrows-alt"></i>
                                                                    <span>{{$property->propertyDetails->room_size}} sq ft</span>
                                                                </li>
                                                                <li> <i class="las la-car"></i>
                                                                    <span>{{$property->propertyDetails->garage}} Garage</span>
                                                                </li>
                                                            </ul>
                                                            <div class="trending-bottom trend-open">
                                                                @if($property->type == 'sale') <p><span class="per_sale">starts from</span>${{$property->price}}</p> @endif
                                                                @if($property->type == 'rent') <p>${{$property->price}}<span class="per_month">month</span></p> @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="for_sale">
                                            <div class="row">
                                                @foreach($properties->where('type','sale') as $property)
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="single-property-box">
                                                        <div class="property-item">
                                                            <a class="property-img" href="{{route('front.property',['property'=>$property->id])}}">
                                                            @if(!env('USER_VERIFIED'))
                                                            <img loading="lazy" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                                            @else
                                                                @if(file_exists( public_path() . '/images/thumbnail/'.$property->thumbnail))
                                                                    <img loading="lazy" src="{{ URL::asset('/images/thumbnail/'.$property->thumbnail) }}" alt="">
                                                                @else
                                                                    <img loading="lazy" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                                                @endif
                                                            @endif
                                                            </a>
                                                            <ul class="feature_text">
                                                                @if($property->is_featured == 1)<li class="feature_cb"><span> Featured</span></li>@endif
                                                                @if($property->type == 'sale')<li class="feature_or"><span>For Sale</span></li>@endif
                                                                @if($property->type == 'rent')<li class="feature_or"><span>For Rent</span></li>@endif
                                                            </ul>
                                                            <div class="property-author-wrap">
                                                                <a href="{{route('agents.show',$property->user_id)}}" class="property-author">
                                                            @if(!env('USER_VERIFIED'))
                                                            <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="#">
                                                            @else
                                                                    @if(file_exists( public_path() . '/images/users/'.$property->user->image))
                                                                        <img loading="lazy" src="{{ URL::asset('/images/users/'.$property->user->image) }}" alt="Image">
                                                                    @else
                                                                        <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="#">
                                                                    @endif
                                                            @endif
                                                                    <span>{{$property->user->f_name}} {{$property->user->l_name}}</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="property-title-box">
                                                            <h4><a href="{{route('front.property',['property'=>$property->id])}}">{{$property->propertyTranslation->title ?? $property->propertyTranslationEnglish->title ?? null}}</a></h4>
                                                            <div class="property-location no-pad-lr">
                                                                <i class="las la-map-marker-alt"></i>
                                                                <p>{{$property->country->countryTranslation->name ?? $property->country->countryTranslationEnglish->name ?? null}} , {{$property->state->stateTranslation->name ?? $property->state->stateTranslationEnglish->name ?? null}}, {{$property->city->cityTranslation->name ?? $property->city->cityTranslationEnglish->name ?? null}}</p>
                                                            </div>
                                                            <ul class="property-feature no-pad-lr">
                                                                <li> <i class="las la-bed"></i>
                                                                    <span>{{$property->propertyDetails->bed}} Bedrooms</span>
                                                                </li>
                                                                <li> <i class="las la-bath"></i>
                                                                    <span>{{$property->propertyDetails->bath}} Bath</span>
                                                                </li>
                                                                <li> <i class="las la-arrows-alt"></i>
                                                                    <span>{{$property->propertyDetails->room_size}} sq ft</span>
                                                                </li>
                                                                <li> <i class="las la-car"></i>
                                                                    <span>{{$property->propertyDetails->garage}} Garage</span>
                                                                </li>
                                                            </ul>
                                                            <div class="trending-bottom trend-open">
                                                                <p><span class="per_sale">starts from</span>${{$property->price}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="for_rent">
                                            <div class="row">
                                                @foreach($properties->where('type','rent') as $property)
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="single-property-box">
                                                        <div class="property-item">
                                                            <a class="property-img" href="{{route('front.property',['property'=>$property->id])}}">
                                                            @if(!env('USER_VERIFIED'))
                                                            <img loading="lazy" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                                            @else
                                                                @if(file_exists( public_path() . '/images/thumbnail/'.$property->thumbnail))
                                                                    <img loading="lazy" src="{{ URL::asset('/images/thumbnail/'.$property->thumbnail) }}" alt="">
                                                                @else
                                                                    <img loading="lazy" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                                                @endif
                                                            @endif
                                                            <ul class="feature_text">
                                                                @if($property->is_featured == 1)<li class="feature_cb"><span> Featured</span></li>@endif
                                                                @if($property->type == 'sale')<li class="feature_or"><span>For Sale</span></li>@endif
                                                                @if($property->type == 'rent')<li class="feature_or"><span>For Rent</span></li>@endif
                                                            </ul>
                                                            <div class="property-author-wrap">
                                                                <a href="{{route('agents.show',$property->user_id)}}" class="property-author">
                                                            @if(!env('USER_VERIFIED'))
                                                            <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="#">
                                                            @else
                                                                    @if(file_exists( public_path() . '/images/users/'.$property->user->image))
                                                                        <img loading="lazy" src="{{ URL::asset('/images/users/'.$property->user->image) }}" alt="Image">
                                                                    @else
                                                                        <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="#">
                                                                    @endif
                                                            @endif
                                                                    <span>{{$property->user->f_name}} {{$property->user->l_name}}</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="property-title-box">
                                                            <h4><a href="{{route('front.property',['property'=>$property->id])}}">{{$property->propertyTranslation->title ?? $property->propertyTranslationEnglish->title ?? null}}</a></h4>
                                                            <div class="property-location no-pad-lr">
                                                                <i class="las la-map-marker-alt"></i>
                                                                <p>{{$property->country->countryTranslation->name ?? $property->country->countryTranslationEnglish->name ?? null}} , {{$property->state->stateTranslation->name ?? $property->state->stateTranslationEnglish->name ?? null}}, {{$property->city->cityTranslation->name ?? $property->city->cityTranslationEnglish->name ?? null}}</p>
                                                            </div>
                                                            <ul class="property-feature no-pad-lr">
                                                                <li> <i class="las la-bed"></i>
                                                                    <span>{{$property->propertyDetails->bed}} Bedrooms</span>
                                                                </li>
                                                                <li> <i class="las la-bath"></i>
                                                                    <span>{{$property->propertyDetails->bath}} Bath</span>
                                                                </li>
                                                                <li> <i class="las la-arrows-alt"></i>
                                                                    <span>{{$property->propertyDetails->room_size}} sq ft</span>
                                                                </li>
                                                                <li> <i class="las la-car"></i>
                                                                    <span>{{$property->propertyDetails->garage}} Garage</span>
                                                                </li>
                                                            </ul>
                                                            <div class="trending-bottom trend-open">
                                                                    <p>${{$property->price}}<span class="per_month">month</span> </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-4 order-xl-12 order-xl-1 order-1">
                    <div class="sidebar-right">
                        <div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
                            Thank you for getting in touch!
                        </div>
                        <div id="alert_message"></div>
                        <div class="widget">
                            <h3 class="widget-title">Contact {{$agent->f_name}} {{$agent->l_name}}</h3>
                            <form id="SubmitForm">
                                <input type="hidden" name="id" value="{{$agent->id}}" id="InputId">
                                <div class="chat-group mt-1">
                                    <input class="chat-field" type="text" name="name" id="InputName" placeholder="Your name">
                                    <span class="text-danger" id="nameErrorMsg"></span>
                                </div>
                                <div class="chat-group mt-1">
                                    <input class="chat-field" type="text" name="phone" id="InputPhone" placeholder="Phone">
                                    <span class="text-danger" id="phoneErrorMsg"></span>
                                </div>
                                <div class="chat-group mt-1">
                                    <input class="chat-field" type="text" name="email" id="InputEmail" placeholder="Email">
                                    <span class="text-danger" id="emailErrorMsg"></span>
                                </div>
                                <div class="chat-group mt-1">
                                    <textarea class="form-control chat-msg" id="message" name="message" rows="4" placeholder="Description">Hello, I am interested in [Luxury apartment bay view]</textarea>
                                </div>
                                <div class="chat-button mt-3">
                                    <button class="chat-btn" type="submit">Send Message</button>
                                </div>
                            </form>

                        </div>
                        <div class="widget recent">
                            <h3 class="widget-title">{{trans('file.recently_added')}}</h3>
                            <ul class="post-list">
                                @foreach($recentlyAdded as $item)
                                <li class="row recent-list">
                                    <div class="col-lg-5 col-4">
                                        <div class="entry-img">
                                        @if(!env('USER_VERIFIED'))
                                        <img loading="lazy" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                        @else
                                            @if(file_exists( public_path() . '/images/thumbnail/'.$item->thumbnail))
                                                <img loading="lazy" src="{{ URL::asset('/images/thumbnail/'.$item->thumbnail) }}" alt="">
                                            @else
                                                <img loading="lazy" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                            @endif
                                        @endif
                                            <span>For {{$item->type =='sale' ? 'Sale' : 'Rent'}}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-8 no-pad-left">
                                        <div class="entry-text">
                                            <h4 class="entry-title"><a href="{{route('front.property',['property'=>$item->id])}}">{{$item->propertyTranslation->title ?? $item->propertyTranslationEnglish->title ?? null}}</a></h4>
                                            <div class="property-location no-pad-lr d-flex">
                                                <i class="las la-map-marker-alt"></i>
                                                <p>{{$item->state->stateTranslation->name ?? $item->state->stateTranslationEnglish->name ?? null}}, {{$item->city->cityTranslation->name ?? $item->city->cityTranslationEnglish->name ?? null}}</p>
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
                        <div class="widget categories">
                            <h3 class="widget-title">{{trans('file.property_type')}}</h3>
                            <ul class="icon">
                                @foreach($categories as $category)
                                    <li><a href="{{route('get.category',$category->name)}}">{{$category->categoryTranslation->name ?? $category->categoryTranslationEnglish->name ?? null}}</a><span>({{$category->properties->count()}})</span></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Agent section ends -->
@endsection
@push('script')
<script type="text/javascript">

    $('#SubmitForm').on('submit',function(e){
        e.preventDefault();

        let id = $('#InputId').val();
        let name = $('#InputName').val();
        let email = $('#InputEmail').val();
        let phone = $('#InputPhone').val();
        let message = $('#message').val();

        $.ajax({
            url: "{{route('messages.store')}}",
            type:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                id:id,
                name:name,
                email:email,
                phone:phone,
                message:message,
            },
            success:function(response){
                // $('#successMsg').show();
                // alert(response.errors);
                let html = '';
                if(response.errors)
                {
                    html = '<div class="alert alert-danger">';
                        for (let count = 0; count < response.errors.length; count++) {
                            html += '<p>' + response.errors[count] + '</p>';
                        }
                        html += '</div>';
                        $('#alert_message').fadeIn("slow");
                        $('#alert_message').html(html);
                        setTimeout(function() {
                            $('#alert_message').fadeOut("slow");
                        }, 3000);
                }else if(response.success){
                    // alert('submitted');
                    $('#InputName').val("");
                    $('#InputEmail').val("");
                    $('#InputPhone').val("");
                    $('#message').val("");

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Message Sent!',
                        showConfirmButton: false,
                        timer: 1500
                    })

                console.log(response);
                }

            }
        });
    });
</script>
@endpush
