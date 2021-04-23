<?php


namespace App\Repositories\Interfaces;


interface TweetRepositoryInterface
{
    public function saveForUser($data,$user) ;

    public function countAll() ;
}
