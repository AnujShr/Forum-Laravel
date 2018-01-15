<?php

namespace App;


trait Favoritable
{

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

    public function getFavouritesCountAttribute()
    {
        return $this->favourites->count();
    }
}