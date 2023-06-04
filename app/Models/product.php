<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class product extends Eloquent
{
    use HasFactory;
    protected $collection = 'products';
    protected $fillable = ['name', 'price','sale_price','image','status','category_id','description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
