<?php
namespace App\ViewModels;
use Illuminate\Http\Request;

interface ISocialLoginModel
{
    public function initialize(Request $request);
}