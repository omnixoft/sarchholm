<?php
namespace App\ViewModels;
use Illuminate\Http\Request;

interface ICategoryModel
{
    public function getAllCategory(Request $request);
    public function getCategoryById($id);
    public function addCategory(Request $request);
    public function updateCategory(Request $request,$id);
    public function delete($id);
}