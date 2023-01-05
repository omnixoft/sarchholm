<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\ProjectController;
use Illuminate\Support\Facades\File;
use Spatie\Analytics\Period;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('clear',function(){
    Artisan::call('optimize:clear');
    dd('success');
});
Route::get('get-image',function(){
    Artisan::call('storage:link');
    dd('success');
});
Route::group(['middleware'=>'XSS'],function(){


Route::get('/',[Front\HomePageController::class,'index'])->name('front.home');
// Route::get('/help',function(){
//     return File::get(public_path() . '/../help/index.html');
// });
Route::get('/properties',[Front\PropertyController::class,'index']);
Route::get('/properties/rent',[Front\PropertyController::class,'rent'])->name('property.rent');
Route::get('/properties/sale',[Front\PropertyController::class,'sale'])->name('property.sale');
Route::get('/properties/city/{city}',[Front\PropertyController::class,'city'])->name('property.city');
Route::get('/properties/getCity/{city}',[Front\PropertyController::class,'getCity'])->name('get.city');
Route::get('/properties/property/{category}',[Front\PropertyController::class,'category'])->name('get.category');
Route::get('/properties/{property}',[Front\PropertyController::class,'singleProperty'])->name('front.property');
Route::get('/about',[Front\HomePageController::class,'about']);
Route::get('/contact',[Front\ContactController::class,'index']);
Route::post('/contact/send',[Front\ContactController::class,'send'])->name('contact');
Route::get('/404',[Front\HomePageController::class,'errorPage']);
Route::get('/agents',[Front\AgentController::class,'index']);
Route::get('/agents/{agent}',[Front\AgentController::class,'show'])->name('agents.show');
Route::get('/packages',[Front\HomePageController::class,'membershipPackage']);
Route::get('/news',[Front\NewsController::class,'index'])->name('news.index');
Route::get('/news/{news}',[Front\NewsController::class,'show'])->name('news.show');
Route::get('/news/popular-topic/{category}',[Front\NewsController::class,'popularTopic'])->name('news.popular-topic');
Route::get('/add-listing',[Front\HomePageController::class,'addListing'])->middleware('auth');
Route::post('/state-city',[Front\HomePageController::class,'getCity'])->name('state.city');
Route::get('/search-property',[Front\HomePageController::class,'searchProperty'])->name('search.property');
Route::post('/autocomplete/fetch', [Front\HomePageController::class,'fetch'])->name('autocomplete.fetch');
Route::post('/search-properties',[Front\PropertyController::class,'searchProperties'])->name('search.properties');
Route::post('/search-blogs',[Front\NewsController::class,'searchBlogs'])->name('search.blogs');
Route::post('/sort-agent',[Front\AgentController::class,'sortAgent'])->name('agent.sort');
Route::post('/messages',[Front\MessagesController::class,'store'])->name('messages.store');
Route::post('/booking-request',[Front\BookingRequestController::class,'store'])->name('booking.request');
Route::get('/language-change/{id}',[Front\LanguageController::class,'defaultChange'])->name('language.defaultChange');
Route::post('/subscribe',[Admin\SubscribeController::class,'subscribe'])->name('email.subscribe');
Route::get('/all-properties',[Front\PropertyController::class,'getAllProperties'])->name('get.allproperties');
Route::get('/login/{provider}',[Admin\SocialLoginController::class,'redirectToProvider'])->name('redirect.provider');
Route::get('/login/{provider}/callback',[Admin\SocialLoginController::class,'handleProviderCallback']);

Route::get('/analytics', function () {
//    $start  = new Carbon\Carbon('2021-10-05 15:00:03');
//    $end    = new Carbon\Carbon('2050-10-05 17:00:09');
//
//    $date = Carbon\Carbon::parse('2021-11-01 14:00:00');
//    $now = Carbon\Carbon::now();
//
//    $diff = $date->diffInDays($now);
//    return $diff;

//    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2021-10-29 14:42:00');
//
//    $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2050-10-31 10:30:34');
//
//    $diff_in_hours = $to->diffInHours($from);
//    return $diff_in_hours;
//   return  $start->diff($end)->format('%H:%I:%S');

   // $result = Analytics::fetchVisitorsAndPageViews(Period::days(7));
    // $result = Analytics::fetchTopBrowsers(Period::months(6));
    $result = Analytics::fetchUserTypes(Period::days(7));
    dd($result);
    for($i=0;$i<count($result);$i++)
    {
        echo $result[$i]['pageTitle']. '='. $result[$i]['pageViews'];
        echo "<br>";
    }
//    return $result->sum('pageViews');
    $date = \Carbon\Carbon::parse($result[0]['date']);
    $date->monthName;
    return response()->json($result);
});
// Laravel 8
Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');

Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback'])->name('payment');

Route::group(['prefix' => 'admin','as' =>'admin.','middleware'=>'auth'], function () {
    Route::get('/dashboard',[Admin\DashboardController::class,'index'])->name('dashboard');
    Route::get('/dashboard/chart',[Admin\DashboardController::class,'chart'])->name('dashboard.chart');
    Route::resource('countries',Admin\CountryController::class);
    Route::resource('states',Admin\StateController::class);
    Route::resource('cities',Admin\CityController::class);
    Route::resource('categories',Admin\CategoryController::class);
    Route::resource('packages',Admin\PackageController::class);
    Route::resource('properties',Admin\PropertyController::class);
    Route::resource('facilities',Admin\FacilityController::class);
    Route::resource('bookings',Admin\BookingController::class);
    Route::resource('users',Admin\ProfileController::class);
    Route::resource('agents',Admin\AgentController::class);
    Route::resource('favourites',Admin\FavouriteController::class);
    Route::resource('invoices',Admin\InvoiceController::class);
    Route::resource('messages',Admin\MessageController::class);
    Route::resource('credits',Admin\CreditController::class);
    Route::resource('my-packages',Admin\PurchasePackageController::class);
    Route::resource('blog-categories',Admin\BlogCategoryController::class);
    Route::resource('blogs',Admin\BlogController::class);
    Route::resource('tags',Admin\TagController::class);
    Route::resource('pages',Admin\PagesController::class);
    Route::resource('currencies',Admin\CurrencyController::class);
    Route::resource('analytics',Admin\AnalyticsController::class);
    Route::resource('header-images',Admin\HeaderImageController::class);
    Route::resource('mail-settings',Admin\MailSettingsController::class);
    Route::resource('testimonials',Admin\TestimonialController::class);
    Route::resource('ourPartners',Admin\OurPartnerController::class);
    Route::resource('payment-terms', Admin\PaymentTermController::class);
    Route::get('site-informations/general',[Admin\SiteInfoController::class,'create'])->name('siteinfo.create');
    Route::post('site-informations/general',[Admin\SiteInfoController::class,'store'])->name('siteinfo.store');
    Route::get('social-login',[Admin\SocialLoginController::class,'index'])->name('social.login');
    Route::post('/facebook/store',[Admin\SocialLoginController::class,'facebookStoreOrUpdate'])->name('facebook.info.store');
    Route::get('/blogs/check_slug',[Admin\BlogController::class,'checkSlug'])->name('blogs.checkSlug');
    Route::get('edit-profile',[Admin\ProfileController::class,'editProfile']);
    Route::get('single-invoice',[Admin\InvoiceController::class,'singleInvoice']);
    Route::get('my-properties',[Admin\PropertyController::class,'myProperties'])->name('my-properties');
    Route::get('recieved-reviews',[Admin\ReviewController::class,'recievedReviews'])->name('recieved-reviews');
    Route::get('submitted-reviews',[Admin\ReviewController::class,'submittedReviews'])->name('submitted-reviews');
    Route::post('get-state',[Admin\CityController::class,'getState'])->name('get.state');
    Route::post('get-city',[Admin\CityController::class,'getCity'])->name('get.city');
    Route::get('updateFeature',[Admin\PackageController::class,'updateFeature'])->name('update.feature');
    Route::get('updateStatus',[Admin\PackageController::class,'updateStatus'])->name('update.status');
    Route::post('checkout-options',[Admin\PaymentGatewayController::class, 'checkoutOptions'])->name('checkout.options');
    Route::get('change-password',[Admin\ChangePasswordController::class, 'index'])->name('change.password.index');
    Route::post('change-password',[Admin\ChangePasswordController::class, 'store'])->name('change.password');
    Route::get('payment/methods',[Admin\PaymentGatewayController::class, 'index'])->name('payment.index');
    Route::post('/paypal/store',[Admin\PaymentGatewayController::class,'paypalStoreOrUpdate'])->name('paypal.info.store');
    Route::post('/stripe/store',[Admin\PaymentGatewayController::class,'stripeStoreOrUpdate'])->name('stripe.info.store');
    Route::post('/paystack/store',[Admin\PaymentGatewayController::class,'paystackStoreOrUpdate'])->name('paystack.info.store');
    Route::post('/razorpay/store',[Admin\PaymentGatewayController::class,'razorpayStoreOrUpdate'])->name('razorpay.info.store');
    Route::post('pay', [Admin\PaymentGatewayController::class, 'payment'])->name('payment');
    // Route::post('checkout',[Admin\PaymentGatewayController::class, 'checkout'])->name('checkout');
    Route::post('paypal-checkout',[Admin\PaymentGatewayController::class,'paypalCheckout'])->name('checkout.paypal');
    Route::post('/payment/add-funds/paypal',[Admin\PaymentGatewayController::class,'paymentPaypal']);

    // Route::post('/pays', [Admin\PaymentGatewayController::class, 'redirectToGateway'])->name('pay');
    // Route::get('/payment/callback', [Admin\PaymentGatewayController::class, 'PaystackHandleGatewayCallback']);
    Route::get('checkout',[Admin\PaymentGatewayController::class, 'checkoutPage'])->name('checkout.page');
    Route::get('/delete/language',[Admin\LanguageController::class,'deleteLanguage'])->name('delete.language');
    Route::get('/delete/galleryImage',[Admin\PropertyController::class,'destroyGalleryImage'])->name('destroy.galleryImage');
    Route::get('languages/update',[Admin\LanguageController::class,'update'])->name('update.language');

    Route::resource('projects',Admin\ProjectController::class);

    // Route::get('/projects',[Admin\ProjectController::class,'index'])->name('projects');
    // Route::get('/projects/create',[Admin\ProjectController::class,'create']);
    Route::get('/projects/get-cover-media-view',[Admin\ProjectController::class,'getMediaView']);
    // Route::post('/projects/save',[Admin\ProjectController::class,'store']);
    // Route::post('/projects/update',[Admin\ProjectController::class,'update']);
    // Route::get('/projects/edit/{id}',[Admin\ProjectController::class,'edit']);
    // Route::get('/projects/delete/{id}',[Admin\ProjectController::class,'delete']);

   Route::resource('projects.buildings', Admin\ProjectBuildingController::class);
    Route::resource('inventory', Admin\InventoryController::class);
        Route::get('/units/get-buildings',[Admin\InventoryController::class,'getBuildings']);

     Route::resource('client-units', Admin\ClientUnitController::class);
        Route::resource('clients-unit-detail', Admin\ClientDetailController::class);

    
    Route::get('/projects/landmarks/{id}',[Admin\ProjectController::class,'landmarks']);
    Route::get('/projects/landmarks/add/{id}',[Admin\ProjectController::class,'addLandmark']);
    Route::post('/projects/landmark/save/{id}',[Admin\ProjectController::class,'saveLandmark']);
    Route::post('/projects/landmark/update',[Admin\ProjectController::class,'updateLandmark']);
    Route::get('/projects/landmarks/edit/{id}',[Admin\ProjectController::class,'editLandmark']);
    Route::get('/projects/landmarks/delete/{id}',[Admin\ProjectController::class,'deleteLandmark']);

    Route::get('/projects/amenities/{id}',[Admin\ProjectController::class,'amenities']);
    Route::get('/projects/amenities/add/{id}',[Admin\ProjectController::class,'addAmenities']);
    Route::post('/projects/amenities/save/{id}',[Admin\ProjectController::class,'saveAmenities']);
    Route::get('/projects/amenities/edit/{id}',[Admin\ProjectController::class,'editAmenities']);
    Route::get('/projects/amenities/delete/{id}',[Admin\ProjectController::class,'deleteAmenities']);
    Route::post('/projects/amenities/update',[Admin\ProjectController::class,'updateAmenities']);


    Route::get('migrate', function () {
        define('_PATH', dirname(__FILE__));

        // Zip file name
        $filename = 'C:/xampp/app.zip';
        $zip = new ZipArchive;
        $res = $zip->open($filename);
        if ($res === TRUE) {
            // Unzip path
            $path = "C:/xampp/htdocs/SarchHolm/";
            // Extract file
            $zip->extractTo($path);
            $zip->close();
            return back()->with('migration', 'Successfull!!');
        } else {
            echo 'failed!';
        }
    })->name('migrate');
    Route::get('/test-chart',function(){
        return view('admin.test');
    });
    Route::group(config('translation.route_group_config') + ['namespace' => 'JoeDixon\\Translation\\Http\\Controllers'], function ($router) {
        $router->get(config('translation.ui_url'), 'LanguageController@index')
            ->name('languages.index');

        $router->get(config('translation.ui_url').'/create', 'LanguageController@create')
            ->name('languages.create');

        $router->post(config('translation.ui_url'), 'LanguageController@store')
            ->name('languages.store');

        $router->get(config('translation.ui_url').'/{language}/translations', 'LanguageTranslationController@index')
            ->name('languages.translations.index');

        $router->post(config('translation.ui_url').'/{language}', 'LanguageTranslationController@update')
            ->name('languages.translations.update');

        $router->get(config('translation.ui_url').'/{language}/translations/create', 'LanguageTranslationController@create')
            ->name('languages.translations.create');

        $router->post(config('translation.ui_url').'/{language}/translations', 'LanguageTranslationController@store')
            ->name('languages.translations.store');
    });
});
Auth::routes();

// Route::get('/forgot-password', function () {
//     return view('auth.passwords.email');
// })->middleware('guest')->name('password.request');


Route::get('forget-password', [Admin\ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [Admin\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [Admin\ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [Admin\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();
Route::get('welcome',[Admin\PaymentGatewayController::class,'index']);

});
