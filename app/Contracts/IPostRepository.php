<?php
namespace App\Contracts;
interface IPostRepository{
    function getPosts($tagIdArray = [], $take = 10);
    function getMostViewedEscritor($take = 10);
}