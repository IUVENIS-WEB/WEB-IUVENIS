<?php

namespace App\Repositories;

use App\Contracts\IRepository;
use Illuminate\Database\Eloquent\Model;

class Repository implements IRepository
{
        function getById($id)
        {
                Model::find($id);
        }

        function delete(Model $instance)
        {
                return $instance->delete();
        }


        function insert(array $attributes)
        {
                return Model::create($attributes);
        }

        function edit($id, array $attributes)
        {
                $tag = Model::find($id);
                $arrayKeys = array_keys($attributes);
                foreach ($arrayKeys as $arrayKey) {
                        $tag[$arrayKey] = $attributes[$arrayKey];
                }
                return $tag->save();
        }
}