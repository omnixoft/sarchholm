<?php
namespace App\Repositories;

interface IPropertyRepository extends IRepository
{
    public function getByUser($id);
    public function updateModerationStatus($data,$id);
    public function getByCountry($id);
    public function getByState($id);
    public function getByCity($id);
    public function getByCategory($id);
}
