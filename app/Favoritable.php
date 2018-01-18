<?php

namespace App;


trait Favoritable
{
    public static function bootFavoritable()
    {
        static::deleting(function($model){
        $model->favourites->each->delete();
     });
    }   

    public function favourites()
    {
        return $this->morphMany(Favourite::class, 'favourited');
    }

    public function favourite()
    {
        if (!$this->favourites()->where(['user_id' => auth()->id()])->exists()) {
            return $this->favourites()->create(['user_id' => auth()->id()]);

        }
    }

    public function isFavourited()
    {
        return !!$this->favourites->where('user_id', auth()->id())->count();
    }

    public function getIsFavouritedAttribute()
    {
        return $this->isFavourited();
    }

    public function getFavouritesCountAttribute()
    {
        return $this->favourites->count();
    }

    public function unfavourite()
    {
        $users =['user_id' =>auth()->id()];
        $this->favourites()->where($users)->get()->each->delete();
         
    }
}