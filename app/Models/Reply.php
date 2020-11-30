<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    /**
     * Get the user that belongs to the reply.
     *
     */
    public function user()
    {
        return $this->belongsto('App\Models\User');
    }

    public function post()
    {
        return $this->belongsto('App\Models\Post');
    }
}
