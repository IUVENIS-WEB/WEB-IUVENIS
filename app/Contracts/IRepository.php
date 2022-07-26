<?php
namespace App\Contracts;
use Illuminate\Database\Eloquent\Model;
interface IRepository{
    public function getById($id);
    public function delete(Model $instance);
    public function insert(array $instance);
    public function edit($id, array $instance);
}