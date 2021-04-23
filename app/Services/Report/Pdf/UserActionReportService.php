<?php


namespace App\Services\Report\Pdf;



use App\Repositories\Interfaces\TweetRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use PDF;
use App\Services\ServiceInterface;

class UserActionReportService implements ServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;
    /**
     * @var TweetRepositoryInterface
     */
    private $tweetRepository;

    public function __construct(UserRepositoryInterface $userRepository, TweetRepositoryInterface $tweetRepository)
    {

        $this->userRepository=$userRepository;
        $this->tweetRepository=$tweetRepository;
    }

    public function handle($data = null)
    {
        $users = $this->userRepository->getAll() ;

        $countUsers = $this->userRepository->countAll() ;
        $tweetsAvg = $countUsers > 0 ? round( $this->tweetRepository->countAll() /  $countUsers , 2) : 0 ;

        return PDF::loadView('pdf.user-actions', compact('users','tweetsAvg'));
    }
}
