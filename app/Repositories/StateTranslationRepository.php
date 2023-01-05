<?php
namespace App\Repositories;

use App\Models\StateTranslation;

class StateTranslationRepository implements IStateTranslationRepository
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById($data)
    {
        return StateTranslation::where('state_id',$data['id'])->where('locale',$data['locale'])->first();
    }

    public function getByLocale($locale)
    {
        return StateTranslation::where('locale',$locale)->get();
    }

    public function add($data)
    {
        StateTranslation::create([
            'state_id'=> $data['stateId'],
            'locale'=> $data['locale'],
            'name'=>$data['name']
        ]);
    }

    public function update($data)
    {
        StateTranslation::updateOrCreate(
            [
                'state_id' => $data['stateId'],
                'locale'    =>  $data['locale'],
            ], //condition
            [
                'name' => $data['name']
            ]
        );
    }

    public function delete($id)
    {
        StateTranslation::where('state_id',$id)->delete();
    }
}