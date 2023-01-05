<?php
namespace App\Repositories;

use App\Models\FacilityTranslation;

class FacilityTranslationRepository implements IFacilityTranslationRepository
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById($data)
    {
        return FacilityTranslation::where('facility_id',$data['id'])->where('locale',$data['locale'])->first();
    }

    public function getByLocale($locale)
    {
         return FacilityTranslation::where('locale',$locale)->get();
    }

    public function add($data)
    {
        FacilityTranslation::create([
            'facility_id'=> $data['facilityId'],
            'locale'=> $data['locale'],
            'name'=>$data['name']
        ]);
    }

    public function update($data)
    {
        FacilityTranslation::updateOrCreate(
                [
                    'facility_id' => $data['facilityId'],
                    'locale'    =>  $data['locale'],
                ], //condition
                [
                    'name' => $data['name']
                ]
            );
    }

    public function delete($id)
    {
        FacilityTranslation::where('facility_id',$id)->delete();
    }
}