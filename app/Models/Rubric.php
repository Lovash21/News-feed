<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    use HasFactory;

    protected $table = 'rubric';

    public $timestamps = false;

    function posts()
    {
        return $this->hasMany(Post::class, 'rubric_id');
    }
}
