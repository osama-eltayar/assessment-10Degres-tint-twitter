<?php


namespace App\Services\User;


use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\ServiceInterface;
use Illuminate\Validation\ValidationException;

class CreateFollowerService implements ServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository=$userRepository;
    }

    public function handle($data)
    {
        if ($data['follower']->id == $data['user']->id)
            throw ValidationException::withMessages(['user'=>"can't follow yourself"]);

        return $this->userRepository->followByUser($data['follower'], $data['user']);
    }
}
