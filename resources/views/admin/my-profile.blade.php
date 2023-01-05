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
                                    <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="..." class="img-responsive">
                                </div>
                                <div class="col-lg-7 col-md-6 col-sm-7">
                                    <div class="agent-details">
                                        <h3>{{auth()->user()->f_name}} {{auth()->user()->l_name}}</h3>
                                        <ul class="address-list">
                                            <li>
                                                        <span>
                                                            Company:
                                                        </span>
                                                Zillion Properties.
                                            </li>
                                            <li>
                                                        <span>
                                                            Title:
                                                        </span>
                                                Real estate Agent
                                            </li>
                                            <li>
                                                        <span>
                                                            Office:
                                                        </span>
                                                +55 425-634-7071
                                            </li>
                                            <li>
                                                        <span>
                                                            Mobile:
                                                        </span>
                                                +55 255-634-7071
                                            </li>
                                            <li>
                                                        <span>
                                                            Email:
                                                        </span>
                                                {{auth()->user()->email}}
                                            </li>
                                            <li>
                                                        <span>
                                                            Skype:
                                                        </span>
                                                tony_stark
                                            </li>
                                        </ul>
                                        <ul class="social-buttons style1">
                                            <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="lab la-twitter"></i></a></li>
                                            <li><a href="#"><i class="lab la-pinterest-p"></i></a></li>
                                            <li><a href="#"><i class="lab la-youtube"></i></a></li>
                                            <li><a href="#"><i class="lab la-dribbble"></i></a></li>
                                        </ul>
                                        <a href="{{url('admin/profiles/'.auth()->user()->id.'/edit')}}" class="btn v3 mt-50">Edit profile</a>
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