<?php
namespace App\Repositories;

use App\Models\Facility;

class FacilityRepository implements IFacilityRepository
{
    public function getAll()
    {
        return Facility::with(['facilityTranslation','facilityTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
    }

    public function getById($id)
    {
        return  Facility::find($id);
    }

    public function add($data)
    {
        return Facility::create($data);
    }
    public function update($data,$id)
    {

        $facility = $this->getById($id);
        $facility->update($data);
    }

    public function delete($id)
    {
        $country = Facility::find($id);
        $country->delete();
    }
}