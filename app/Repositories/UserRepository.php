<?php


namespace App\Repositories;


use App\Models\User;

class UserRepository implements Interfaces\UserRepositoryInterface
{

    public function countAll()
    {
        return User::count() ;
    }

    public function getAll()
    {
        return User::withCount('tweets')->get();
    }

    public function findByEmail($email)
    {
       return User::where('email', $email)->first();
    }

    public function save($data)
    {
        return User::create($data) ;
    }

    public function followByUser($follower, $user)
    {
        return $user->followers()->syncWithoutDetaching($follower->id);
    }
}
