<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\HeaderImage;
use App\Models\Property;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class AgentController extends Controller
{
    public function __construct()
    {
        Session::put('currentLocal', 'en');
        App::setLocale('en');
    }

    public function index()
    {
        App::setLocale(Session::get('currentLocal'));

        $agents = User::where('type','user')->paginate(2);
        $categories = Category::with('categoryTranslation','properties')->where('status',1)->get();

        $recentlyAdded = Property::with('state.stateTranslation','city.cityTranslation','propertyTranslation')->where('moderation_status',1)->where('status',1)->latest()->take(5)->get();
        $headerImage = HeaderImage::where('page', 'agents')->first();
        return view('frontend.agent-list',compact('agents','categories','recentlyAdded','headerImage'));
    }

    public function show(User $agent)
    {
        App::setLocale(Session::get('currentLocal'));

        $recentlyAdded = Property::with(['state.stateTranslation','city.cityTranslation','propertyTranslation'])->where('moderation_status',1)->where('status',1)->latest()->take(5)->get();
        $categories = Category::with('categoryTranslation','properties')->where('status',1)->get();
        $properties = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','propertyTranslationEnglish','image'])
                                ->where('moderation_status',1)
                                ->where('status',1)
                                ->where('user_id',$agent->id)
                                ->get();
        $headerImage = HeaderImage::where('page','single-agent')->first();

        return view('frontend.agent',compact('agent','recentlyAdded','categories','properties','headerImage'));
    }

    public function getState(Request $request)
    {
        $states = State::where('country_id',$request->country)->get();
        echo '<option value="0">Select State</option>';
        foreach ($states as $state){
            echo '<option value="'.$state->id.'">'.$state->name.'</option>';
        }
    }

    public function getCity(Request $request)
    {
        $cities = City::where('state_id',$request->state)->get();
        echo '<option value="0">Select City</option>';
        foreach ($cities as $city){
            echo '<option value="'.$city->id.'">'.$city->name.'</option>';
        }
    }

    public function sortAgent(Request $request)
    {

        if($request->agent == 2) {
            $agents = User::where('type', 'user')->orderBy('created_at', 'desc')->paginate(2);
        }
        if($request->agent == 1) {
            $agents = User::where('type', 'user')->orderBy('created_at', 'asc')->paginate(2);
        }
            foreach($agents as $agent)
            {
              $html =   '<div class="single-agent-box mb-30">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-12">
                                                <div class="single-team-member agent-item">
                                                    <img src="images/users/'.$agent->image.'" alt="Image">
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-sm-12">
                                                <div class="single-team-info">
                                                    <div class="agent-content">
                                                        <h4><a href="agents/'.$agent->id.'">'.$agent->f_name.$agent->l_name.'</a></h4>
                                                        <span>'.$agent->title.'</span>
                                                        <ul class="list">
                                                            <li>
                                                                <div class="contact-info">
                                                                    <div class="icon">
                                                                        <i class="fas fa-phone-alt"></i>
                                                                    </div>
                                                                    <div class="text"><a href="tel:44078767595">'.$agent->mobile.'</a></div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="contact-info">
                                                                    <div class="icon">
                                                                        <i class="fas fa-envelope"></i>
                                                                    </div>
                                                                    <div class="text"><a href="#">'.$agent->email.'</a></div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <ul class="social-buttons style2">
                                                            <li><a href="'.$agent->fb.'"><i class="fab fa-facebook-f"></i></a></li>
                                                            <li><a href="'.$agent->twitter.'"><i class="fab fa-twitter"></i></a></li>
                                                            <li><a href="'.$agent->fb.'"><i class="fab fa-pinterest-p"></i></a></li>
                                                            <li><a href="'.$agent->fb.'"><i class="fab fa-youtube"></i></a></li>
                                                        </ul>
                                                        <a href="agents/'.$agent->id.'" class="agent-link">View Profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
              echo $html;
            }

    }

    public function agentOldest()
    {

    }
    public function photo()
    {
        if (file_exists( public_path().'/storage/thumbnail/'.$this->thumbnail)) {
            return 'images/property/property_1.jpg';
        } else {
            return 'images/property/property_1.jpg';
        }
    }
}
