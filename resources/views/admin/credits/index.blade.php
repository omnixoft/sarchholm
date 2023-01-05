@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Packages</h5><br>
                        </div>
                        <div class="alert alert-primary" role="alert">
                            Your Credits: <span>{{$credits}} {{$credits > 0 ? 'Credits' : 'Credit'}}</span>
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <div class="row">

                                    @foreach($packages as $package)
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">

                                            <div class="pricing-table">
                                                @if($package->is_featured == true)
                                                    <div class="listing-badge">
                                                        <span class="featured">Featured</span>
                                                    </div>
                                                @endif
                                                <h3 class="title">{{$package->name}}</h3>
                                                <div class="price-value">
                                                    <div class="price-num">
                                                        <div class="price-num-item"><span class="mouth-cont"><span class="curen">$</span>{{$package->price}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="pricing-content">
                                                    <li><span>{{$package->listing}}</span> Property Listings</li>
                                                    <li><span>{{$package->validity}}</span> Days Availability</li>
                                                    <li><span>{{$package->featured}}</span> Featured Property</li>
                                                </ul>
                                                @php
                                                    $today = \Carbon\Carbon::now();
                                                    $expire_at = $today->add($package->validity, 'day');
                                                @endphp
                                                @if($package->is_free == 1)
                                                    <form action="{{route('admin.credits.store')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="package_id" class="user_id" value="{{$package->id}}">
                                                        <input type="hidden" name="expire_at" class="user_id" value="{{$expire_at}}">
                                                        <input type="hidden" name="price" class="user_id" value="1">
                                                        <input type="hidden" name="item" class="user_id" value="{{$package->listing}}">
                                                        <input type="hidden" name="user_id" class="user_id" value="{{$user->id}}">
                                                        <input type="hidden" name="credited_by" class="credited_by" value="{{$user->id}}">
                                                        <input type="hidden" name="amount" class="amount" value="{{$package->price}}">
                                                        <input type="hidden" name="description" class="amount" value="added by {{$user->username}}">
                                                        <input type="hidden" name="validity" class="amount" value="{{$package->validity}}">
                                                        <button class="btn btn-primary">Select plan</button>
                                                    </form>
                                                @else
                                                    <form action="{{route('admin.checkout.page')}}">
                                                        <input type="hidden" name="package_id" class="user_id" value="{{$package->id}}">
                                                        <input type="hidden" name="expire_at" class="user_id" value="{{$expire_at}}">
                                                        <input type="hidden" name="price" class="user_id" value="{{$package->price}}">
                                                        <input type="hidden" name="item" class="user_id" value="{{$package->listing}}">
                                                        <input type="hidden" name="user_id" class="user_id" value="{{$user->id}}">
                                                        <input type="hidden" name="credited_by" class="credited_by" value="{{$user->id}}">
                                                        <input type="hidden" name="amount" class="amount" value="{{$package->price}}">
                                                        <input type="hidden" name="description" class="amount" value="added by {{$user->username}}">
                                                        <input type="hidden" name="validity" class="amount" value="{{$package->validity}}">
                                                    <button class="btn btn-primary"
                                                            data-id="{{$package->id}}"
                                                            data-expire="{{$expire_at}}"
                                                            data-price="{{$package->price}}"
                                                            data-item="{{$package->listing}}"
                                                            data-user="{{$user->id}}"
                                                            data-credited="{{$user->id}}"
                                                            data-amount="{{$package->price}}"
                                                            data-description="added by {{$user->username}}"
                                                            data-validity="{{$package->validity}}">Select plan</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h3>My Packages</h3>
                <p></p>
            </div>
        </div>
    </div>

@endsection
