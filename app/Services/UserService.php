<?php

namespace App\Services;

use App\Http\Requests\SignUpRequest;
use App\Models\User;
use App\Http\Requests\SignInRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class UserService
{
    /**
     * Sign in new user
     *
     * @param SignInRequest $request
     */
    public static function signIn(Request $request): bool
    {
        $place = DB::table('places')
                    ->where('name', $request['place'])
                    ->first();

        DB::table('users')->insert([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'email' => $request['email'],
            'password' => $request['password'],
            'place_id' =>$place->id,
            'role' => $request['role'],
        ]);
        header("Location: /signUp");

        return true;
    }

    /**
     * Sign up user
     *
     * @param SignUpRequest $request
     */
    public static function signUp(SignUpRequest $request): bool
    {
        $userData = DB::table('users')
            ->where('email', '=', $request['email'])
            ->where('password', '=', $request['password'])
            ->first();
        if (is_object($userData)) {
            session()->put('userId', $userData->id);
            header("Location: /analytics");
            return true;
        }
        header("Location: /signUp");
        return true;
    }

    /**
     * Return is user authorize or not
     *
     * @return bool
     */
    public static function isAuth(): bool
    {
        if(session()->get('userId') !== null) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Log out user
     */
    public static function logOut(): bool
    {
        session()->pull('userId');
        header("Location: /");
        return true;
    }

    /**
     * Return user that authorised now
     *
     * @return mixed
     */
    public static function getUserBySession()
    {
        return User::find(session()->get("userId"));
    }
}
