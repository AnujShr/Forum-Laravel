<?php

namespace App;

use App\Channel;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use RecordActivity;
    protected $guarded = [];
    protected $with = ['owner', 'channel'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('replyCount', function ($builder) {
            $builder->withCount('replies');
        });

        static::deleting(function ($thread) {
            $thread->replies->each->delete();
        });



//        static::addGlobalScope('owner', function ($builder) {
//            $builder->with('owner');
//        });
    }


    public function path()
    {
        return "/threads/{$this->channel->slug}/{$this->id}";
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
//            ->withCount('favourites');

    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function addReply($reply)
    {
        return $this->replies()->create($reply);
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);

    }
}
