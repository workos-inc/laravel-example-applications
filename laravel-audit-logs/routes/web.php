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
    return view('landing-page');
});


/* When calling Get Authorization URL, you can use connection ID to associate users to the appropriate connection instead of domain */
Route::post('/organization', function(Request $request) {
    try {
        $organization = (new \WorkOS\Organizations()) -> getOrganization(
            $request->input('orgID')
        );
        session(['organization' => $organization]);
        return view('send-events', ['organization' => $organization]);
    } catch (\Exception $e){
        Session::flash('message', 'ERROR:' . $e->getMessage());
        return redirect()->to('/')->with('data', $e->getMessage());;
    }
});

Route::post('/send_event', function(Request $request) {
    include '../app/includes/audit_log_events.php';
    $organization = Session::get('organization');
    $eventId = $request->input('event');

    if($eventId === '0'){
        $event = $user_signed_in;
    } else if($eventId === '1'){
        $event = $user_logged_out;
    } else if($eventId === '2'){
        $event = $user_organization_deleted;
    } else if($eventId === '3'){
        $event = $user_connection_deleted;
    }

    $auditLogs = new WorkOS\AuditLogs();
    $auditLogs->createEvent(
        organizationId: $request->input('orgID'),
        event: $event,
    );
     return redirect('/organization');
});

Route::get('/organization', function() {   
    $organization = Session::get('organization');
    Session::flash('message', "Event Sent");
    return view('send-events', ['organization' => $organization]);
});

Route::get('export_events', function() {
    $organization = Session::get('organization');

    return view('export-events', ['organization' => $organization]);
});

Route::get('/logout', function() {
    $organization = Session::get('organization');
    Session::forget('key');
    return redirect ('/');
});

Route::post('get_events', function(Request $request){
    $requestType = $request->input('event');
    $organization = Session::get('organization');
    if ($requestType == 'generate_csv'){
        $createExport = (new \WorkOS\AuditLogs()) -> createExport(
            organizationId: $organization->id,
            rangeStart: (new \DateTime('-1 month',new \DateTimeZone("UTC")))->format(\DateTime::ATOM),
            rangeEnd: (new \DateTime('now',new \DateTimeZone("UTC")))->format(\DateTime::ATOM)
        );
        session(['createExport' => $createExport]);
        Session::flash('message', "CSV is generated");
        return redirect('/export_events');
    }
    else if ($requestType == 'access_csv' && Session::get('createExport')) {
        $fetchExport = (new \WorkOS\AuditLogs()) -> getExport(
            strval(Session::get('createExport')->id)
        );
        Session::flash('message', "CSV is downloading");
        return redirect($fetchExport -> url);
    }
    else {
        Session::flash('message', "Please generate a CSV first");
        return redirect('/export_events');
    }

});