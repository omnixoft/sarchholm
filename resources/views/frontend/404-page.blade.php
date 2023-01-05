@extends('frontend.main')
@section('content')
    <!--error  start-->
    <div class="error-section mt-150 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3  error-text text-center">
                    <div class="error-content">
                        <img loading="lazy" src="images/others/404.png" alt="404 not found"/>
                        <h4>Ohh! Page Not Found</h4>
                        <p>Perhaps searching can help or go back to <a href="home-v1.html">Homepage</a> </p>
                    </div>
                    <div class="error-search-container">
                        <form>
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="lnr lnr-magnifier"></i></button>
                        </form>
                    </div>
                    <br>
                    <small><a class="text-grey" href="https://www.freepik.com/free-photos-vectors/business">* Business vector created by pikisuperstar - www.freepik.com</a></small>
                </div>
            </div>
        </div>
    </div>
    <!--error ends-->
@endsection