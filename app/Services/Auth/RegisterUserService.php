<?php


namespace App\Services\Auth;


use App\Enums\StorageTree;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\ServiceInterface;
use App\Traits\HasFiles;

class RegisterUserService implements ServiceInterface
{
    use HasFiles;

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
        $data['image'] = $this->storeFile(StorageTree::USERS,$data['image']) ;
        return $this->userRepository->save($data) ;
    }
}
