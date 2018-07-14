<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
//use Laravel\Socialite\Facades\Socialite;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/currencies';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider() {
        return Socialite::driver('github')->redirect();
    }
    public function handleProviderCallback()
    {

        // Get a github user info
        $socialUser = Socialite::driver('github')->user();
        // Search in database
        $user = User::where(['email' => $socialUser->email])->first();
        // Create if not found
        if (is_null($user)) {
            $user = User::create([
                'name' => $socialUser->user['login'],
                'email' => $socialUser->email,
                'password' => str_random(10)
            ]);
        }
        Auth::login($user);
        return redirect($this->redirectTo);
    }
}
