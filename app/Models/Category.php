<?php

namespace App\Models;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'user_id'];

    public function author()
    {
        return User::find($this->user_id);
    }

    public function courses($pp = 8)
    {
        return Course::where('category_id', operator: $this->id)->paginate($pp);
    }
}
