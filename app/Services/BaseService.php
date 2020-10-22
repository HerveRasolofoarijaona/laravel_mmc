<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

abstract class BaseService
{
	/* @var Model */
	protected $model;

	public function all()
	{
		return $this->model->all();
	}

	public function paginate()
	{
		return $this->model->paginate(10);
	}
	public function create(array $input)
	{
		return $this->model->create($input);
	}
	public function find($id)
	{
		return $this->model->find($id);
	}

	public function update($id, array $input)
	{
		return $this->find($id)->update($input);
	}

	public function destroy($id)
	{
		return $this->model->destroy($id);
	}

	public function with($relation)
	{
		return $this->model->with($relation);
	}
}