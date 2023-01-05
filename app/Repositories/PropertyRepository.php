<?php
namespace App\Repositories;

use App\Models\Property;

class PropertyRepository extends Repository implements IPropertyRepository
{
    public function __construct(Property $property)
    {
        parent::setModel($property);
    }

    public function getAll()
    {
       return  Property::with(['propertyTranslation','propertyTranslationEnglish','category.categoryTranslation'])
            ->orderBy('id','DESC')
            ->get();
    }

    public function getById($id)
    {
        return parent::get($id);
    }

    public function getByUser($id)
    {
        return Property::with(['user','propertyTranslation','propertyTranslationEnglish','category.categoryTranslation','package.package.packageTranslation'])
            ->where('user_id',$id)
            ->orderBy('id','DESC')
            ->get();
    }

    public function add($data)
    {
        return parent::add($data);
    }
    public function update($data,$id)
    {
        parent::update($data,$id);
        $property = $this->getById($id);
        $property->facilities()->sync($data['facility_id']);
    }

    public function updateModerationStatus($data,$id)
    {
        $property = $this->getById($id);
        $property->update($data);
    }

    public function getByCountry($id)
    {
        return Property::where('country_id',$id)->first();
    }

    public function getByState($id)
    {
        return Property::where('state_id',$id)->first();
    }

    public function getByCity($id)
    {
        return Property::where('city_id',$id)->first();
    }

    public function getByCategory($id)
    {
        return Property::where('category_id',$id)->first();
    }
    public function delete($id)
    {
        parent::delete($id);
    }
}
