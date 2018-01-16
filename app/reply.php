<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reply extends Model
{
    use  favoritable,RecordActivity;

    protected $guarded = [];
    protected $with = ['owner','favourites'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
    public function path()
    {
        return $this->thread->path()."#reply-{$this->id}";
    }

}
