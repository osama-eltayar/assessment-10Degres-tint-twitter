<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\User\CreateFollowerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFollowerController extends Controller
{
    public function store(User $user,CreateFollowerService $createFollowerService)
    {
        $createFollowerService->handle(['follower' => Auth::user() , 'user' => $user]) ;

        return response(['message' => 'followed successfully']);
    }
}
