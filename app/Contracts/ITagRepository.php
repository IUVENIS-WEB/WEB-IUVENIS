<?php
namespace App\Contracts;
interface ITagRepository{
    function getMostViewedTags($take = 10);
    function getAll();
}