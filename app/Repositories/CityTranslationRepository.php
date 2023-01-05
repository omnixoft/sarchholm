<?php
namespace App\Repositories;

use App\Models\CityTranslation;

class CityTranslationRepository implements ICityTranslationRepository
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById($data)
    {
        return CityTranslation::where('city_id',$data['id'])->where('locale',$data['locale'])->first();
    }

    public function getByLocale($locale)
    {
        return CityTranslation::where('locale',$locale)->get();
    }

    public function add($data)
    {
        CityTranslation::create([
            'city_id'=> $data['cityId'],
            'locale'=> $data['locale'],
            'name'=>$data['name']
        ]);
    }

    public function update($data)
    {
        CityTranslation::updateOrCreate(
            [
                'city_id' => $data['cityId'],
                'locale'    =>  $data['locale'],
            ], //condition
            [
                'name' => $data['name']
            ]
        );
    }

    public function delete($id)
    {
        CityTranslation::where('city_id',$id)->delete();
    }
}