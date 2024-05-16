<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image'];

    public function categories(){
        return $this->belongsTo('App\Models\Category');
    }
}
