<?php
namespace App\Services;

use App\Repositories\ISiteInfoRepository;

class SiteInfoService
{
    private $_siteInfoRepository;

    public function __construct(ISiteInfoRepository $repository)
    {
        $this->_siteInfoRepository = $repository;
    }

    public function getAll()
    {
        return $this->_siteInfoRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_siteInfoRepository->getById($id);
    }

    public function add($data)
    {
        $this->_siteInfoRepository->add($data);
    }

    public function update($data,$id)
    {
        $this->_siteInfoRepository->update($data,$id);
    }


    public function delete($id)
    {
        $this->_siteInfoRepository->delete($id);
    }
}