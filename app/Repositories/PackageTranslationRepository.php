<?php
namespace App\Repositories;

use App\Models\PackageTranslation;

class PackageTranslationRepository implements IPackageTranslationRepository
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById($data)
    {
        return PackageTranslation::where('package_id',$data['id'])->where('locale',$data['locale'])->first();
    }

    public function getByLocale($locale)
    {
        return PackageTranslation::where('locale',$locale)->get();
    }

    public function add($data)
    {
        PackageTranslation::create([
            'package_id'=> $data['packageId'],
            'locale'=> $data['locale'],
            'name'=>$data['name']
        ]);
    }

    public function update($data)
    {
        PackageTranslation::updateOrCreate(
            [
                'package_id' => $data['packageId'],
                'locale'    =>  $data['locale'],
            ], //condition
            [
                'name' => $data['name']
            ]
        );
    }

    public function delete($id)
    {
        PackageTranslation::where('package_id',$id)->delete();
    }
}