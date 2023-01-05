<?php
namespace App\Repositories;

use App\Models\Country;

class CountryRepository implements ICountryRepository
{
    public function getAll()
    {
        return Country::with(['countryTranslation','countryTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
    }

    public function getById($id)
    {
        return  Country::find($id);
    }

    public function add($data)
    {
        return Country::create($data);
    }
    public function update($data,$id)
    {

        $country = $this->getById($id);
        $country->update($data);
    }

    public function delete($id)
    {
        $country = Country::find($id);
        $country->delete();
    }
}
