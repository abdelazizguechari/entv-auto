<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Throwable;


// class googleauth extends Controller
// {
//     public function redirect() {
//         return Socialite::driver('google')->redirect();
//     }
    
//     public function callback() {
//         try {
//             $google_user = Socialite::driver('google')->stateless()->user();
//             $user = User::where('google_id', $google_user->getId())->first();
    
//             if (!$user) {
//                 $new_user = User::create([
//                     'name' => $google_user->getName(),
//                     'email' => $google_user->getEmail(),
//                     'google_id' => $google_user->getId(),
//                 ]);
    
//                 Auth::login($new_user);
//                 return redirect()->intended('admin/dashboard');
//             } else {
//                 Auth::login($user);
//                 return redirect()->intended('admin/dashboard');
//             }
    
//         } catch (\Throwable $th) {
//             dd('Something went wrong: ' . $th->getMessage());
//         }
//     }
//     }

