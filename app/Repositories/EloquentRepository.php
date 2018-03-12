<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface
{
    protected $modelClassName;

	public function create(array $attributes)
	{
		return call_user_func_array("{$this->modelClassName}::create", array($attributes));
	}
	public function all($columns = array('*'))
	{
		return call_user_func_array("{$this->modelClassName}::all", array($columns));
	}

	public function find($id, $attribute = 'id')
	{
		return call_user_func_array("{$this->modelClassName}::where", array($attribute, '=', $id))->firstOrFail();
	}

	public function destroy($ids)
	{
		return call_user_func_array("{$this->modelClassName}::destroy", array($ids));
	}

	public function update(array $data, $id, $attribute = "id")
    {
        return call_user_func_array("{$this->modelClassName}::where", array($attribute, '=', $id))->update($data);
    }
}