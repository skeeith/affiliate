<?php

namespace App\Repositories;

abstract class Repository
{
    /**
     * Main repository model
     *
     * @var $model
     */
    protected $model;

    /**
     * Create a new repository instance.
     *
     * @param object $model Main repository model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Get all resources in the storage.
     *
     * @return array json object
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Create pagination for the resources.
     *
     * @param  integer $length
     * @return array json object
     */
    public function paginate($length = 10)
    {
        return $this->model->paginate($length);
    }

    /**
     * Find the resource using the specified id or else fail.
     *
     * @param  int $id
     * @return json object
     */
    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Store the data in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return boolean
     */
    public function store($request)
    {
        return $this->model->create($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return boolean
     */
    public function update($request, $id)
    {
        $model = $this->model->findOrFail($id);
        $model->fill($request->all());

        return $model->save();
    }

    /**
     * Remove the specified resource from the storage.
     *
     * @param  int $id
     * @return boolean
     */
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Check if the user is authorize for certain ability.
     *
     * @param  string $ability
     * @return boolean
     */
    public function authorize($ability)
    {
        return auth()->user()->can($ability, $this->model);
    }
}
