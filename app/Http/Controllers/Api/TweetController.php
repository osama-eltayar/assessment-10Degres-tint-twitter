<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TweetRequest;
use App\Http\Resources\TweetResource;
use App\Services\Tweet\CreateTweetService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    public function store(TweetRequest $tweetRequest,CreateTweetService $createTweetService)
    {
        $tweet = $createTweetService->handle(['user' => Auth::user() , 'tweet' => $tweetRequest->only('content')]) ;

        return new TweetResource($tweet) ;
    }
}
