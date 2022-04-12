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

Route::get('/', function (Request $request) {

    $currentFactors = Session::get('factor_list');
    error_log(json_encode($request->session()->get('factor_list')));
    if ($currentFactors) {
        error_log('new factor exists');
        return view('list_factors', ['factors' => $currentFactors]);
    }
    session(['factor_list' => (array) null]);
    error_log(json_encode($request->session()->get('factor_list')));
    return view('list_factors');
});

Route::get('/enroll_factor_details', function () {
    return view('enroll_factor');
});

Route::post('/enroll_factor', function(Request $request) {
    $phoneNumber = $request->input('phone_number');
    $factorType = $request->input('type');
    
    $newFactor = (new \WorkOS\MFA()) -> enrollFactor($factorType, null, null, $phoneNumber);
    error_log(gettype($newFactor));

    $currentFactorList = Session::get('factor_list');
    error_log(gettype($currentFactorList));

    array_push($currentFactorList, $newFactor);
    error_log(json_encode($currentFactorList));
    session(['factor_list' => $currentFactorList]);
    return redirect('/');
});

Route::get('/factor_detail', function (Request $request) {
    $factorId = $request->query('id');
    $currentFactorList = Session::get('factor_list');
    $currentFactor;
    foreach($currentFactorList as $factor) {
        if ($factorId == $factor->id) {
            $currentFactor = $factor;
            session(['current_factor' => $currentFactor]);
            break;
        }
    }
    error_log(json_encode($currentFactor));
    $phoneNumber = $currentFactor->sms['phone_number'];
    $created =  $currentFactor->environmentId;
    return view('factor_detail', [
        'factor' => $currentFactor, 
        'phone_number' => $phoneNumber,]);
});

Route::post('/challenge_factor', function (Request $request) {
    $smsMessage = $request->input('sms_message');
    $currentFactor = Session::get('current_factor');
    $factorId = $currentFactor->id;
    
    $challenge = (new \WorkOS\MFA()) -> challengeFactor($factorId, $smsMessage);
    error_log(json_encode($challenge));
    session(['current_challenge' => $challenge]);
    return view('challenge_factor', [
        'challenge' => $challenge
    ]);
});

Route::post('/verify_factor', function (Request $request) {
    $code = $request->input('code');
    $currentFactor = Session::get('current_factor');
    $currentChallenge = Session::get('current_challenge');
    $factorId = $currentChallenge->id;    
    
    $challenge = (new \WorkOS\MFA()) -> verifyFactor($factorId, $code);
    $challengeResult = $challenge->challenge;
    $id = $challengeResult['id'];
    $valid = json_encode($challenge->valid);


    error_log(json_encode($challengeResult['id']));
    error_log(json_encode($challenge));
    error_log(json_encode($valid));


    return view('challenge_result', [
        'valid' => $valid,
        'id' => $id,
        'challengeResult' => $challengeResult
    ]);
});




Route::get('/clear_session', function (Request $request) {
    $request->session()->flush();
    return redirect('/');
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