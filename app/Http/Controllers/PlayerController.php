<?php

namespace App\Http\Controllers;

use App\Models\players; // Update model name to follow Laravel naming conventions
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use Carbon\Carbon;

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
    public function processSignIn(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        } else {
            // Authentication failed...
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
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
    public function changePassword(Request $request)
    {

        try {
            $request->validate([
                'email' => 'required|email|exists:users,email',
            ]);

            $token = Str::random(64);

            DB::beginTransaction();

            // Store the token in the database
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            // Send the password reset link via email
            Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
                $message->to($request->email)->subject('Reset Password');
            });

            DB::commit();

            return back()->with('message', 'We have e-mailed your password reset link!');
        } catch (\Exception $e) {
            DB::rollback();
            // Log the error or handle it as needed
            return redirect('/')->with('error', 'Oops! Something went wrong. Please try again later.');
        }
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect('/SignIn')->with('message', 'Your password has been changed!');
    }
}
