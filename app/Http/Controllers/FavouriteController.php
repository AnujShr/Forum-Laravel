<?php

namespace App\Http\Controllers;

use App\Favourite;
use App\Reply;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function store(Reply $reply)
    {
        if(Auth()->check()){
            $reply->favourite();
            return back();
        }
        else
            return redirect('login');
    }

    public function destroy(Reply $reply)
    {
        $reply->unfavourite();
    }
}
