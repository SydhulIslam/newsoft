<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    use HasFactory;

    # Category hasMany Blogs
    # Many Blogs inside in a Category
    public function blogs(){
        return $this->hasMany(Blog::class);
    }
}
