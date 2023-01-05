<?php
namespace App\Repositories;

use App\Models\Currency;

class CurrencyRepository extends Repository implements ICurrencyRepository
{
    public function __construct(Currency $currency)
    {
        parent::setModel($currency);
    }

    public function getAll()
    {
        return parent::getAll();
    }

    public function get($id)
    {
        return parent::get($id);
    }

    public function add($data)
    {
       return parent::add($data);

    }
    public function update($data,$id)
    {
        return parent::update($data,$id);
    }

    public function delete($id)
    {
        parent::delete($id);
    }
}
