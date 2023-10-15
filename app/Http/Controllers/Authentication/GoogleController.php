<?php

namespace App\Http\Controllers\Authentication;

use App\Models\User;
use App\Models\Account;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }


    public function Handlecallback(){
        $user = Socialite::driver('google')->user();
        $find = Account::where(['google_id' => $user->getId()])->first();

        if (is_null($find)) {
            $findUser = false;
        }else{
            $findUser = User::where(['id' => $find->id_user])->first();
        }

        if($findUser){
            Auth::login($findUser, true);
            return redirect()->intended('dashboard');
        }else{
            $uuid = Str::uuid();
            $email = $user->getEmail();
            $avatar = $user->getAvatar();
            $username = $email;
            $password = Hash::make($email);
            $google_id = $user->getId();

            $usermaster = User::create([
                'uuid'     => $uuid,
                'email'     => $email,
                'avatar'      => $avatar,
                'name' => $user->getName(),
                'username' => $username
            ]);

            $accountNew = Account::create([
                'uuid'     => $uuid,
                'google_id' => $google_id,
                'email' => $email,
                'username' => $username,
                'password'  => $password,
                'level'     => 1,
                'id_user' => $usermaster->id,
            ]);

            $account = User::where(['uuid' => $accountNew->uuid])->first();
            Auth::login($account, true);
            return redirect()->intended('dashboard');
        }
    }

}
