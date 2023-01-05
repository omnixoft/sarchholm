<?php
namespace App\Repositories;

use App\Models\CountryTranslation;

class CountryTranslationRepository implements ICountryTranslationRepository
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById($data)
    {
        return CountryTranslation::where('country_id',$data['id'])->where('locale',$data['locale'])->first();
    }

    public function getByLocale($locale)
    {
         return CountryTranslation::where('locale',$locale)->get();
    }

    public function add($data)
    {
        CountryTranslation::create([
            'country_id'=> $data['countryId'],
            'locale'=> $data['locale'],
            'name'=>$data['name']
        ]);
    }

    public function update($data)
    {
        CountryTranslation::updateOrCreate(
                [
                    'country_id' => $data['countryId'],
                    'locale'    =>  $data['locale'],
                ], //condition
                [
                    'name' => $data['name']
                ]
            );
    }

    public function delete($id)
    {
        CountryTranslation::where('country_id',$id)->delete();
    }
}