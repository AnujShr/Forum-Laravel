<?php

namespace App\Filter;

use App\User;

class ThreadFilters extends Filters
{
    protected $filters=['by','popular','unanswered'];
    /**
     * @param $username
     * @return mixed
     */
    protected function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();
        return $this->builder->where('user_id', $user->id);
    }

    protected function popular()
    {
        return $this->builder->orderBy('replies_count','desc');
    }
    protected function unanswered(){
        return $this->builder->where('replies_count',0);
    }
}