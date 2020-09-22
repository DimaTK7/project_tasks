<?php

namespace App\Http\Queries\Role;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractQuery
{
    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function get()
    {
        return $this->model::paginate(10);
    }

    public function one($id)
    {
        return $this->model::find($id);
    }

    public function all()
    {
        return $this->model::all();
    }
}
