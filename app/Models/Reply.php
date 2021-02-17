<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'post_id', 'content',
    ];

    /**
     * Get the user that belongs to the reply.
     *
     */
    public function user()
    {
        return $this->belongsto(User::class);
    }

    public function post()
    {
        return $this->belongsto('App\Models\Post');
    }
}
