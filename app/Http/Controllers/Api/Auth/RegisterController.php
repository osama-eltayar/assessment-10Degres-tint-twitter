<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\TokenResource;
use App\Http\Resources\UserResource;
use App\Services\Auth\RegisterUserService;
use App\Traits\HasFiles;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use HasFiles;

    public function register(RegisterRequest $registerRequest,RegisterUserService $registerUserService)
    {
        $user = $registerUserService->handle($registerRequest->only('name', 'email', 'password', 'date_of_birth','image') ) ;

        return response(['user'=>new UserResource($user), 'token'=>new TokenResource($user->createToken('web'))]);
    }
}
