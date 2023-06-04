<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Blog extends Eloquent
{
    use HasFactory;
    protected $table = "blogs";
    protected $fillable = [
        'title_blog','author','image','content','cate_blog_id','status',	
    ];

    public function CateBlog(){
        return $this->belongsTo(Category_blog::class,'cate_blog_id');
    }
}
