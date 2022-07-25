<?php

namespace App\Repositories;

use App\Contracts\ITagRepository;
use App\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class TagRepository extends Repository implements ITagRepository
{
        function getMostViewedTags($take = 10)
        {
                return DB::table('post_tags')
                        ->select(DB::raw('count(*) as tag_count, tags.id'))
                        ->join('tags', 'post_tags.tag_id', '=', 'tags.id')
                        ->orderBy('tag_count', 'asc')
                        ->groupBy('tags.id')
                        ->take($take)
                        ->get();
        }
}
