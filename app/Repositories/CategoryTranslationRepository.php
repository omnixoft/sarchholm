<?php
namespace App\Repositories;

use App\Models\CategoryTranslation;
use App\Repositories\ICategoryTranslationRepository;

class CategoryTranslationRepository implements ICategoryTranslationRepository
{
    public function getAllCategoryTranslation()
    {
        return CategoryTranslation::all();
    }

    public function getCategoryTranslationById($data)
    {
      return CategoryTranslation::where('category_id',$data['id'])->where('locale',$data['locale'])->first();
    }

    public function getByLocale($locale)
    {
        return CategoryTranslation::where('locale',$locale)->get();
    }
    public function add($data)
    {
        CategoryTranslation::create([
            'category_id'=>$data['categoryId'],
            'locale'=>$data['locale'],
            'name'=>$data['name']
        ]);
    }
    public function update($data)
    {
        CategoryTranslation::updateOrCreate(
            [
                'category_id' => $data['categoryId'],
                'locale'    => $data['locale'],
            ], //condition
            [
                'name'=>$data['name']
            ]
        );
    }

    public function delete($id)
    {
        CategoryTranslation::where('category_id',$id)->delete();
    }
}