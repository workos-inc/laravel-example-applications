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


/* When calling Get Authorization URL, you can use connection ID to associate users to the appropriate connection instead of domain */


Route::get('/callback', function(Request $request) {
    $code = $request->input("code");
    // $profile = (new \WorkOS\SSO())->getProfileAndToken($code);
    $profileAndToken = (new \WorkOS\SSO())->getProfileAndToken($code);

    // Use the information in `profile` for further business logic.
    $profile = $profileAndToken->profile;
    $profile = json_encode($profile);

    return view('auth-success', ['profile' => $profile]);
});



Route::post('/passwordless', function(Request $request) {
    // Email of the user to authenticate
    $email = $request->input('email');

    $passwordless = new \WorkOS\Passwordless();

    // Generate a session for passwordless
    $session = $passwordless->createSession(
        $email,
        null,
        null,
        \WorkOS\Resource\ConnectionType::MagicLink,
        null,
        null
    );

    // Send an email to the user via WorkOS with the link to authenticate
    $passwordless->sendSession($session);

    return view('success', ['email' => $email]);
    // Finally, redirect to a "Check your email" page
});