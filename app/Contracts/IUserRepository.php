<?php
namespace App\Contracts;
interface IUserRepository{
    public function userById($id);
}