<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';

    protected $fillable = ['name', 'description', 'path', 'price'];

    public function advertisement()
    {
        return $this->hasMany('App\Models\Advertisement', 'category_id');
    }
}
