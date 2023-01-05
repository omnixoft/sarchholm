<?php
namespace App\Repositories;

use App\Models\City;

class CityRepository implements ICityRepository
{
    public function getAll()
    {
        return City::with(['cityTranslation','cityTranslationEnglish','state.stateTranslation','state.stateTranslationEnglish','country.countryTranslation'])
            ->orderBy('id','DESC')
            ->get();
    }

    public function getById($id)
    {
        return  City::find($id);
    }

    public function add($data)
    {
        return City::create($data);
    }
    public function update($data,$id)
    {
        $city = $this->getById($id);
        $city->update($data);
    }

    public function delete($id)
    {
        $city = City::find($id);
        $city->delete();
    }
}