<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class category extends Eloquent
{
    use HasFactory;
    protected $collection = 'categories';

    protected $fillable = ['name', 'status'];

    public function products(){
        return $this->hasMany(product::class,'category_id');
    }
}
