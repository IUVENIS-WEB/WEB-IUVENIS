<?php
namespace App\Contracts;
interface IOrganizacaoRepository{
    public function getPublicados();
    public function getNaoVerificados();
}