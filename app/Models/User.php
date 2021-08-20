<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function book() 
    {
        return $this->hasOne(Book::class); 
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function taken_books()
    {
        return $this->hasMany(TakenBook::class);
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

    public function presentations()
    {
        return $this->hasMany(Presentation::class);
    }

    public function participations()
    {
        return $this->belongsToMany(Presentation::class);
    }

    public function actions()
    {
        return $this->belongsToMany(Activity::class);
    }

    public function booked_books()
    {
        return $this->hasMany(BookedBook::class);
    }    
}
