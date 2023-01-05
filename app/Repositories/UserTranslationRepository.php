<?php
namespace App\Repositories;

use App\Models\TestimonialTranslation;
use App\Models\UserTranslation;

class UserTranslationRepository implements IUserTranslationRepository
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById($data)
    {
        return UserTranslation::where('user_id',$data['id'])->where('locale',$data['locale'])->first();
    }

    public function getByLocale($locale)
    {

    }

    public function add($data)
    {
        UserTranslation::create([
            'user_id' => $data['userId'],
            'locale'=> $data['locale'],
            'f_name'=> $data['f_name'],
            'l_name'=> $data['l_name'],
            'title'=> $data['title'],
            'company_name'=> $data['company_name'],
            'description'=> $data['description'],
        ]);
    }

    public function update($data)
    {
        UserTranslation::updateOrCreate(
            [
                'user_id' => $data['userId'],
                'locale'    => $data['locale'],
            ], //condition
            [
                'f_name'=> $data['f_name'],
                'l_name'=> $data['l_name'],
                'title'=> $data['title'],
                'company_name'=> $data['company_name'],
                'description'=> $data['description'],
            ]
        );
    }

    public function delete($id)
    {
        UserTranslation::where('user_id',$id)->delete();
    }
}