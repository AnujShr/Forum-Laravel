<?php

namespace App;


/**
 * Trait Favoritable
 * @package App
 */
trait Favoritable
{
    /**
     *
     */
    public static function bootFavoritable()
    {
        static::deleting(function($model){
        $model->favourites->each->delete();
     });
    }

    /**
     * @return mixed
     */
    public function favourites()
    {
        return $this->morphMany(Favourite::class, 'favourited');
    }

    /**
     * @return mixed
     */
    public function favourite()
    {
        if (!$this->favourites()->where(['user_id' => auth()->id()])->exists()) {
            return $this->favourites()->create(['user_id' => auth()->id()]);

        }
    }

    /**
     * @return bool
     */
    public function isFavourited()
    {
        return !!$this->favourites->where('user_id', auth()->id())->count();
    }

    /**
     * @return bool
     */
    public function getIsFavouritedAttribute()
    {
        return $this->isFavourited();
    }

    /**
     * @return mixed
     */
    public function getFavouritesCountAttribute()
    {
        return $this->favourites->count();
    }

    /**
     *
     */
    public function unfavourite()
    {
        $users =['user_id' =>auth()->id()];
        $this->favourites()->where($users)->get()->each->delete();
         
    }
}