<?php

namespace App\Filter;

use App\User;

class ThreadFilters extends Filters
{
    protected $filters=['by','popular'];
    /**
     * @param $username
     * @return mixed
     */
    public function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();
        return $this->builder->where('user_id', $user->id);
    }

    public function popular()
    {
        return $this->builder->orderBy('replies_count','desc');
    }
}