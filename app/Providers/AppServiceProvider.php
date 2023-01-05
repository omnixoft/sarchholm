<?php

namespace App\Providers;

use App\Models\Credit;
use App\Models\SiteInfo;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Schema;
use App\Repositories;
use Illuminate\Support\Facades\DB;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        //Check for Admin
        //Return true if auth user type is admin
        $gate->define('isAdmin',function($user){
            return $user->type == 'admin';
        });
        //Check for User
        //Return true if auth user type is user
        $gate->define('isUser',function($user){
            return $user->type == 'user';
        });

        $gate->define('hasCredit',function($user){
            return $user->packageUser->sum('price') > 0;
        });
        $gate->define('zeroCredit',function($user){
            return $user->packageUser->sum('price') == 0;
        });

//        $pdo = DB::connection()->getDatabaseName();
//
//        if($pdo)
//        {
        View::share('siteInfo',SiteInfo::first());
//            View::share('verifiedUser',User::where('type','admin')->where('is_approved',1)->get());
//        }

        $this->app->bind(\App\Repositories\IRepository::class,\App\Repositories\Repository::class);

        $this->app->bind(\App\Repositories\ICategoryRepository::class,\App\Repositories\CategoryRepository::class);
        $this->app->bind(\App\Repositories\ICategoryTranslationRepository::class,\App\Repositories\CategoryTranslationRepository::class);
        $this->app->bind(\App\ViewModels\ICategoryModel::class,\App\ViewModels\CategoryModel::class);
        $this->app->bind(\App\ViewModels\ICategoryTranslationModel::class,\App\ViewModels\CategoryTranslationModel::class);

        $this->app->bind(\App\Repositories\ICountryRepository::class,\App\Repositories\CountryRepository::class);
        $this->app->bind(\App\Repositories\ICountryTranslationRepository::class,\App\Repositories\CountryTranslationRepository::class);
        $this->app->bind(\App\ViewModels\ICountryModel::class,\App\ViewModels\CountryModel::class);
        $this->app->bind(\App\ViewModels\ICountryTranslationModel::class,\App\ViewModels\CountryTranslationModel::class);

        $this->app->bind(\App\Repositories\IStateRepository::class,\App\Repositories\StateRepository::class);
        $this->app->bind(\App\Repositories\IStateTranslationRepository::class,\App\Repositories\StateTranslationRepository::class);
        $this->app->bind(\App\ViewModels\IStateModel::class,\App\ViewModels\StateModel::class);
        $this->app->bind(\App\ViewModels\IStateTranslationModel::class,\App\ViewModels\StateTranslationModel::class);

        $this->app->bind(\App\Repositories\ICityRepository::class,\App\Repositories\CityRepository::class);
        $this->app->bind(\App\Repositories\ICityTranslationRepository::class,\App\Repositories\CityTranslationRepository::class);
        $this->app->bind(\App\ViewModels\ICityModel::class,\App\ViewModels\CityModel::class);
        $this->app->bind(\App\ViewModels\ICityTranslationModel::class,\App\ViewModels\CityTranslationModel::class);

        $this->app->bind(\App\Repositories\IFacilityRepository::class,\App\Repositories\FacilityRepository::class);
        $this->app->bind(\App\Repositories\IFacilityTranslationRepository::class,\App\Repositories\FacilityTranslationRepository::class);
        $this->app->bind(\App\ViewModels\IFacilityModel::class,\App\ViewModels\FacilityModel::class);
        $this->app->bind(\App\ViewModels\IFacilityTranslationModel::class,\App\ViewModels\FacilityTranslationModel::class);

        $this->app->bind(\App\Repositories\IPropertyRepository::class,\App\Repositories\PropertyRepository::class);
        $this->app->bind(\App\Repositories\IPropertyTranslationRepository::class,\App\Repositories\PropertyTranslationRepository::class);
        $this->app->bind(\App\ViewModels\IPropertyModel::class,\App\ViewModels\PropertyModel::class);
        $this->app->bind(\App\ViewModels\IPropertyTranslationModel::class,\App\ViewModels\PropertyTranslationModel::class);
        $this->app->bind(\App\Repositories\IPropertyDetailRepository::class,\App\Repositories\PropertyDetailRepository::class);
        $this->app->bind(\App\Repositories\IPropertyDetailTranslationRepository::class,\App\Repositories\PropertyDetailTranslationRepository::class);

        $this->app->bind(\App\Repositories\IPackageRepository::class,\App\Repositories\PackageRepository::class);
        $this->app->bind(\App\Repositories\IPackageTranslationRepository::class,\App\Repositories\PackageTranslationRepository::class);
        $this->app->bind(\App\ViewModels\IPackageModel::class,\App\ViewModels\PackageModel::class);
        $this->app->bind(\App\ViewModels\IPackageTranslationModel::class,\App\ViewModels\PackageTranslationModel::class);

        $this->app->bind(\App\Repositories\ITestimonialRepository::class,\App\Repositories\TestimonialRepository::class);
        $this->app->bind(\App\Repositories\ITestimonialTranslationRepository::class,\App\Repositories\TestimonialTranslationRepository::class);
        $this->app->bind(\App\ViewModels\ITestimonialModel::class,\App\ViewModels\TestimonialModel::class);
        $this->app->bind(\App\ViewModels\ITestimonialTranslationModel::class,\App\ViewModels\TestimonialTranslationModel::class);

        $this->app->bind(\App\Repositories\IPartnerRepository::class,\App\Repositories\PartnerRepository::class);
        $this->app->bind(\App\ViewModels\IPartnerModel::class,\App\ViewModels\PartnerModel::class);

        $this->app->bind(\App\Repositories\ISiteInfoRepository::class,\App\Repositories\SiteInfoRepository::class);
        $this->app->bind(\App\ViewModels\ISiteInfoModel::class,\App\ViewModels\SiteInfoModel::class);

        $this->app->bind(\App\Payment\IPayPalPayment::class,\App\Payment\PaypalPayment::class);
        $this->app->bind(\App\Payment\IStripePayment::class,\App\Payment\StripePayment::class);
        $this->app->bind(\App\Payment\IRazorpayPayment::class,\App\Payment\RazorpayPayment::class);
        $this->app->bind(\App\Payment\Paystack\IPaystackPayment::class,\App\Payment\Paystack\PaystackPayment::class);
        $this->app->bind(\App\ViewModels\IPaymentModel::class,\App\ViewModels\PaymentModel::class);

        $this->app->bind(\App\Repositories\IPackageUserRepository::class,\App\Repositories\PackageUserRepository::class);
        $this->app->bind(\App\ViewModels\IPackageUserModel::class,\App\ViewModels\PackageUserModel::class);

        $this->app->bind(\App\Repositories\IImageRepository::class,\App\Repositories\ImageRepository::class);

        $this->app->bind(\App\Repositories\IUserRepository::class,\App\Repositories\UserRepository::class);
        $this->app->bind(\App\Repositories\IUserTranslationRepository::class,\App\Repositories\UserTranslationRepository::class);
        $this->app->bind(\App\ViewModels\IUserModel::class,\App\ViewModels\UserModel::class);
        $this->app->bind(\App\ViewModels\IUserTranslationModel::class,\App\ViewModels\UserTranslationModel::class);

        $this->app->bind(\App\ViewModels\ISocialLoginModel::class,\App\ViewModels\SocialLoginModel::class);
        $this->app->bind(\App\SocialLogin\IFacebookLogin::class,\App\SocialLogin\FacebookLogin::class);
        $this->app->bind(\App\SocialLogin\IGoogleLogin::class,\App\SocialLogin\GoogleLogin::class);
        $this->app->bind(\App\SocialLogin\IGithubLogin::class,\App\SocialLogin\GithubLogin::class);

        $this->app->bind(\App\Repositories\ICurrencyRepository::class,\App\Repositories\CurrencyRepository::class);
        $this->app->bind(\App\ViewModels\ICurrencyModel::class,\App\ViewModels\CurrencyModel::class);

        $this->app->bind(\App\Repositories\IPropertySearchRepository::class,\App\Repositories\PropertySearchRepository::class);
        $this->app->bind(\App\ViewModels\IPropertySearchModel::class,\App\ViewModels\PropertySearchModel::class);

    }
}
