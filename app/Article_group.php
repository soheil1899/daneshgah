<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article_group extends Model
{


    public function articles()
    {
        return $this->hasMany(Article::class);
    }

}
