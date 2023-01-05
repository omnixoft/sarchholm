<?php
namespace App\Repositories;

use App\Models\SiteInfo;

class SiteInfoRepository extends Repository implements ISiteInfoRepository
{
    public function __construct(SiteInfo $siteInfo)
    {
        parent::setModel($siteInfo);
    }

    public function getAll()
    {
        return parent::getAll();
    }

    public function getById($id)
    {
        return parent::get($id);
    }

    public function add($data)
    {
//        return parent::add($data);

    }
    public function update($data,$id)
    {

        SiteInfo::updateOrCreate(
            [
                'id' => $id,
            ], //condition
            [
                'title'=> $data['title'],
                'logo'=> $data['logo'],
                'favicon'=> $data['favicon'],
                'email'=> $data['email'],
                'phone'=> $data['phone'],
                'description'=> $data['description'],
                'address'=> $data['address'],
                'copy_right'=>$data['copy_right'],
                'fb'=> $data['fb'],
                'twitter'=> $data['twitter'],
                'yt'=> $data['yt'],
                'pinterest'=> $data['pinterest'],
                'terms_condition'=> $data['terms_condition'],
                'privacy_policy'=> $data['privacy_policy'],
                'color'=> $data['color'],
                'about_us'=> $data['about_us'],
            ]
        );
    }

    public function delete($id)
    {
        parent::delete($id);
    }
}