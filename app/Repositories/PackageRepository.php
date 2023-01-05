<?php
namespace App\Repositories;

use App\Models\Package;

class PackageRepository implements IPackageRepository
{
    public function getAll()
    {
        return Package::with(['packageTranslation','packageTranslationEnglish'])
            ->orderBy('id','Desc')
            ->get();
    }

    public function getById($id)
    {
        return  Package::find($id);
    }

    public function add($data)
    {
        return Package::create($data);
    }
    public function update($data,$id)
    {
        $package = $this->getById($id);
        $package->update($data);
    }

    public function delete($id)
    {
        $package = Package::find($id);
        $package->delete();
    }
}