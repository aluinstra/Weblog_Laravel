<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'topic_id', 'active', 'content',
    ];

    /**
     * Get replies belonging to weblog.
     *
     */
    public function topic()
    {
        return $this->belongsto(Topic::class);
    }

    public function replies()
    {
        return $this->hasMany('App\Models\Reply');
    }

    /**
     * Get the user that belongs to the reply.
     *
     */
    public function user()
    {
        return $this->belongsto(User::class);
    }
}
