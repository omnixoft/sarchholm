<?php
namespace App\ViewModels;
use Illuminate\Http\Request;

interface IPackageUserModel
{
    public function getAll(Request $request);
    public function getById($id);
    public function getByUser($id);
    public function getPackages();
    public function add(Request $request);
    public function update(Request $request,$id);
}