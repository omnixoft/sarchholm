
<div class="footer-wrapper v1">
    <div class="footer-top-area">
        <div class="container">
            <div class="row nav-folderized">
                <div class="col-lg-4 col-md-12">
                        <a href="index.html">
                            @if(isset($siteInfo->logo))
                                @if(file_exists( public_path() . '/images/images/'.$siteInfo->logo))
                                    <img loading="lazy" src="{{ URL::asset('/images/images/'.$siteInfo->logo) }}" alt="Image" width="150" height="25">
                                @else
                                    <img loading="lazy" src="{{asset('images/logo-blue.png')}}" alt="logo" width="150" height="25">
                                @endif
                            @else
                                <img loading="lazy" src="{{asset('images/logo-blue.png')}}" alt="logo" width="150" height="25">
                            @endif
                        </a>
                        <div class="company-desc mt-20">
                            <p>
                                {{isset($siteInfo->description) ? $siteInfo->description : 'description'}}
                            </p>
                            <ul class="list footer-list mt-20">
                                <li class="contact-info">
                                    <div class="icon">
                                        <i class="las la-map-marker-alt"></i>
                                    </div>
                                    <div class="text">{{isset($siteInfo->address) ? $siteInfo->address : 'address'}}
                                    </div>
                                </li>
                                <li class="contact-info">
                                    <div class="icon">
                                        <i class="las la-envelope"></i>
                                    </div>
                                    <div class="text"><a href="#">{{isset($siteInfo->email) ? $siteInfo->email : 'email'}}</a></div>
                                </li>
                                <li class="contact-info">
                                    <div class="icon">
                                        <i class="las la-phone-alt"></i>
                                    </div>
                                    <div class="text">{{isset($siteInfo->phone) ? $siteInfo->phone : 'phone'}}</div>
                                </li>
                            </ul>
                        </div>
                </div>
                <div class="col-lg-2 col-md-12 text-center sm-left">
                    <div class="footer-content nav">
                        <h2 class="title">{{trans('file.popular_searches')}}</h2>
                        <ul class="list res-list">
                            <li><a class="link-hov style2" href="{{route('property.rent')}}">{{trans('file.property_for_rent')}}</a></li>
                            <li><a class="link-hov style2" href="{{route('property.sale')}}">{{trans('file.property_for_sale')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 text-center sm-left">
                    <div class="footer-content nav">
                        <h2 class="title">{{trans('file.quick_links')}}</h2>
                        <ul class="list res-list">
                            <li><a class="link-hov style2" href="{{url('about')}}">{{trans('file.about_us')}}</a></li>
                            <li><a class="link-hov style2" href="{{url('contact')}}">{{trans('file.contact_us')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="footer-content">
                        <h4 class="title">{{trans('file.subscribe')}}</h4>
                        <div class="value-input-wrap newsletter">
                            @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    <p>{{ \Session::get('success') }}</p>
                                </div><br />
                            @endif
                            @if (\Session::has('failure'))
                                <div class="alert alert-danger">
                                    <p>{{ \Session::get('failure') }}</p>
                                </div><br />
                            @endif
                            <form action="{{route('email.subscribe')}}" method="POST">
                                @csrf
                                <input type="text" placeholder="Your mail address .." name="email">

                                <button type="submit">Subscribe</button>
                            </form>
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="footer-social-wrap">
                            <p>Follow us on </p>
                            <ul class="social-buttons style2">
                                <li><a href="{{isset($siteInfo->fb) ? $siteInfo->fb : '#'}}" target="_blank"><i class="lab la-facebook-f"></i></a></li>
                                <li><a href="{{isset($siteInfo->twitter) ? $siteInfo->twitter : '#'}}" target="_blank"><i class="lab la-twitter"></i></a></li>
                                <li><a href="{{isset($siteInfo->pinterest) ? $siteInfo->pinterest : '#'}}" target="_blank"><i class="lab la-pinterest-p"></i></a></li>
                                <li><a href="{{isset($siteInfo->yt) ? $siteInfo->yt : '#'}}" target="_blank"><i class="lab la-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 offset-md-2">
                    <p>
                        {{isset($siteInfo->copy_right) ? $siteInfo->copy_right : 'copy right'}} </p>
                </div>
            </div>
        </div>
    </div>
</div>
