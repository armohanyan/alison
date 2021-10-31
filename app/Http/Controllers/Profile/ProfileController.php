<?php

namespace App\Http\Controllers\Profile;
use Auth ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view('profile.index')->with('message', 'You are sign in succesfully') ; ;
    }

}
