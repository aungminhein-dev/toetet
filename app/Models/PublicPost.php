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
        'media',
        'grade',
        'category_name',
        'viewer_type',
        'description',
        'view_count',
    ];
}
