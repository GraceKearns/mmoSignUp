<?php

namespace App\Http\Controllers;

use App\Models\players; // Update model name to follow Laravel naming conventions
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;

class PlayerController extends Controller
{
    public function showForm()
    {
        return view('SignUp');
    }

    public function processForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6|same:confirm_password',
            'day' => 'required|numeric|between:1,31', 
            'month' => 'required|numeric|between:1,12', 
            'year' => 'required|numeric|digits:4', 
        ]);

        // Create and save a new user
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        // Create a new player
        $player = new players();
        $player->name = $request->input('name');
        $player->email = $request->input('email');
        $player->password = bcrypt($request->input('password'));

        // Link player to the newly created user
        $user->player()->save($player);
        Auth::login($user);

        if (Auth::check()) {
            return redirect()->to('/');
        } else {

            return back()->with('error', 'Failed to create player. Please try again.');
        }

        return redirect()->to('/');
        // if ($player->save()) {
        //     $user->player()->save($player);
        //     Auth::login($user); // Log in the newly created player
        //     return redirect()->to('/HomePage');
        // } 
    }
    public function showFormSignIn()
    {
        return view('SignIn');
    }
    public function processSignIn()
    {
    }
    public function signOut()
    {
        Auth::logout(); // Invalidate the current user's session
        if (!auth()->check() && Session::has('user_logged_in')) {
            Session::forget('user_logged_in');
            $activeUsersCount = Cache::get('active_users_count', 0);
            $activeUsersCount--;
            Cache::put('active_users_count', $activeUsersCount);
        }

        return redirect('/'); // Redirect to homepage or any specific route
    }
}
