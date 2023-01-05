<?php
namespace App\ViewModels;
use Illuminate\Http\Request;

interface IFacilityTranslationModel
{
    public function getAll(Request $request);
    public function getById($id);
    public function getByLocale();
    public function add(Request $request);
    public function update(Request $request,$id);
    public function delete($id);
}