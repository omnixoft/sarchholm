<?php
namespace App\Services;

use App\Repositories\IPartnerRepository;

class PartnerService
{
    private $_partnerRepository;

    public function __construct(IPartnerRepository $repository)
    {
        $this->_partnerRepository = $repository;
    }

    public function getAll()
    {
        return $this->_partnerRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_partnerRepository->getById($id);
    }

    public function add($data)
    {
        $this->_partnerRepository->add($data);
    }

    public function update($data,$id)
    {
        $this->_partnerRepository->update($data,$id);
    }


    public function delete($id)
    {
        $this->_partnerRepository->delete($id);
    }
}