<form class="hero__form v1 filter listing-filter pt-30" action="{{route('search.property')}}" method="GET">
    @csrf
    <input type="hidden" id="min" name="minPrice">
    <input type="hidden" id="max" name="maxPrice">
    <input type="hidden" id="maxPropPrice" value="{{$maxPrice}}">
    <input type="hidden" id="minPropPrice" value="{{$minPrice}}">

    <input type="hidden" id="minArea" name="minArea">
    <input type="hidden" id="maxArea" name="maxArea">
    <input type="hidden" id="minAreaSize" value="{{$minArea}}">
    <input type="hidden" id="maxAreaSize" value="{{$maxArea}}">
    <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 py-3 pr-0">

            <select name="category_id" class="hero__form-input  form-control custom-select  mb-20" id="propType">
                    <option value="">{{trans('file.property_type')}}</option>
                @foreach($categories as $category)

                    <option value="{{$category->id}}">{{$category->categoryTranslation->name ?? $category->categoryTranslationEnglish->name ?? null}}</option>

                @endforeach

            </select>

        </div>

        <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-12 py-3 pr-0">

            <div class="input-search autocomplete">

                <input type="text" name="title" id="city_name" placeholder="{{trans('file.search')}}">
                <div id="cityList">
                </div>
            </div>

        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 py-3">

            <div class="submit_btn">

                <button class="btn v3 mr-3" type="submit"><i class="las la-search"></i></button>

            </div>

            <div class="dropdown-filter"><i class="las la-sliders-h"></i></div>

        </div>
        <div class="explore__form-checkbox-list full-filter">
            <div class="row">
                <div class="col-md-4 col-sm-12 mb-15 pr-0">
                    <select name="city_id" class="hero__form-input  form-control custom-select" id="state">
                        <option value="">{{ trans('file.select_city') }}</option>
                        @foreach($city as $city)
                            <option value="{{$city->id}}">{{$city->cityTranslation->name ?? $city->cityTranslationEnglish->name ?? null}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-6 mb-15 pr-0" id="bed">
                    <select class="hero__form-input  form-control custom-select  mb-20" name="bed">

                        <option value="">Bed</option>

                        <option value="1">1</option>

                        <option value="2">2</option>

                        <option value="3">3</option>

                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>

                    </select>
                </div>
                <div class="col-md-4 col-sm-6 mb-15" id="bath">
                    <select class="hero__form-input  form-control custom-select  mb-20" name="bath">

                        <option value="">Bath</option>

                        <option value="1">1</option>

                        <option value="2">2</option>

                        <option value="3">3</option>

                        <option value="4">4</option>

                    </select>
                </div>
                <div class="col-md-6">
                    <div class="filter-sub-area style1">
                        <div class="filter-title mb-10">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Price: </span>
                                </div>
                                <input type="text" id="amount" class="form-control">

                            </div>
                        </div>
                        <div id="slider-range" class="price-range mb-30">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="filter-sub-area style1">
                        <div class="filter-title  mb-10">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Area : </span>
                                </div>
                                <input type="text" id="area" class="form-control">

                            </div>
                        </div>
                        <div id="slider-range_area" class="price-range mb-30">
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</form>
