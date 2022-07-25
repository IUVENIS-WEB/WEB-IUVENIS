<?php
namespace App\Contracts;
interface ITagRepository extends IRepository{
    function getMostViewedTags($take = 10);
}