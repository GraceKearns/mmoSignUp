<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Models\players;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Password;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $latestPlayers = players::latest()->limit(5)->get();
    return view('HomePage', [
        'heading' => 'Latest listings',
        'items' => [
            "High-Scores" => [
                "Name" => "High-Score",
                "Img-Ref" => "../img/leaderboard.png",
                "Route" => "/HighScore",
            ],
            "Account-Management" => [
                "Name" => "Account Management",
                "Img-Ref" => "../img/manage.png",
                "Route" => "/AccountManagement",
            ],
            "Change Password" => [
                "Name" => "Change Password",
                "Img-Ref" => "../img/password.png",
                "Route" => "/ChangePassword",
            ],
            "Ask a question" => [
                "Name" => "Ask a Question",
                "Img-Ref" => "../img//question.png",
                "Route" => "/Ask",
            ],
            "Submit a bug" => [
                "Name" => "Submit a bug",
                "Img-Ref" => "../img/bug.png",
                "Route" => "/SubmitBug",
            ],
            "Forums" => [
                "Name" => "Forums",
                "Img-Ref" => "../img/forums.png",
                "Route" => "/Forums",
            ],

        ],
        'players' => $latestPlayers
    ]);
});

Route::get('/listings/{id}', function ($id) {
    return view('listing', [
        'heading' => 'Latest listings',
        'listing' => Listing::find($id)
    ]);
});

Route::group(['middleware' => 'web'], function () {
    Route::get('/SignUp', [PlayerController::class, 'showForm']);
    Route::Post('/SignUp', [PlayerController::class, 'processForm']);
    Route::get('/SignIn', [PlayerController::class, 'showFormSignIn']);
    Route::get('/SignOut', [PlayerController::class, 'signOut']);
    Route::Post('/SignIn', [PlayerController::class, 'processSignIn']);
    Route::Post('/SendMail', [PlayerController::class, 'showChangePassword']);
    Route::Get('/ChangePassword',function() {
        return view("ChangePassword");
    });
    Route::Get('/ChangePassword/{token}',function($token) {
        return view("ForgetPassword",["token" => $token]);
    });
    Route::Post('/ResetPassword',[PlayerController::class,'resetPassword']);
    Route::Post('/ChangePassword',[PlayerController::class,'changePassword']);
    
});

Route::get('/Ask', function() {
    return view('Ask');
});
Route::get('/HighScore', function() {
    $topPlayers = players::select('name', 'score')
    ->orderBy('score', 'desc')
    ->limit(50)
    ->get();
    return view('Hiscores',[
        "players"=> $topPlayers
    ]);
});

Route::get('/SubmitBug', function() {
    return view('SubmitBug');
});

Route::get('/hello', function () {
    return response("hello");
});
