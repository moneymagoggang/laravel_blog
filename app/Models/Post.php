<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;



    protected $fillable = [
        'title',
        'content',
        'user_id',
        'tag_id',
        'status'
        ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');

    }
    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

}
