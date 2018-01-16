<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use RecordActivity;

    protected $guarded = [];

    public function favourited()
    {
        return $this->morphTo();
    }

}
