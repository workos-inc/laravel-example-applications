<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\WebhooksController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\DirectoryController;
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

Route::get('/', [DirectoryController::class, 'index'])->name('directory.index');

Route::get('directory', [DirectoryController::class, 'show'])->name('directory.show');

Route::get('/directory/{id}/users', [UsersController::class, 'index'])->name('users.index');

Route::get('/directory/{id}/groups', [GroupsController::class, 'index'])->name('groups.index');

Route::get('/webhooks', [WebhooksController::class, 'index'])->name('webhooks.index');

Route::post('/webhooks', [WebhooksController::class, 'store'])->name('webhooks.store');



