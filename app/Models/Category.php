<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $fillable = [
        'name',
    ];     

    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamps = true; // Enable timestamps if you have created_at and updated_at fields

    public function posts()
    {
        // This function defines the one-to-many relationship between Category and Post. 
        //This category has many posts.
        return $this->hasMany(Post::class);
    }
}
