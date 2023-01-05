<?php
namespace App\Repositories;

use App\Models\PropertyTranslation;

class PropertyTranslationRepository implements IPropertyTranslationRepository
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById($data)
    {
        return PropertyTranslation::where('property_id',$data['id'])->where('locale',$data['locale'])->first();
    }

    public function getByLocale($data,$locale)
    {
        return PropertyTranslation::where('property_id',$data['id'])->where('locale',$locale)->first();
    }

    public function add($data)
    {
        PropertyTranslation::create([
            'property_id'=>$data['propertyId'],
            'locale'=>$data['locale'],
            'title'=>$data['title'],
            'description'=>$data['description'],
        ]);
    }

    public function update($data)
    {
        PropertyTranslation::updateOrCreate(
            [
                'property_id' => $data['propertyId'],
                'locale'    => $data['locale'],
            ], //condition
            [
                'title' => $data['title'],
                'description'    => $data['description'],
            ]
        );
    }

    public function delete($id)
    {
        PropertyTranslation::where('property_id',$id)->delete();
    }
}