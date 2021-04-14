<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Advertisement extends Model
{
    protected $table = 'advertisements';

    protected $fillable = ['title', 'text', 'name', 'age', 'email', 'category_id'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function attachment()
    {
        return $this->hasMany('App\Models\Attachment', 'advertisement_id');
    }
}
