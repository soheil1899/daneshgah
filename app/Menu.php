<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function articles()
    {
        return $this->hasMany(Article::class,'article_group_id', 'article_group_id');
    }

}
