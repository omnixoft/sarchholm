<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Property;
use Illuminate\Support\Facades\Session;
use Spatie\Analytics\Period;
use Analytics;
use App\Models\Project;
use App\Models\Inventory;
use App\Models\Client;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        if($user->type == 'admin')
        {
            $allProperties = Property::where('moderation_status',1)->get();
            $properties = Property::with(['facilities.facilityTranslation','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','propertyTranslationEnglish','image','propertyDetails'])->where('moderation_status',1)->get();
            $newsCount = Blog::where('status','approved')->count();
        }
        if($user->type == 'user')
        {
            $allProperties = Property::where('moderation_status',1)->where('user_id',$user->id)->get();
            $properties = Property::with(['facilities.facilityTranslation','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','propertyTranslationEnglish','image','propertyDetails'])->where('moderation_status',1)->where('user_id',$user->id)->get();
            $newsCount = Blog::where('status','approved')->where('user_id',$user->id)->count();
        }
        
         $projects = Project::latest()->get();
            $units = Inventory::latest()->get();
            $clients = Client::latest()->get();

        $propertyCount  = $allProperties->count();
        $result = Analytics::fetchVisitorsAndPageViews(Period::days(7));
        $browsers = Analytics::fetchTopBrowsers(Period::days(7));
        $topVisitedPages = Analytics::fetchMostVisitedPages(Period::days(7))->take(10);
        $topReferrers = Analytics::fetchTopReferrers(Period::days(7))->take(10);
        $newUsers = Analytics::fetchUserTypes(Period::days(7));
        // dd($topVisitedPages);
        $locale   = Session::get('currentLocal');
        return view('admin.dashboard',compact('user','propertyCount','result','properties','locale','newsCount','browsers','topVisitedPages','topReferrers','newUsers','projects','units','clients'));
    }

    public function chart()
    {
        $result = Analytics::fetchTotalVisitorsAndPageViews(Period::days(10));

        return response()->json($result);

    }
}
