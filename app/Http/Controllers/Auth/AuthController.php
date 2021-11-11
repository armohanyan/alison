<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signUp(Request $request){

        $validation = array(
            'firstname' => 'required|max:50',
            'surname' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'signUpCondition' => 'accepted' ,
        );

        $validator = Validator::make($request->all(), $validation);

        if ( $validator->fails() ){
            return response()->json([
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray(),
            ], 200);
        }

        else{
            $newUser = User::create([
                'first_name' => $request->input('firstname'),
                'surname' => $request->input('surname'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password'))
            ]);

            Auth::login($newUser);

            return response()->json(['success' => true], 200);
        }
    }

    public function SignIn(Request $request){

        $validation = Array(
            'email' => 'required',
            'password' => 'required',
        );

        $validator = Validator::make($request->all(), $validation);

        if( $validator->fails() ){
                return response()->json([
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray(),
                ], 200);
        }

        else{
            $credentials = $request->only('email', 'password');
            if (  ! Auth::attempt($credentials) ) {
                return response()->json([
                    'success' => false,
                    'invalid' => 'Invalid Login or Password',
                ], 200);
            }
            else{
                return response()->json(['success' => true], 200);
            }
        }
    }

    public function checkUserAuth(){
        return response()->json([
            'user' => Auth::user()
        ]);
    }

    public function signOut(){
        Auth::logout();
        return redirect()->back() ;
    }
}
