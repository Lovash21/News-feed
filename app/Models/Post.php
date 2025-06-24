<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'statya';

    protected $fillable = ['title', 'lid', 'content', 'rubric_id', 'image'];

    function rubric()
    {
        return $this->belongsTo(Rubric::class, 'rubric_id');
    }
}
