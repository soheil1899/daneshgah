<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    public function article_group()
    {
        return $this->belongsTo(Article_group::class);
    }

    public function mymenu()
    {
        return $this->belongsTo(Menu::class, 'article_group_id', 'article_group_id');
    }



}
