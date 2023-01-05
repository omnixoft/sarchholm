@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="recent-activity">
                        <div class="act-title">
                            <h5>Profile Details</h5>
                        </div>
                        <div class="profile-wrap">
                            <div class="row mb-50">
                                <div class="col-lg-5 col-md-6 col-sm-5">
                                    @if(file_exists( public_path() . '/images/users/'.$user->image))
                                    <img loading="lazy" src="{{URL::asset('/images/users/'.$user->image)}}" alt="user image" id="preview-image-before-upload">
                                    @else
                                        <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="..." class="img-responsive" style="width:380px;height: 400px">
                                    @endif
                                </div>
                                <div class="col-lg-7 col-md-6 col-sm-7">
                                    <div class="agent-details">
                                        <h3>@if(isset($user->userTranslation->f_name) ) {{isset($user->userTranslation->f_name) ? $user->userTranslation->f_name : $user->userTranslationEnglish->f_name}}@endif @if(isset($user->userTranslation->l_name) ) {{isset($user->userTranslation->f_name) ? $user->userTranslation->l_name : $user->userTranslationEnglish->l_name}} @endif</h3>
                                        <ul class="address-list">
                                         @if(isset($user->userTranslation->company_name)) <li><span>Company:</span>{{isset($user->userTranslation->company_name) ? $user->userTranslation->company_name : $user->userTranslationEnglish->company_name}}</li>@endif
                                         @if($user->title)<li><span>Title:</span>{{$user->title}}</li>@endif
                                         @if($user->mobile_office)<li><span>Office:</span>{{$user->mobile_office}}</li>@endif
                                         @if($user->mobile)<li><span>Mobile:</span>{{$user->mobile}}</li>@endif
                                         @if($user->email)<li><span>Email:</span>{{$user->email}}</li>@endif
                                         @if($user->mobile_office)<li><span>Office:</span>{{$user->mobile_office}}</li>@endif
                                         @if($user->skype)<li><span>Skype:</span>{{$user->skype}}</li>@endif
                                        </ul>
                                        <ul class="social-buttons style1">
                                            @if($user->fb) <li><a href="{{$user->fb}}"><i class="lab la-facebook-f"></i></a></li>@endif
                                            @if($user->twitter) <li><a href="{{$user->twitter}}"><i class="lab la-twitter"></i></a></li>@endif
                                            @if($user->instagram) <li><a href="{{$user->instagram}}"><i class="lab la-instagram"></i></a></li>@endif
                                        </ul>
                                        <div class="mt-30">
                                            <a href="{{url('admin/users/'.$user->id.'/edit')}}" class="btn v3">Edit profile</a>
                                            <a href="{{route('admin.change.password.index')}}" class="btn v3">Change Password</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection