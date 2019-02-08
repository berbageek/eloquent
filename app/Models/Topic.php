<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
