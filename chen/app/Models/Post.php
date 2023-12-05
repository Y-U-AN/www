<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    
    protected $table = 'index'; 
    protected $guarded = [];

    protected $with=['category', 'author']; 

    public function comments()
    {
        return $this-> hasMany(Comment::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    } 

    public function author()
    {
        return $this-> belongsTo(User::class,'user_id');
    }


} 

