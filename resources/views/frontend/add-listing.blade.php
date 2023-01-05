@extends('frontend.main')
@section('content')
    <!--Breadcrumb section starts-->
    <div class="breadcrumb-section bg-h" style="background-image: url(images/breadcrumb/breadcrumb_1.jpg)">
        <div class="overlay op-5"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="breadcrumb-menu">
                        <h2>Add Property</h2>
                        <span><a href="home-v1.html">Home</a></span>
                        <span>Add Property</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb section ends-->
    <!--Add Listing starts-->
    <div class="list-details-section section-padding add_list pt-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs list-details-tab">
                        <li class="nav-item active">
                            <a data-toggle="tab" href="#general_info">General Information</a>
                        </li>
                        <li class="nav-item ">
                            <a data-toggle="tab" href="#gallery">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" href="#pp_details">Property Details</a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" href="#f_plan">Floor Plans</a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" href="#social_network">Social Networks <span class="text-grey"></span></a>
                        </li>
                    </ul>
                    <div class="tab-content my-30 add_list_content">
                        <div class="tab-pane fade show active" id="general_info">
                            <h4> <i class="lnr lnr-question-circle"></i> General Information :</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Property Title</label>
                                        <input type="text" class="form-control filter-input" placeholder="Sea View Apartment">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control filter-input" placeholder="Address of your property">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Neighborhood </label>
                                        <input type="text" class="form-control filter-input" placeholder="Andersonville">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Select Country</label>
                                    <select class="listing-input hero__form-input  form-control custom-select">
                                        <option>USA</option>
                                        <option>UK</option>
                                        <option>Australia</option>
                                        <option>Sweden</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Select State/County</label>
                                    <select class="listing-input hero__form-input  form-control custom-select">
                                        <option>New York</option>
                                        <option>Florida</option>
                                        <option>Las Vegas</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Select City</label>
                                    <select class="listing-input hero__form-input  form-control custom-select">
                                        <option>New York</option>
                                        <option>Florida</option>
                                        <option>Las Vegas</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Zip/Postal Code</label>
                                        <input type="text" class="form-control filter-input" placeholder="4000">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Select Property Type</label>
                                    <select class="listing-input hero__form-input  form-control custom-select">
                                        <option>Commercial</option>
                                        <option>Residential</option>
                                        <option>Condominium</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Select Property Status</label>
                                    <select class="listing-input hero__form-input  form-control custom-select">
                                        <option>For Sale</option>
                                        <option>For Rent</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Property Price</label>
                                        <input type="text" class="form-control filter-input" placeholder="$1500">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <form>
                                        <div class="form-group">
                                            <label for="list_info">Description</label>
                                            <textarea class="form-control" id="list_info" rows="4" placeholder="Enter your text here"></textarea>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="gallery">
                            <h4><i class="lnr lnr-picture"></i> Gallery :</h4>
                            <div class="row">
                                <div class="col-md-12 mb-5">
                                    <div class="form-group">
                                        <form class="photo-upload">
                                            <div class="form-group">
                                                <div class="add-listing__input-file-box">
                                                    <input class="add-listing__input-file" type="file" name="file">
                                                    <div class="add-listing__input-file-wrap">
                                                        <i class="lnr lnr-cloud-upload"></i>
                                                        <p>Click here to upload your images</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="add-btn">
                                        <a href="#" class="btn v3">Add Images</a>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-30">
                                    <label>Property Video Link</label>
                                    <input type="text" class="form-control filter-input" placeholder="https://www.youtube.com/watch?v=dqD0SqMNtks">
                                    <div class="add-btn">
                                        <a href="#" class="btn v3 mt-30">Add Video</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="f_plan">
                            <h4><i class="lnr lnr-map"></i>Floor Plans :</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Select Floor</label>
                                    <select class="listing-input hero__form-input  form-control custom-select">
                                        <option>First Floor</option>
                                        <option>Second Floor</option>
                                        <option>Third Floor</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total Size in Sq Ft</label>
                                        <input type="text" class="form-control filter-input" placeholder="1240">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Size of Rooms in Sq Ft</label>
                                        <input type="text" class="form-control filter-input" placeholder="144">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Size of Bath in Sq Ft</label>
                                        <input type="text" class="form-control filter-input" placeholder="48">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" class="form-control filter-input" placeholder="$1240">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <form class="photo-upload">
                                            <div class="form-group">
                                                <div class="add-listing__input-file-box">
                                                    <input class="add-listing__input-file" type="file" name="file" id="img_file">
                                                    <div class="add-listing__input-file-wrap">
                                                        <i class="lnr lnr-cloud-upload"></i>
                                                        <p>Click here to upload your images</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pp_details">
                            <h4><i class="las la-home"></i>Property Details :</h4>
                            <div class="row mb-30">
                                <div class="col-md-4">
                                    <label>Property ID</label>
                                    <input type="text" class="form-control filter-input" placeholder="ZOAC25">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Number of Bedrooms</label>
                                        <select class="listing-input hero__form-input  form-control custom-select">
                                            <option>7</option>
                                            <option>7</option>
                                            <option>6</option>
                                            <option>5</option>
                                            <option>4</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Number of Rooms</label>
                                        <select class="listing-input hero__form-input  form-control custom-select">
                                            <option>7</option>
                                            <option>7</option>
                                            <option>6</option>
                                            <option>5</option>
                                            <option>4</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Number of Bath</label>
                                        <select class="listing-input hero__form-input  form-control custom-select">
                                            <option>7</option>
                                            <option>7</option>
                                            <option>6</option>
                                            <option>5</option>
                                            <option>4</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Number of Garages</label>
                                        <select class="listing-input hero__form-input  form-control custom-select">
                                            <option>7</option>
                                            <option>7</option>
                                            <option>6</option>
                                            <option>5</option>
                                            <option>4</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Check In</label>
                                    <div id="datepicker-from" class="input-group date" data-date-format="dd-mm-yyyy">
                                        <input class="form-control" type="text" placeholder="Check In">
                                        <span class="input-group-addon"><i class="lnr lnr-calendar-full"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Amenities</label>
                                        <div class="filter-checkbox">
                                            <input id="check-a" type="checkbox" name="check">
                                            <label for="check-a">Basketball court</label>
                                            <input id="check-b" type="checkbox" name="check">
                                            <label for="check-b">Gym</label>
                                            <input id="check-c" type="checkbox" name="check">
                                            <label for="check-c">washer and dryer </label>
                                            <input id="check-d" type="checkbox" name="check">
                                            <label for="check-d">Wheelchair Friendly</label>
                                            <input id="check-f" type="checkbox" name="check">
                                            <label for="check-f">Laundry</label>
                                            <input id="check-e" type="checkbox" name="check">
                                            <label for="check-e">Air Conditioned</label>
                                            <input id="check-z" type="checkbox" name="check">
                                            <label for="check-z">Swimming Pool</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <form class="photo-upload">
                                            <div class="form-group">
                                                <label>Property Documents</label>
                                                <div class="add-listing__input-file-box">
                                                    <input class="add-listing__input-file" type="file" name="file" id="file">
                                                    <div class="add-listing__input-file-wrap">
                                                        <i class="lnr lnr-cloud-upload"></i>
                                                        <p>Click here to upload Property Documents</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="add-btn">
                                        <a href="#" class="btn v3">Upload Document</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="social_network">
                            <h4><i class="las la-share-alt-square"></i>Social Networks:</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Facebook link (Optional)</label>
                                        <input type="text" class="form-control filter-input" placeholder="Facebook url">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Pinterest (Optional)</label>
                                        <input type="text" class="form-control filter-input" placeholder="Pinterest url">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Twitter link (Optional)</label>
                                        <input type="text" class="form-control filter-input" placeholder="Twitter url">
                                    </div>
                                </div>
                                <div class="col-md-6 text-left">
                                    <div class="res-box mt-10">
                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember">I've read and accept <a href="terms.html">terms &amp; conditions</a></label>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right sm-left">
                                    <button class="btn v3" type="submit">Preview</button>
                                    <button class="btn v3" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Add Listing ends-->
@endsection