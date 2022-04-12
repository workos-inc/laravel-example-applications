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
    if ($currentFactors) {

        return view('list_factors', ['factors' => $currentFactors]);
    }
    session(['factor_list' => (array) null]);
    $currentFactors = Session::get('factor_list');
    return view('list_factors', ['factors' => $currentFactors]);
});

Route::get('/enroll_factor_details', function () {
    return view('enroll_factor');
});

Route::post('/enroll_factor', function(Request $request) {    
    $factorType = $request->input('type');

    if ($factorType == 'sms' ) {
        $phoneNumber = $request->input('phone_number');
        $newFactor = (new \WorkOS\MFA()) -> enrollFactor($factorType, null, null, $phoneNumber);
        $currentFactorList = Session::get('factor_list');
        array_push($currentFactorList, $newFactor);
        session(['factor_list' => $currentFactorList]);
    }
    
    if ($factorType == 'totp' ) {
        $totpIssuer = $request->input('totp_issuer');
        $totpUser = $request->input('totp_user');
        $newFactor = (new \WorkOS\MFA()) -> enrollFactor($factorType, $totpIssuer, $totpUser, null);
        error_log(gettype(json_encode($newFactor)));
        $currentFactorList = Session::get('factor_list');
        array_push($currentFactorList, $newFactor);
        session(['factor_list' => $currentFactorList]);
        }

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
    if ($currentFactor->type == 'sms') {
        $phoneNumber = $currentFactor->sms['phone_number'];
        return view('factor_detail', [
            'factor' => $currentFactor, 
            'phone_number' => $phoneNumber]);
    }
    
    if ($currentFactor->type == 'totp') {
        $qrCode = $currentFactor->totp['qr_code'];
        return view('factor_detail', [
            'factor' => $currentFactor, 
            'qrCode' => $qrCode]);
    }
    
});

Route::post('/challenge_factor', function (Request $request) {
    $currentFactor = Session::get('current_factor');
    $factorId = $currentFactor->id;

    if ($currentFactor->type == 'sms') {
        $smsMessage = $request->input('sms_message');
        $challenge = (new \WorkOS\MFA()) -> challengeFactor($factorId, $smsMessage);
        session(['current_challenge' => $challenge]);
        return view('challenge_factor', [
            'challenge' => $challenge
        ]);
    }
    
    if ($currentFactor->type == 'totp') {
        $challenge = (new \WorkOS\MFA()) -> challengeFactor($factorId, null);
        session(['current_challenge' => $challenge]);
        return view('challenge_factor', [
            'challenge' => $challenge
        ]);
    }
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
