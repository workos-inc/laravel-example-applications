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
    $profileString = json_encode($profile, JSON_PRETTY_PRINT);
    return view('login', ['profile' => $profile, 'profileString' => $profileString]);
});


/* When calling Get Authorization URL, you can use organization ID to associate users to the appropriate connection */
Route::post('/auth', function() {
    $organization = env('WORKOS_ORGANIZATION_ID');
    $redirectUri = env('WORKOS_REDIRECT_URI');// ... The URI WorkOS should callback to post-authentication

    $loginType = $_POST['login_method'];

        // Set the organization or provider based on the login type
        if ($loginType == "saml") {
            $authorizationUrl = (new \WorkOS\SSO())
            ->getAuthorizationUrl(
                null, //domain is deprecated, use organization instead
                $redirectUri, //redirectURI
                [], //state array, also empty
                null, //Provider which can remain null unless being used
                null, //Connection which is the WorkOS Organization ID,
                $organization //organization ID, to identify connection based on organization ID,
            );
        } else {
            $authorizationUrl = (new \WorkOS\SSO())
            ->getAuthorizationUrl(
                null, //domain is deprecated, use organization instead
                $redirectUri, //redirectURI
                null, //state array, also empty
                $loginType, //Provider which can remain null unless being used
            );
        }

    return redirect($authorizationUrl);
});

Route::get('auth/callback', function(Request $request) {
    $code = $request->input("code");
    // $profile = (new \WorkOS\SSO())->getProfileAndToken($code);
    $profileAndToken = (new \WorkOS\SSO())->getProfileAndToken($code);

    // Use the information in `profile` for further business logic.
    $profile = $profileAndToken->profile;
    session(['profile' => $profile]);

    $profileString = json_encode($profile, JSON_PRETTY_PRINT);

    return view('login', ['profile' => $profile, 'profileString' => $profileString]);
});

Route::get('/logout', function () {
    session()->forget('profile');
    return view('login', ['profile' => NULL]);
});
