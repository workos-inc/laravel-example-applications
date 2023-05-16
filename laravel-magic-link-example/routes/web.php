<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $profile = Session::get('profile');
    return view('generate', ['profile' => $profile]);
});

Route::post('/passwordless_auth', function(Request $request) {
    $email = $request->input('email');

    $passwordless = new \WorkOS\Passwordless();

    $session = $passwordless->createSession(
        $email,
        null,
        null,
        \WorkOS\Resource\ConnectionType::MagicLink,
        null,
        null
    );

    $passwordless->sendSession($session);

    return view('generate-magic-link-success', ['email' => $email, 'link' => $session->link]);
});

Route::get('/callback', function(Request $request) {
    $code = $request->input("code");

    $profileAndToken = (new \WorkOS\SSO())->getProfileAndToken($code);

    $profile = $profileAndToken->profile;
    $profile = json_encode($profile);

    return view('auth-success', ['profile' => $profile]);
});