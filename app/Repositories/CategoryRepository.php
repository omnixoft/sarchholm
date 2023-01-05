<?php
namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements ICategoryRepository
{
    public function getAllCategory()
    {
        return Category::with(['categoryTranslation','categoryTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
    }

    public function getCategoryById($id)
    {
        return  Category::find($id);
    }

    public function add($data)
    {
       return Category::create($data);
    }
    public function update($data,$id)
    {
        $category = $this->getCategoryById($id);;
        $category->update($data);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}
