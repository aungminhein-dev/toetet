<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author_name',
        'grade',
        'viewer_type',
        'post_type',
        'description',
        'view_count',
        'media'
    ];
}
