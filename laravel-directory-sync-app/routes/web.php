<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\WebhooksController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GroupsController;

use WorkOS\DirectorySync;




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
    $before = request()->query('before');
    $after = request()->query('after');
    $this->ds = new DirectorySync();

    list($before, $after, $directories) = $this->ds->listDirectories(limit: 5, before: $before, after: $after);

    $before = $before;
    $after = $after;

    return view('index', ['directories' => $directories, 'after' => $after, 'before' => $before]);
});

Route::get('/directory', function () {
    $this->ds = new DirectorySync();
    list($before, $after, $directories) = $this->ds->listDirectories();

    $directory = collect($directories)->firstWhere('id', request()->query('id'));

    return view('directory', [
        'directory' => $directory
    ]);
});

Route::get('/directory/{id}/users', [UsersController::class, 'index'])->name('users.index');

Route::get('/directory/{id}/groups', [GroupsController::class, 'index'])->name('groups.index');

Route::get('/webhooks', [WebhooksController::class, 'index'])->name('webhooks.index');

Route::post('/webhooks', [WebhooksController::class, 'store'])->name('webhooks.store');



