<?php
namespace App\Repositories;
use App\Models\PropertyDetailTranslation;
class PropertyDetailTranslationRepository implements IPropertyDetailTranslationRepository
{
    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function add($data)
    {
        PropertyDetailTranslation::create([
            'propertyDetail_id'=>$data['propertyDetailId'],
            'locale'=>$data['locale'],
            'content'=>$data['content']
        ]);
    }

    public function update($data)
    {
        PropertyDetailTranslation::updateOrCreate(
            [
                'propertyDetail_id' => $data['propertyDetailId'],
                'locale'    => $data['locale'],
            ], //condition
            [
                'content'    => $data['content']
            ]
        );
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}