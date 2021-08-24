<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function dislikes()
    {
        return $this->hasMany(Dislike::class);
    }
    
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    
    public function presentation()
    {
        return $this->hasMany(Presentation::class);
    }

    public function takenBooks()
    {
        return $this->hasMany(TakenBook::class);
    }

    public function queues()
    {
        return $this->hasMany(BookedBook::class);
    }
}
