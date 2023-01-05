<?php
namespace App\ViewModels;
use Illuminate\Http\Request;

interface IPropertySearchModel
{
    public function getData(Request $request);
}
