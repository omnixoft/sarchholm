<?php
namespace App\ViewModels;

use Illuminate\Http\Request;

interface ICountryModel
{
    public function getAllCountry(Request $request);
    public function getCountryById($id);
    public function addCountry(Request $request);
    public function updateCountry(Request $request,$id);
    public function delete($id);
}