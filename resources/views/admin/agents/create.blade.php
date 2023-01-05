@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Create Agent:</h5>
                        </div>
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        {{--@if(count($errors) > 0)--}}
                            {{--@foreach( $errors->all() as $message )--}}
                                {{--<div class="alert alert-danger display-hide">--}}
                                    {{--<button class="close" data-close="alert"></button>--}}
                                    {{--<span>{{ $message }}</span>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}
                        {{--@endif--}}
                        <div class="db-add-listing">
                            <form action="{{route('admin.agents.store')}}" method="POST">
                                @csrf
                                <input type="hidden" value="user" name="type">
                                <input type="hidden" value="0" name="is_approved">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name::</label>
                                            <input type="text" name="f_name" class="form-control filter-input" placeholder="First Name">
                                            @error('f_name')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name::</label>
                                            <input type="text" name="l_name" class="form-control filter-input" placeholder="Last Name">
                                            @error('l_name')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>User Name:</label>
                                            <input type="text" name="username" class="form-control filter-input" placeholder="User Name">
                                            @error('username')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" name="email" class="form-control filter-input" placeholder="Email">
                                            @error('email')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password:</label>
                                            <input type="password" name="password" class="form-control filter-input" placeholder="Password">
                                            @error('password')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Confirm Password:</label>
                                            <input type="password" name="confirm_password" class="form-control filter-input" placeholder="Confirm Password">
                                            @error('confirm_password')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-5">
                                        <div class="add-btn">
                                            <button class="btn v3">SAVE</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection