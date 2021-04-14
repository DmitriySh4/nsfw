<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = ['name', 'path', 'advertisement_id'];

    public function advertisement()
    {
        return $this->belongsTo('App\Models\Advertisement', 'advertisement_id');
    }
}
