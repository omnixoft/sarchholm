<?php
namespace App\Repositories;

interface IRepository
{
    public function get($id);
    public function getAll();
    public function add($data);
    public function update($data, $id);
    public function delete($id);
}