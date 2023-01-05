<?php
namespace App\Repositories;

interface IUserRepository extends IRepository
{
    public function getAgents();
}