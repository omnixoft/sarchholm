<?php
namespace App\Repositories;

interface ICountryRepository
{
    public function getAll();
    public function getById($id);
    public function add($data);
    public function update($data,$id);
    public function delete($id);
}