<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'posts'; 
    protected $primaryKey = 'id';
    public $timestamps = true; // Enable timestamps if you have created_at and updated_at fields

  


    protected $fillable = [
        'title',
        // 'slug',
        // 'user_id',
        'imagePath',
        'body',
    ];

    public function user()
    {
        // This assumes the foreign key in the posts table is user_id
        return $this->belongsTo(User::class, 'user_id');
    }   
}
