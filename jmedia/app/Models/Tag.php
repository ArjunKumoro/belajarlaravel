<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";

    public function article()
    {
        return $this->belongsTo(\App\Models\Article::class);
    }
}
