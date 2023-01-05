<?php
namespace App\Repositories;

use App\Models\PropertyDetail;

class PropertyDetailRepository implements IPropertyDetailRepository
{
    public function getById($id)
    {
        // TODO: Implement getById() method.
    }
    public function getByPropertyId($id)
    {
       return PropertyDetail::where('property_id',$id)->first();
    }
    public function add($data)
    {
      return PropertyDetail::create([
            'property_id'=> $data['propertyId'],
            'bed'=> $data['bed'],
            'bath'=> $data['bath'],
            'garage'=> $data['garage'],
            'floor'=> $data['floor'],
            'room_size'=> $data['room_size'],
            'content'=> $data['content'],
            'video'=> $data['video'],
        ]);
    }

    public function update($data, $id)
    {
        $propertyDetail = $this->getByPropertyId($id);
        $propertyDetail->update($data);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
