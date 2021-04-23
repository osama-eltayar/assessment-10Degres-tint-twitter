<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\TokenResource;
use App\Http\Resources\UserResource;
use App\Services\Auth\LoginUserService;
use App\Traits\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use ThrottlesLogins;
    public $decayMinutes = 30 ;

    public function login(LoginRequest $loginRequest , LoginUserService $loginUserService)
    {
        $this->checkMaximumAttempts($loginRequest) ;

        $user = $loginUserService->handle($loginRequest->only('email','password')) ;

        if (!$user)
        {
            $this->incrementLoginAttempts($loginRequest);
            throw ValidationException::withMessages(['email'=>'the credentials is invalid']);
        }

        $this->clearLoginAttempts($loginRequest);
        return response(['user'=>new UserResource($user), 'token'=>new TokenResource($user->createToken('web'))]);
    }

    protected function checkMaximumAttempts($request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutResponse($request);
        }
    }

}
