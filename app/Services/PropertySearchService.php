<?php
namespace App\Services;

use App\Repositories\IPropertyArea;
use App\Repositories\IPropertySearchRepository;

class PropertySearchService
{
    private $_propertySearchRepository;
    private $_propertyArea;

    public function __construct(IPropertySearchRepository $_propertySearchRepository)
    {
        $this->_propertySearchRepository = $_propertySearchRepository;
    }
    public function getData($data)
    {
        if($data['category'] && $data['city'] == "" && $data['minPrice'] =="" && $data['maxPrice'] =="" && $data['minArea'] =="" && $data['maxArea'] =="" && $data['bed']=="" && $data['bath']=="" && $data['title']=="")
        {
            // dd(1);
            return $this->_propertySearchRepository->getByCategory($data);
        }elseif($data['category']=="" && $data['city'] && $data['minPrice'] =="" && $data['maxPrice'] =="" && $data['minArea'] =="" && $data['maxArea'] =="" && $data['bed']=="" && $data['bath']=="" && $data['title']==""){
            // dd(2);
            return $this->_propertySearchRepository->getByCity($data);
        }elseif($data['category']=="" && $data['city']== "" && $data['minPrice'] && $data['maxPrice'] && $data['minArea'] =="" && $data['maxArea'] =="" && $data['bed']=="" && $data['bath']=="" && $data['title']==""){
            // dd(3);
            return $this->_propertySearchRepository->getByPrice($data);
        }elseif($data['category']=="" && $data['city']== "" && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea'] && $data['maxArea'] && $data['bed']=="" && $data['bath']=="" && $data['title']==""){
            // dd('getByArea');
            return $this->_propertySearchRepository->getByArea($data);
        }elseif($data['category'] && $data['city']  && $data['minPrice'] =="" && $data['maxPrice'] =="" && $data['minArea'] =="" && $data['maxArea'] =="" && $data['bed']=="" && $data['bath']=="" && $data['title']=="")
        {
            // dd(4);
            return $this->_propertySearchRepository->getByCategoryCity($data);
        }elseif($data['category'] && $data['city']== "" && $data['minPrice'] && $data['maxPrice'] && $data['minArea'] =="" && $data['maxArea'] =="" && $data['bed']=="" && $data['bath']=="" && $data['title']==""){
            // dd(5);
            return $this->_propertySearchRepository->getByCategoryPrice($data);
        }elseif($data['category'] && $data['city']== "" && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea'] && $data['maxArea'] && $data['bed']=="" && $data['bath']=="" && $data['title']==""){
            // dd('categoryArea');
            return $this->_propertySearchRepository->getByCategoryArea($data);
        }elseif($data['category'] == "" && $data['city'] && $data['minPrice'] && $data['maxPrice'] && $data['minArea'] =="" && $data['maxArea'] =="" && $data['bed']=="" && $data['bath']=="" && $data['title']==""){
            // dd(6);
            return $this->_propertySearchRepository->getByCityPrice($data);
        }elseif($data['category'] == "" && $data['city'] && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea'] && $data['maxArea'] && $data['bed']=="" && $data['bath']=="" && $data['title']==""){
            // dd('cityArea');
            return $this->_propertySearchRepository->getByCityArea($data);
        }elseif($data['category'] == "" && $data['city']=="" && $data['minPrice'] && $data['maxPrice'] && $data['minArea'] && $data['maxArea'] && $data['bed']=="" && $data['bath']=="" && $data['title']==""){
            // dd('priceArea');
            return $this->_propertySearchRepository->getByPriceArea($data);
        }elseif($data['category'] && $data['city'] && $data['minPrice'] && $data['maxPrice'] && $data['minArea'] =="" && $data['maxArea'] =="" && $data['bed']=="" && $data['bath']=="" && $data['title']==""){
            // dd(7);
            return $this->_propertySearchRepository->getByCategoryCityPrice($data);
        }elseif($data['category'] && $data['city'] && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea'] && $data['maxArea'] && $data['bed']=="" && $data['bath']=="" && $data['title']==""){
            // dd('categoryCityArea');
            return $this->_propertySearchRepository->getByCategoryCityArea($data);
        }elseif($data['category'] && $data['city']=="" && $data['minPrice'] && $data['maxPrice'] && $data['minArea'] && $data['maxArea'] && $data['bed']=="" && $data['bath']=="" && $data['title']==""){
            // dd('categoryPriceArea');
            return $this->_propertySearchRepository->getByCategoryPriceArea($data);
        }elseif($data['category']=="" && $data['city'] && $data['minPrice'] && $data['maxPrice'] && $data['minArea'] && $data['maxArea'] && $data['bed']=="" && $data['bath']=="" && $data['title']==""){
            // dd('cityPriceArea');
            return $this->_propertySearchRepository->getByCityPriceArea($data);
        }elseif($data['category'] && $data['city'] && $data['minPrice'] && $data['maxPrice'] && $data['minArea'] && $data['maxArea'] && $data['bed']=="" && $data['bath']=="" && $data['title']==""){
            // dd('categoryCityPriceArea');
            return $this->_propertySearchRepository->getByCategoryCityPriceArea($data);
        }elseif($data['category']=="" && $data['city']=="" && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea']=="" && $data['maxArea']=="" && $data['bed'] && $data['bath'] && $data['title']==""){
            // dd('BedBath');
            return $this->_propertySearchRepository->getByBedBath($data);
        }
        elseif($data['category']=="" && $data['city']=="" && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea']=="" && $data['maxArea']=="" && $data['bed'] && $data['bath']=="" && $data['title']==""){
            // dd('Bed');
            return $this->_propertySearchRepository->getByBed($data);
        }
        elseif($data['category']=="" && $data['city']=="" && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea']=="" && $data['maxArea']=="" && $data['bed']=="" && $data['bath'] && $data['title']==""){
            // dd('Bath');
            return $this->_propertySearchRepository->getByBath($data);
        }
        elseif($data['category'] && $data['city']=="" && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea']=="" && $data['maxArea']=="" && $data['bed'] && $data['bath']=="" && $data['title']==""){
            // dd('CategoryBed');
            return $this->_propertySearchRepository->getByCategoryBed($data);
        }
        elseif($data['category'] && $data['city']=="" && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea']=="" && $data['maxArea']=="" && $data['bed']=="" && $data['bath'] && $data['title']==""){
            // dd('CategoryBath');
            return $this->_propertySearchRepository->getByCategoryBath($data);
        }
        elseif($data['category'] && $data['city']=="" && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea']=="" && $data['maxArea']=="" && $data['bed'] && $data['bath'] && $data['title']==""){
            // dd('CategoryBedBath');
            return $this->_propertySearchRepository->getByCategoryBedBath($data);
        }
        elseif($data['category']=="" && $data['city'] && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea']=="" && $data['maxArea']=="" && $data['bed'] && $data['bath']=="" && $data['title']==""){
            // dd('CityBed');
            return $this->_propertySearchRepository->getByCityBed($data);
        }
        elseif($data['category']=="" && $data['city'] && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea']=="" && $data['maxArea']=="" && $data['bed']=="" && $data['bath'] && $data['title']==""){
            // dd('CityBath');
            return $this->_propertySearchRepository->getByCityBath($data);
        }
        elseif($data['category']=="" && $data['city'] && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea']=="" && $data['maxArea']=="" && $data['bed'] && $data['bath'] && $data['title']==""){
            // dd('CityBedBath');
            return $this->_propertySearchRepository->getByCityBedBath($data);
        }
        elseif($data['category']=="" && $data['city']=="" && $data['minPrice'] && $data['maxPrice'] && $data['minArea']=="" && $data['maxArea']=="" && $data['bed'] && $data['bath']=="" && $data['title']==""){
            // dd('PriceBed');
            return $this->_propertySearchRepository->getByPriceBed($data);
        }
        elseif($data['category']=="" && $data['city']=="" && $data['minPrice'] && $data['maxPrice'] && $data['minArea']=="" && $data['maxArea']=="" && $data['bed']=="" && $data['bath'] && $data['title']==""){
            // dd('PriceBath');
            return $this->_propertySearchRepository->getByPriceBath($data);
        }
        elseif($data['category']=="" && $data['city']=="" && $data['minPrice'] && $data['maxPrice'] && $data['minArea']=="" && $data['maxArea']=="" && $data['bed'] && $data['bath'] && $data['title']==""){
            // dd('PriceBedBath');
            return $this->_propertySearchRepository->getByPriceBedBath($data);
        }
        elseif($data['category']=="" && $data['city']=="" && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea'] && $data['maxArea'] && $data['bed'] && $data['bath']=="" && $data['title']==""){
            // dd('AreaBed');
            return $this->_propertySearchRepository->getByAreaBed($data);
        }
        elseif($data['category']=="" && $data['city']=="" && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea'] && $data['maxArea'] && $data['bed']=="" && $data['bath'] && $data['title']==""){
            // dd('AreaBath');
            return $this->_propertySearchRepository->getByAreaBath($data);
        }
        elseif($data['category']=="" && $data['city']=="" && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea'] && $data['maxArea'] && $data['bed'] && $data['bath'] && $data['title']==""){
            // dd('AreaBedBath');
            return $this->_propertySearchRepository->getByAreaBedBath($data);
        }
        elseif($data['category'] && $data['city'] && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea']=="" && $data['maxArea']=="" && $data['bed'] && $data['bath']=="" && $data['title']==""){
            // dd('CategoryCityBed');
            return $this->_propertySearchRepository->getByCategoryCityBed($data);
        }
        elseif($data['category'] && $data['city'] && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea']=="" && $data['maxArea']=="" && $data['bed']=="" && $data['bath'] && $data['title']==""){
            // dd('CategoryCityBath');
            return $this->_propertySearchRepository->getByCategoryCityBath($data);
        }
        elseif($data['category'] && $data['city'] && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea']=="" && $data['maxArea']=="" && $data['bed'] && $data['bath'] && $data['title']==""){
            // dd('CategoryCityBedBath');
            return $this->_propertySearchRepository->getByCategoryCityBedBath($data);
        }
        elseif($data['category'] && $data['city'] && $data['minPrice'] && $data['maxPrice'] && $data['minArea']=="" && $data['maxArea']=="" && $data['bed'] && $data['bath']=="" && $data['title']==""){
            // dd('CategoryCityPriceBed');
            return $this->_propertySearchRepository->getByCategoryCityPriceBed($data);
        }
        elseif($data['category'] && $data['city'] && $data['minPrice'] && $data['maxPrice'] && $data['minArea']=="" && $data['maxArea']=="" && $data['bed']=="" && $data['bath'] && $data['title']==""){
            // dd('CategoryCityPriceBath');
            return $this->_propertySearchRepository->getByCategoryCityPriceBath($data);
        }
        elseif($data['category'] && $data['city'] && $data['minPrice'] && $data['maxPrice'] && $data['minArea']=="" && $data['maxArea']=="" && $data['bed'] && $data['bath'] && $data['title']==""){
            // dd('CategoryCityPriceBedBath');
            return $this->_propertySearchRepository->getByCategoryCityPriceBedBath($data);
        }
        elseif($data['category'] && $data['city'] && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea'] && $data['maxArea'] && $data['bed'] && $data['bath']=="" && $data['title']==""){
            // dd('CategoryCityAreaBed');
            return $this->_propertySearchRepository->getByCategoryCityAreaBed($data);
        }
        elseif($data['category'] && $data['city'] && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea'] && $data['maxArea'] && $data['bed']=="" && $data['bath'] && $data['title']==""){
            // dd('CategoryCityAreaBath');
            return $this->_propertySearchRepository->getByCategoryCityAreaBath($data);
        }
        elseif($data['category'] && $data['city'] && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea'] && $data['maxArea'] && $data['bed'] && $data['bath'] && $data['title']==""){
            // dd('CategoryCityAreaBedBath');
            return $this->_propertySearchRepository->getByCategoryCityAreaBedBath($data);
        }
        elseif($data['category'] && $data['city'] && $data['minPrice'] && $data['maxPrice'] && $data['minArea'] && $data['maxArea'] && $data['bed'] && $data['bath'] && $data['title']==""){
            // dd('CategoryCityPriceAreaBedBath');
            return $this->_propertySearchRepository->getByCategoryCityPriceAreaBedBath($data);
        }
        elseif($data['category']=="" && $data['city']=="" && $data['minPrice']=="" && $data['maxPrice']=="" && $data['minArea']=="" && $data['maxArea']=="" && $data['bed']=="" && $data['bath']=="" && $data['title']){
            // dd('CategoryCityPriceAreaBedBath');
            return $this->_propertySearchRepository->getByCityName($data);
        }
        else{
            return null;
        }

    }
}
