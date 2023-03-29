<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use WorkOS\DirectorySync;
use Carbon\Carbon;
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
    Session::flush();
    if ($request) {
        $before = $request->input('before');
        $after = $request->input('after');
    }
    $listOrganizations = new WorkOS\Organizations();
    [$before, $after, $organizations] = $listOrganizations->listOrganizations(
        limit: 5,
        before: $before,
        after: $after,
        order: null
    );
    return view('landing-page', ['organizations' => $organizations, 'after' => $after, 'before' => $before]);
});


Route::get('/set_org', function(Request $request) {
    $organizationId = $request->input('organization_id');
    $organization = (new \WorkOS\Organizations()) -> getOrganization($organizationId);
    return view('send-events', ['organization' => $organization, ]);
});


Route::post('/send_events', function(Request $request) {
    $version = $request->input('event_version');
    $actorName = $request->input('actor_name');
    $actorType = $request->input('actor_type');
    $targetName = $request->input('target_name');
    $targetType = $request->input('target_type');
    $organizationId = $request->input('organization_id');
    $event = [ 
        "action" => "user.organization_deleted",
        "occurred_at" => date("c"),
        "version" => (int)$version,
        "actor" => [
            "id" => "user_01GBNJC3MX9ZZJW1FSTF4C5938",
            "name" => $actorName,
            "type" => $actorType,
        ],
        "targets" => [
            [
                "id" => "team_01GBNJD4MKHVKJGEWK42JNMBGS",
                "name" => $targetName,
                "type" => $targetType,
            ],
        ],
        "context" => [
            "location" => "123.123.123.123",
            "user_agent" => "Chrome/104.0.0.0",
        ],
    ];

    $auditLogsEvent = (new \WorkOS\AuditLogs()) -> createEvent(
        organizationId: $organizationId,
        event: $event
    );
    return redirect('/set_org?organization_id='.$organizationId)->with('message', 'Message Sent');  

});


Route::post('get_events', function(Request $request) {
    $organizationId = $request->input('organization_id');
    $event = $request->input('event');
    $rangeEnd = $request->input('range_end');
    $rangeStart = $request->input('range_start');

    if($event === "generate_csv"){
        $createExport = (new \WorkOS\AuditLogs()) -> createExport(
            organizationId: $organizationId,
            rangeStart: $rangeStart,
            rangeEnd: $rangeEnd
        );
        session(['createExport' => $createExport]);
        return redirect('/set_org?organization_id='.$organizationId)->with('message', 'Log Export Generated');  

    } 
    
    if($event === "access_csv"){
        $fetchExport = (new \WorkOS\AuditLogs()) -> getExport(
            strval(Session::get('createExport')->id)
        );
        Session::flash('message', "CSV is downloading");
        return redirect($fetchExport -> url);
    }

});

Route::get('/events', function(Request $request) {   
    $organizationId = $request->input('organization_id');
    $intent = $request->input('intent');
    $portal = new WorkOS\Portal();
    $portalLink = $portal->generateLink(
        organization: $organizationId,
        intent: $intent);
    $portalLink = $portalLink -> toArray();
    return redirect($portalLink["link"]);

});