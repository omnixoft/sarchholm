<?php
namespace App\Services;

use App\Repositories\ICurrencyRepository;

class CurrencyService
{
    private $_currencyRepository;

    public function __construct(ICurrencyRepository $repository)
    {
        $this->_currencyRepository = $repository;
    }

    public function getAll()
    {
        return $this->_currencyRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_currencyRepository->get($id);
    }

    public function add($data)
    {
        $this->_currencyRepository->add($data);
    }

    public function update($data,$id)
    {
        $this->_currencyRepository->update($data,$id);
    }


    public function delete($id)
    {
        $this->_currencyRepository->delete($id);
    }
}
