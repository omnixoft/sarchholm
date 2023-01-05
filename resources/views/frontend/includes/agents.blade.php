<div class="team-section">
    <div class="container">
        <div class="row mt-30">
            <div class="col-md-8 offset-md-2 text-center">
                <div class="section-title v1">
                    <p>{{trans('file.ready_to_serve')}}</p>
                    <h2>{{trans('file.meet_our_agents')}}</h2>
                </div>
            </div>
            <div class="col-md-12">
                <div class="team-wrapper swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($users as $agent)
                        <div class="swiper-slide">
                            <div class="single-team-member v2">
                                <a href="{{url('/agents/'.$agent->id)}}">
                                    @if(!env('USER_VERIFIED'))
                                    <img loading="lazy" src="{{'images/users/agent_1.jpg'}}" alt="" width="380" height="400">
                                    @else
                                    <img loading="lazy" src="{!! $agent->photo() !!}" alt="" width="380" height="400">
                                    @endif
                                </a>
                                <div class="single-team-info">
                                    <h4><a href="{{url('/agents/'.$agent->id)}}">{{$agent->f_name}} {{$agent->l_name}}</a></h4>
                                    <span><i class="las la-phone-alt"></i>{{$agent->mobile}}</span>
                                    <div class="contact-info">
                                        <div class="icon">
                                            <i class="las la-envelope"></i>
                                        </div>
                                        <div class="text"><a href="tel:44078767595">{{$agent->email}}</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="slider-btn v2 team_next"><i class="lnr lnr-arrow-right"></i></div>
                    <div class="slider-btn v2 team_prev"><i class="lnr lnr-arrow-left"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
