<?php
namespace App\Repositories;

interface IPropertyDetailRepository
{
    public function getById($id);
    public function getByPropertyId($id);
    public function add($data);
    public function update($data,$id);
    public function delete($id);
}