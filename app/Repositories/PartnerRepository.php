<?php
namespace App\Repositories;

use App\Models\OurPartner;

class PartnerRepository extends Repository implements IPartnerRepository
{
    public function __construct(OurPartner $ourPartner)
    {
        parent::setModel($ourPartner);
    }

    public function getAll()
    {
        return parent::getAll();
    }

    public function getById($id)
    {
        return parent::get($id);
    }

    public function add($data)
    {
        return parent::add($data);
    }
    public function update($data,$id)
    {
        parent::update($data,$id);
    }

    public function delete($id)
    {
        parent::delete($id);
    }
}