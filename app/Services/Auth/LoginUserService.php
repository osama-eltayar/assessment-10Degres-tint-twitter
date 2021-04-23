<?php


namespace App\Services\Auth;


use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\ServiceInterface;
use Illuminate\Support\Facades\Hash;

class LoginUserService implements ServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * LoginUserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {

        $this->userRepository =$userRepository;
    }

    public function handle($data)
    {

        $user =$this->userRepository->findByEmail($data['email']);

        if ($user && Hash::check($data['password'], $user->password))
            return $user ;
    }
}
