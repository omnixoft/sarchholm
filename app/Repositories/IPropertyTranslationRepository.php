<?php
namespace App\Repositories;

interface IPropertyTranslationRepository
{
    public function getAll();
    public function getById($data);
    public function getByLocale($data,$locale);
    public function add($data);
    public function update($data);
    public function delete($id);
}