<?php

namespace App\Http\Controllers\SocialAuthentication;

use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\User;

class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFB()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('social_id', $user->id)->first();

            if( $finduser ){

                Auth::login($finduser);

                return redirect()->route('home');

            }
            else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'social_type'=> 'facebook',
                    'password' => encrypt('my-facebook')
                ]);

                Auth::login($newUser);

                return redirect()->route('home');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
