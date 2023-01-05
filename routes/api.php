<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('properties',function(){
    $properties = \App\Models\Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
        ->where('moderation_status',1)
        ->where('status',1)
        ->orderBy('id','desc')
        ->get();
    return $properties;
});

Route::get('properties/search-properties/{categoryId}',[Front\HomePageController::class,'getByCategory']);
Route::get('properties/search-properties/cities/{cityId}',[Front\HomePageController::class,'getByCity']);
Route::get('properties/search-properties/prices/{minPrice}/{maxPrice}',[Front\HomePageController::class,'getByPrice']);
Route::get('properties/search-properties/areas/{minArea}/{maxArea}',[Front\HomePageController::class,'getByArea']);
Route::get('properties/search-properties/category-city/{categoryId}/{cityId}',[Front\HomePageController::class,'getByCategoryCity']);

Route::get('properties/search-properties/category-price/{categoryId}/{minPrice}/{maxPrice}',[Front\HomePageController::class,'getByCategoryPrice']);
Route::get('properties/search-properties/category-area/{categoryId}/{minArea}/{maxArea}',[Front\HomePageController::class,'getByCategoryArea']);
Route::get('properties/search-properties/city-price/{cityId}/{minPrice}/{maxPrice}',[Front\HomePageController::class,'getByCityPrice']);
Route::get('properties/search-properties/city-area/{cityId}/{minArea}/{maxArea}',[Front\HomePageController::class,'getByCityArea']);
Route::get('properties/search-properties/price-area/{minPrice}/{maxPrice}/{minArea}/{maxArea}',[Front\HomePageController::class,'getByPriceArea']);
Route::get('properties/search-properties/bed-bath/{bed}/{bath}',[Front\HomePageController::class,'getByBedBath']);

Route::get('properties/search-properties/category-city-price/{categoryId}/{cityId}/{minPrice}/{maxPrice}',[Front\HomePageController::class,'getByCategoryCityPrice']);
Route::get('properties/search-properties/category-city-area/{categoryId}/{cityId}/{minArea}/{maxArea}',[Front\HomePageController::class,'getByCategoryCityArea']);
Route::get('properties/search-properties/category-price-area/{categoryId}/{minPrice}/{maxPrice}/{minArea}/{maxArea}',[Front\HomePageController::class,'getByCategoryPriceArea']);
Route::get('properties/search-properties/city-price-area/{cityId}/{minPrice}/{maxPrice}/{minArea}/{maxArea}',[Front\HomePageController::class,'getByCityPriceArea']);
Route::get('properties/search-properties/category-city-price-area/{categoryId}/{cityId}/{minPrice}/{maxPrice}/{minArea}/{maxArea}',[Front\HomePageController::class,'getByCategoryCityPriceArea']);

Route::get('properties/search-properties/bed/{bed}',[Front\HomePageController::class,'getByBed']);
Route::get('properties/search-properties/bath/{bath}',[Front\HomePageController::class,'getByBath']);

Route::get('properties/search-properties/category-bed/{categoryId}/{bed}',[Front\HomePageController::class,'getByCategoryBed']);
Route::get('properties/search-properties/category-bath/{categoryId}/{bath}',[Front\HomePageController::class,'getByCategoryBath']);
Route::get('properties/search-properties/category-bed-bath/{categoryId}/{bed}/{bath}',[Front\HomePageController::class,'getByCategoryBedBath']);

Route::get('properties/search-properties/city-bed/{cityId}/{bed}',[Front\HomePageController::class,'getByCityBed']);
Route::get('properties/search-properties/city-bath/{cityId}/{bath}',[Front\HomePageController::class,'getByCityBath']);
Route::get('properties/search-properties/city-bed-bath/{cityId}/{bed}/{bath}',[Front\HomePageController::class,'getByCityBedBath']);

Route::get('properties/search-properties/price-bed/{minPrice}/{maxPrice}/{bed}',[Front\HomePageController::class,'getByPriceBed']);
Route::get('properties/search-properties/price-bath/{minPrice}/{maxPrice}/{bath}',[Front\HomePageController::class,'getByPriceBath']);
Route::get('properties/search-properties/price-bed-bath/{minPrice}/{maxPrice}/{bed}/{bath}',[Front\HomePageController::class,'getByPriceBedBath']);

Route::get('properties/search-properties/area-bed/{minArea}/{maxArea}/{bed}',[Front\HomePageController::class,'getByAreaBed']);
Route::get('properties/search-properties/area-bath/{minArea}/{maxArea}/{bath}',[Front\HomePageController::class,'getByAreaBath']);
Route::get('properties/search-properties/area-bed-bath/{minArea}/{maxArea}/{bed}/{bath}',[Front\HomePageController::class,'getByAreaBedBath']);

Route::get('properties/search-properties/category-city-bed/{categoryId}/{cityId}/{bed}',[Front\HomePageController::class,'getByCategoryCityBed']);
Route::get('properties/search-properties/category-city-bath/{categoryId}/{cityId}/{bath}',[Front\HomePageController::class,'getByCategoryCityBath']);
Route::get('properties/search-properties/category-city-bed-bath/{categoryId}/{cityId}/{bed}/{bath}',[Front\HomePageController::class,'getByCategoryCityBedBath']);

Route::get('properties/search-properties/category-city-price-bed/{categoryId}/{cityId}/{minPrice}/{maxPrice}/{bed}',[Front\HomePageController::class,'getByCategoryCityPriceBed']);
Route::get('properties/search-properties/category-city-price-bath/{categoryId}/{cityId}/{minPrice}/{maxPrice}/{bath}',[Front\HomePageController::class,'getByCategoryCityPriceBath']);
Route::get('properties/search-properties/category-city-price-bed-bath/{categoryId}/{cityId}/{minPrice}/{maxPrice}/{bed}/{bath}',[Front\HomePageController::class,'getByCategoryCityPriceBedBath']);

Route::get('properties/search-properties/category-city-area-bed/{categoryId}/{cityId}/{minArea}/{maxArea}/{bed}',[Front\HomePageController::class,'getByCategoryCityAreaBed']);
Route::get('properties/search-properties/category-city-area-bath/{categoryId}/{cityId}/{minArea}/{maxArea}/{bath}',[Front\HomePageController::class,'getByCategoryCityAreaBath']);
Route::get('properties/search-properties/category-city-area-bed-bath/{categoryId}/{cityId}/{minArea}/{maxArea}/{bed}/{bath}',[Front\HomePageController::class,'getByCategoryCityAreaBedBath']);

Route::get('properties/search-properties/category-city-price-area-bed-bath/{categoryId}/{cityId}/{minPrice}/{maxPrice}/{minArea}/{maxArea}/{bed}/{bath}',[Front\HomePageController::class,'getByCategoryCityPriceAreaBedBath']);
Route::get('properties/search-properties/title/{cityName}',[Front\HomePageController::class,'getByCityName']);


Route::get('project/{project_id}/landmarks',[Front\HomePageController::class,'getLandmarksPerProject']);
Route::get('project/{project_id}/amenities',[Front\HomePageController::class,'getAmenitiesPerProject']);
Route::get('project/{project_id}/buildings',[Front\HomePageController::class,'getBuildingsPerProject']);
Route::get('project/{project_id}/units',[Front\HomePageController::class,'getUnitsPerProject']);
Route::get('unit/{unit_id}',[Front\HomePageController::class,'getUnitDetails']);
Route::get('projects',[Front\HomePageController::class,'projects']);
Route::post('/get-client-details',[Front\HomePageController::class,'clientDetails']);



Route::get('properties/rent',function(){
    $properties = \App\Models\Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
        ->where('moderation_status',1)
        ->where('status',1)
        ->where('type','rent')
        ->orderBy('id','desc')
        ->get();
    return $properties;
});

Route::get('properties/sale',function(){
    $properties = \App\Models\Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
        ->where('moderation_status',1)
        ->where('status',1)
        ->where('type','sale')
        ->orderBy('id','desc')
        ->get();
    return $properties;
});
