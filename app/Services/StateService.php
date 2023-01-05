<?php
namespace App\Services;

use App\Repositories\IStateRepository;
use App\Repositories\IStateTranslationRepository;

class StateService
{
    private $_stateRepository;
    private $_stateTranslationRepository;

    public function __construct(IStateRepository $repository,IStateTranslationRepository $translationRepository)
    {
        $this->_stateRepository = $repository;
        $this->_stateTranslationRepository = $translationRepository;
    }

    public function getAll()
    {
        return $this->_stateRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_stateRepository->getById($id);
    }

    public function add($data)
    {
        $state = $this-> _stateRepository->add($data);
        $data['stateId'] = $state->id;
        $this->_stateTranslationRepository->add($data);
    }

    public function update($data,$id)
    {
        $this->_stateRepository->update($data,$id);
    }


    public function delete($id)
    {
        $this->_stateRepository->delete($id);
    }
}