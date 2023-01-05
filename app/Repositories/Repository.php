<?php
namespace App\Repositories;

class Repository implements IRepository
{
    protected $model;

    public function get($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function add($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $id)
    {
        $record = $this->model->findOrFail($id);
        $record->update($data);
    }

    public function delete($id)
    {
        $this->model->destroy($id);
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

}
