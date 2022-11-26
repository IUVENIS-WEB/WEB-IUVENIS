<?php
namespace App\Contracts;
interface IOrganizacaoRepository{
    public function Participantes($user);
    public function getNaoVerificados();
}