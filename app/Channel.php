<?php

namespace App;
use App\Thread;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Channel
 * @package App
 */
class Channel extends Model
{
    public function threads()
    {
        return $this->hasMany(Thread::class, 'channel_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
