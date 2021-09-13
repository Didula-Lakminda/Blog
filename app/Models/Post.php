<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;

    //add sluggable (if we add something it will create slug for us)
    use Sluggable;

    protected $fillable = ['title', 'slug', 'description', 'image_path', 'user_id'];

    // create relationship for models
    public function user(){
        //one post belongs to on user
        return $this->belongsTo(User::class);
    }

    //function and data type
    public function sluggable(): array {
        //set sluggable source as title
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
