<?php
namespace App\Repositories;

interface IPropertyDetailTranslationRepository
{
    public function getById($id);
    public function add($data);
    public function update($data);
    public function delete($id);
}