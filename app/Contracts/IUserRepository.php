<?php
namespace App\Contracts;
interface IUserRepository{
    public function userById($id);
    public function getUserByEmail($email);
    public function inserirResetPassword($email,$token);
}