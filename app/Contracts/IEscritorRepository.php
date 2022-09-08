<?php
namespace App\Contracts;
interface IEscritorRepository{
    function getEscritores($ids = [], $take = 10);
    function getEscritor($id = null);
}