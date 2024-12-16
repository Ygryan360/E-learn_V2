<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'category_id',
        'content',
        'views',
        'last_edit'
    ];

    public function author()
    {
        return User::find($this->user_id);
    }

    public function category()
    {
        return Category::find($this->category_id);
    }
}
