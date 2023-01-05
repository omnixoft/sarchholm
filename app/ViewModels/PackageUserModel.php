<?php
namespace App\ViewModels;

use App\Services\PackageUserService;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;

class PackageUserModel implements IPackageUserModel
{
    private $_packageUserService;

    public function __construct(PackageUserService $service)
    {
        $this->_packageUserService = $service;
    }

    public function getAll(Request $request)
    {

    }

    public function getById($id)
    {
       return $this->_packageUserService->getById($id);
    }

    public function getByUser($id)
    {
        return $this->_packageUserService->getByUser($id);
    }

    public function getPackages()
    {
        $user = auth()->user();
        $id = $user->id;
        return $this->_packageUserService->getPackages($id);
    }
    public function add(Request $request)
    {

    }

    public function update(Request $request,$id)
    {

    }

}