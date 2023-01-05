<?php
namespace App\Repositories;

interface IPropertySearchRepository
{
    public function getByCategory($data);
    public function getByCity($data);
    public function getByPrice($data);
    public function getByArea($data);
    public function getByCategoryCity($data);
    public function getByCategoryPrice($data);
    public function getByCategoryArea($data);
    public function getByCityPrice($data);
    public function getByCityArea($data);
    public function getByPriceArea($data);
    public function getByBedBath($data);
    public function getByCategoryCityPrice($data);
    public function getByCategoryCityArea($data);
    public function getByCategoryPriceArea($data);
    public function getByCityPriceArea($data);
    public function getByCategoryCityPriceArea($data);

    public function getByBed($data);
    public function getByBath($data);

    public function getByCategoryBed($data);
    public function getByCategoryBath($data);
    public function getByCategoryBedBath($data);

    public function getByCityBed($data);
    public function getByCityBath($data);
    public function getByCityBedBath($data);

    public function getByPriceBed($data);
    public function getByPriceBath($data);
    public function getByPriceBedBath($data);

    public function getByAreaBed($data);
    public function getByAreaBath($data);
    public function getByAreaBedBath($data);

    public function getByCategoryCityBed($data);
    public function getByCategoryCityBath($data);
    public function getByCategoryCityBedBath($data);

    public function getByCategoryCityPriceBed($data);
    public function getByCategoryCityPriceBath($data);
    public function getByCategoryCityPriceBedBath($data);

    public function getByCategoryCityAreaBed($data);
    public function getByCategoryCityAreaBath($data);
    public function getByCategoryCityAreaBedBath($data);

    public function getByCategoryCityPriceAreaBedBath($data);

    public function getByCityName($data);
}
