<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Activity
 * @package App
 */
class Activity extends Model
{
    /**
     * @var array
     */
    protected $guarded=[];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function subject()
    {
        return $this->morphTo();
    }

    /**
     * @param $user
     * @param int $take
     * @return mixed
     */
    public static function feed($user, $take = 50)
    {
        return static::where('user_id',$user->id)
            ->latest()
            ->take($take)
            ->with('subject')
            ->get()
            ->groupBy(function ($activity) {
            return $activity->created_at->format('Y-m-d');
        });
    }

}

