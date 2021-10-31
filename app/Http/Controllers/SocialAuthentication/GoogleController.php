<?php

namespace App\Http\Controllers\SocialAuthentication;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function callback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if( $finduser ){

                Auth::login( $finduser );

                return redirect()->route('home');

            }
            else{
                $newUser = User::create([
                    'first_name' => $user->offsetGet('given_name'),
                    'surname' => $user->offsetGet('family_name'),
                    'email' => $user->offsetGet('email'),
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);

                Auth::login( $newUser );

                return redirect()->route('home');
            }

        }
        catch ( Exception $e ) {
            dd($e) ;
            dd($e->getMessage());
        }
    }
}
