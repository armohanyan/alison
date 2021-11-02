<?php

namespace App\Http\Controllers\SocialAuthentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LinkedinController extends Controller
{
    public function redirect () {

        return  Socialite::driver('linkedin')->redirect() ;

    }

    public function callback(){

        try{

            $user = Socialite::driver('linkedin')
                ->fields(['first_name', 'last_name', 'email'])
                ->user();

            $existUser = User::where( 'email', $user-email )->first();

            if ( $existUser ) {

                Auth::login($existUser);

            }

            else{

                User::create([
                    'linkedin_id' => $user->id,
                    'first_name' => $user->first_name,
                    'surname' => $user->last_name,
                    'email' => $user->email ,
                    'password' => encrypt('123456dummy')
                ]) ;

                Auth::login( $user );
            }

            return redirect()->route('home') ;

        }

        catch ( Exception $e ){
                return   dd($e->getMessage());
        }

    }


}
