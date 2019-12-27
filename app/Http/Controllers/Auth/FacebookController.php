<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Socialite;

use Auth;

use Exception;

use App\User;


class FacebookController extends Controller
{
    public function redirectToFacebook() {

    	return Socialite::driver('facebook')->redirect();

    }

    public function handleFacebookCallback() {

    	try {

    

            $user = Socialite::driver('facebook')->user();

     		// dd($user);

            $finduser = User::where('facebook_id', $user->id)->first();

     		//dd($finduser);

            if($finduser){

     			//dd($finduser);

                Auth::login($finduser);

    

                return redirect('/home');

     

            }else{

                $newUser = User::create([

                    'name' => $user->name,

                    'email' => $user->email,

                    'facebook_id'=> $user->id,

                    'password' => encrypt('mad')

                ]);

    

                Auth::login($newUser);

     

                return redirect('/home');

            }

    

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    	/*try {

            $user = Socialite::driver('facebook')->user();

            $create['name'] = $user->getName();

            $create['email'] = $user->getEmail();

            $create['facebook_id'] = $user->getId();


            $userModel = new User;

            $createdUser = $userModel->addNew($create);

            Auth::loginUsingId($createdUser->id);


            return redirect()->route('home');


        } catch (Exception $e) {


            return redirect('auth/facebook');


        } */

    }
}
