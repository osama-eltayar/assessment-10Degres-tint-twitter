<?php


namespace App\Repositories;


use App\Models\Tweet;

class TweetRepository implements Interfaces\TweetRepositoryInterface
{

    public function saveForUser($data,$user)
    {
        return $user->tweets()->create($data) ;
    }

    public function countAll()
    {
        return Tweet::count() ;
    }
}
