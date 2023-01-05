<?php
namespace App\Repositories;

interface ICategoryRepository
{
    public function getAllCategory();
    public function getCategoryById($id);
    public function add($data);
    public function update($data,$id);
    public function delete($id);
}