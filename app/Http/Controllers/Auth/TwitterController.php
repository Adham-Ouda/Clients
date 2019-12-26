<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\User;
use Auth;

use Exception;

class TwitterController extends Controller
{
    /*public function redirectToTwitter($twitter)
    {
        return Socialite::driver($twitter)->redirect();
    }
 
    public function handleTwitterCallback($twitter)
    {
               
        $getInfo = Socialite::driver($twitter)->user();
         
        $user = $this->createUser($getInfo,$twitter);
 
        auth()->login($user);
 
        return redirect()->to('/home');
 
    }
   function createUser($getInfo,$twitter){
 
     $user = User::where('twitter_id', $getInfo->id)->first();
 
     if (!$user) {
         $user = User::create([
            'name'     => $getInfo->name,
            'email'    => $getInfo->email,
            'twitter' => $twitter,
            'twitter_id' => $getInfo->id
        ]);
      }
      return $user;
   } */

   public function redirectToTwitter() {

    	return Socialite::driver('twitter')->redirect();

    }

    public function handleTwitterCallback() {

    	try {

    

            $user = Socialite::driver('twitter')->user();

     		// dd($user);

            $finduser = User::where('twitter_id', $user->id)->first();

     		//dd($finduser);

            if($finduser){

     			//dd($finduser);

                Auth::login($finduser);

    

                return redirect('/home');

     

            }else{

                $newUser = User::create([

                    'name' => $user->name,

                    'email' => 'eng.adham@gmail.com', //add static email as twitter doesn't return the email for security reasons, need the app to be white listed on twitter. 

                    'twitter_id'=> $user->id,

                    'password' => encrypt('mad')

                ]);

    

                Auth::login($newUser);

     

                return redirect('/home');

            }

    

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    }
}
