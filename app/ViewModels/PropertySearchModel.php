<?php
namespace App\ViewModels;

use App\Services\PropertySearchService;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PropertySearchModel implements IPropertySearchModel
{
    private $_propertySearchService;

    public function __construct(PropertySearchService $propertySearchService)
    {
        $this->_propertySearchService = $propertySearchService;
    }

    public function getData(Request $request)
    {
        Session::get('currentLocal');

        $data = [];
        $data['title'] = $request->input('title');
        $data['category'] = $request->input('category_id');
        $data['city'] = $request->input('city_id');
        $data['minPrice'] = $request->input('minPrice');
        $data['maxPrice'] = $request->input('maxPrice');
        $data['minArea'] = $request->input('minArea');
        $data['maxArea'] = $request->input('maxArea');
        $data['bed'] = $request->input('bed');
        $data['bath'] = $request->input('bath');
        // dd($data);
        return $this->_propertySearchService->getData($data);
    }

}
