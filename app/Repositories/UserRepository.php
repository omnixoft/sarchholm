<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository implements IUserRepository
{
    public function __construct(User $user)
    {
        parent::setModel($user);
    }

    public function getAll()
    {
        return parent::getAll();
    }

    public function getById($id)
    {
        return parent::get($id);
    }

    public function getAgents()
    {
        return User::where('type','user')->get();
    }
    public function add($data)
    {
        return parent::add($data);
    }

    public function update($data,$id)
    {
        parent::update($data,$id);
    }

    public function delete($id)
    {
        parent::delete($id);
    }
}