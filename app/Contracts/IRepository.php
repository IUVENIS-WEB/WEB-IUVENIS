<?php
namespace App\Contracts;
use Illuminate\Database\Eloquent\Model;

interface IRepository{
    public function getById($id);
    public function remove(Model $instance);
    public function insert(array $attributes);
    public function edit($id, array $attributes);
}