<?php
namespace App\Repositories;

use App\Models\State;

class StateRepository implements IStateRepository
{
    public function getAll()
    {
        return State::with(['stateTranslation','stateTranslationEnglish'])
        ->orderBy('id','DESC')
        ->get();
    }

    public function getById($id)
    {
        return  State::find($id);
    }

    public function add($data)
    {
        return State::create($data);
    }
    public function update($data,$id)
    {

        $state = $this->getById($id);
        $state->update($data);
    }

    public function delete($id)
    {
        $country = State::find($id);
        $country->delete();
    }
}