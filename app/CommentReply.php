<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = [
        'comment_id','is_active','author','email','content'
    ];

    public function comments_reply()
    {
        return $this->belongsTo('App\Comment', 'comment_id');
    }
}
