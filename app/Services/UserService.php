<?php
namespace App\Services;

use App\Repositories\IUserRepository;

class UserService
{
    private $_userRepository;

    public function __construct(IUserRepository $repository)
    {
        $this->_userRepository = $repository;
    }

    public function getAll()
    {
        return $this->_userRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_userRepository->getById($id);
    }
    public function getAgents()
    {
        return $this->_userRepository->getAgents();
    }
    public function add($data)
    {
        $this->_userRepository->add($data);
    }

    public function update($data,$id)
    {
        $this->_userRepository->update($data,$id);
    }

    public function delete($id)
    {
        $this->_userRepository->delete($id);
    }
}