<?php
namespace App\Repositories;

interface ICategoryTranslationRepository
{
    public function getAllCategoryTranslation();
    public function getByLocale($locale);
    public function getCategoryTranslationById($data);
    public function add($data);
    public function update($data);
    public function delete($id);
}