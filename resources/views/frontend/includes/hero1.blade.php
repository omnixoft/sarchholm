<div class="hero v1 section-padding" style="background-image: url(images/header/hero_5.jpg)">
    <div class="overlay op-3"></div>
    <!--Listing filter starts-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="hero__form v1 filter listing-filter" action="{{route('search.property')}}" method="GET">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-12 py-3 pl-30 pr-0">
                            <div class="input-search">
                                <input type="text" name="title" id="place-event" placeholder="Enter Property, Location, Landmark ...">
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 col-12 py-3 pl-30 pr-0">
                            <select name="state_id" class="hero__form-input  form-control custom-select" id="state">
                                <option>Select Area</option>
                                @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 col-12 py-3 pl-30 pr-0">
                            <select name="city_id" class="hero__form-input  form-control custom-select" id="city">
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 py-3 pl-30 pr-0">
                            <div class="submit_btn">
                                <button class="btn v3" type="submit">Search</button>
                            </div>
                            <div class="dropdown-filter"><span>More Filters</span></div>
                        </div>
                        <div class="explore__form-checkbox-list full-filter">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 py-1 pr-30">
                                    <select class="hero__form-input  form-control custom-select mb-20" name="type">
                                        <option value="">Property Status</option>
                                        <option value="rent">For Rent</option>
                                        <option value="sale">For Sale</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0 ">
                                    <select name="category_id" class="hero__form-input  form-control custom-select  mb-20">
                                        <option value="">Property Type</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 py-1 pl-0">
                                    <select class="hero__form-input  form-control custom-select  mb-20">
                                        <option>Max rooms</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 py-1 pr-30 ">
                                    <select class="hero__form-input  form-control custom-select  mb-20" name="bed">
                                        <option value="">Bed</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0">
                                    <select class="hero__form-input  form-control custom-select  mb-20">
                                        <option>Bath</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 py-1 pl-0">
                                    <select class="hero__form-input  form-control custom-select  mb-20">
                                        <option>Agents</option>
                                        @foreach($agents as $agent)
                                            <option value="{{$agent->id}}">{{$agent->f_name}} {{$agent->l_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- <div class="col-lg-4 col-md-6 py-1 pr-30">
                                    <select class="hero__form-input  form-control custom-select  mb-20">
                                        <option>Agencies</option>
                                        <option>Onyx Equities</option>
                                        <option>OVG Real Estate</option>
                                        <option>Oxford Properties*</option>
                                        <option>Cortland</option>
                                    </select>
                                </div> -->
                                <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0">
                                    <div class="filter-sub-area style1">
                                        <div class="filter-title mb-10">
                                            <p>Price : <span><input type="text" id="amount_two"></span></p>
                                        </div>
                                        <div id="slider-range_two" class="price-range mb-30">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 py-1  pl-0">
                                    <div class="filter-sub-area style1">
                                        <div class="filter-title  mb-10">
                                            <p>Area : <span><input type="text" id="amount_one"></span></p>
                                        </div>
                                        <div id="slider-range_one" class="price-range mb-30">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Listing filter ends-->
</div>