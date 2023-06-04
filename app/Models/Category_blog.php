<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Category_blog extends Eloquent
{
    use HasFactory;
    protected $table = "category_blogs";
    protected $fillable = [
        'name', 'status', 
    ];
}
