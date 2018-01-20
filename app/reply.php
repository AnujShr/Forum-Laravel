<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class reply
 * @package App
 */
class reply extends Model
{
    use  favoritable,RecordActivity;

    /**
     * @var array
     */
    protected $guarded = [];
    /**
     * @var array
     */
    protected $with = ['owner','favourites'];
    /**
     * @var array
     */
    protected $appends =['favouritesCount','isFavourited'];

    /**
     *
     */
    public static function boot()
    {
        parent::boot();
        static::created(function($reply){
          $reply->thread->increment('replies_count');
        });
        static::deleted(function($reply){
          $reply->thread->increment('replies_count');
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    /**
     * @return string
     */
    public function path()
    {
        return $this->thread->path()."#reply-{$this->id}";
    }

}
