<?php
use Illuminate\Http\Request;

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
    return view('login', ['profile' => $profile]);
});


/* When calling Get Authorization URL, you can use connection ID to associate users to the appropriate connection instead of domain */
Route::get('/auth', function() {
    $connection = env('WORKOS_CONN_ID');
    $redirectUri = env('WORKOS_REDIRECT_URI');// ... The URI WorkOS should callback to post-authentication

    $authorizationUrl = (new \WorkOS\SSO())
        ->getAuthorizationUrl(
            null,
            $redirectUri,
            null,
            null,
            $connection
        );
    return redirect($authorizationUrl);
});

Route::get('auth/callback', function(Request $request) {
    $code = $request->input("code");
    // $profile = (new \WorkOS\SSO())->getProfileAndToken($code);
    $profileAndToken = (new \WorkOS\SSO())->getProfileAndToken($code);

    // Use the information in `profile` for further business logic.
    $profile = $profileAndToken->profile;
    session(['profile' => $profile]);

    return view('login', ['profile' => $profile]);
});

Route::get('/logout', function () {
    session()->forget('profile');
    return view('login', ['profile' => NULL]);
});