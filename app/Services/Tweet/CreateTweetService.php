<?php


namespace App\Services\Tweet;


use App\Repositories\Interfaces\TweetRepositoryInterface;
use App\Services\ServiceInterface;

class CreateTweetService implements ServiceInterface
{
    /**
     * @var TweetRepositoryInterface
     */
    private $tweetRepository;

    public function __construct(TweetRepositoryInterface $tweetRepository)
    {

        $this->tweetRepository=$tweetRepository;
    }

    public function handle($data)
    {
        return $this->tweetRepository->saveForUser($data['tweet'] , $data['user']) ;
    }
}
