<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\BoardController;

use App\Services\UserService;
use App\Services\DocumentService;
use App\Services\ProjectService;
use App\Services\NotificationService;
use App\Services\BoardService;

use App\Models\Document;
use App\Models\Card;


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

/*
|--------------------------------------------------------------------------
| Documents Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('documents');
});

Route::get('/documents', function () {
    return view('documents');
});

Route::get('/createDocument', function () {
    return view('createDocument');
});

Route::post(
    '/createDocumentService',
    [DocumentController::class, 'createDocument']
)->name('createDocumentService');

Route::delete(
    '/deleteDocument',
    [DocumentController::class, 'deleteDocument']
)->name('deleteDocument');

Route::match(
    ['get', 'post'],
    '/openDocument',
    [DocumentController::class, 'openDocument']
)->name('openDocument');

Route::get('/editDocument/{id}', function ($id) {
    return view('editDocument');
});

Route::put('/editDocumentService',
    [DocumentController::class, 'editDocument']
)->name('editDocumentService');

/*
|--------------------------------------------------------------------------
| Projects Routes
|--------------------------------------------------------------------------
*/

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/createProject', function () {
    return view('createProject');
});

Route::post(
    '/createProjectService',
    [ProjectController::class, 'createProject']
)->name('createProjectService');

Route::delete(
    '/deleteProject',
    [ProjectController::class, 'deleteProject']
)->name('deleteProject');

Route::put(
    '/selectProject',
    [ProjectController::class, 'selectProject']
)->name('selectProject');

Route::put(
    '/unselectProject',
    [ProjectController::class, 'unselectProject']
)->name('unselectProject');

Route::get('/projectPage/{id}', function () {
    return view('projectPage');
})->name('projectPage');

Route::get(
    '/selectAndOpenProjectPage/{id}',
    [ProjectController::class, 'selectAndOpenProject']
)->name('selectAndOpenProjectPage');

Route::get('/addUserToProject', function () {
    return view('addUserToProject');
});

Route::post(
    '/addUserToProjectService',
    [ProjectController::class, 'addUserToProject']
)->name('addUserToProjectService');

Route::get(
    '/editProject/{id}', function () {
        return view('editProject');
    }
)->name('editProject');

Route::put('/editProjectService',
    [ProjectController::class, 'editProject']
)->name('editProjectService');
/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/

Route::get('/signUp', function () {
    return view('signUp');
});

Route::match(
    ['get', 'post'],
    '/signUpService',
    [UserController::class, 'signUp']
)->name('signUp');

Route::get('/signIn', function () {
    return view('signIn');
});

Route::match(
    ['get', 'post'],
    '/signInService',
    [UserController::class, 'signIn']
)->name('signIn');

Route::match(
    ['get', 'post'],
    '/logOut',
    [UserController::class, 'logOut']
)->name('logOut');

/*
|--------------------------------------------------------------------------
| Boards Routes
|--------------------------------------------------------------------------
*/

Route::get('/board', function () {
    return view('board');
});

Route::get('/createCard/{category}', function ($category) {
    return view('createCard');
});

Route::post(
    '/createCardService',
    [BoardController::class, 'createCard']
)->name('createCard');

Route::match(
    ['get', 'post'],
    '/saveCards',
    [BoardController::class, 'saveCards']
)->name('saveCards');

Route::get(
    '/assignUser/{id}',
    [BoardController::class, 'assignUser']
)->name('assignUser');

Route::delete(
    '/deleteCard',
    [BoardController::class, 'deleteCard']
)->name('deleteCard');

Route::get(
    '/editCard/{id}', function ($id) {
    return view('editCard');
    }
)->name('editCard');

Route::put(
    '/editCardService',
    [BoardController::class, 'editCard']
)->name('editCardService');

Route::delete(
    '/deleteAssign',
    [BoardController::class, 'deleteAssign']
)->name('deleteAssign');

/*
|--------------------------------------------------------------------------
| Reports Routes
|--------------------------------------------------------------------------
*/

Route::get('/reports', function () {
    return view('reports');
});

Route::get('/createReport', function () {
    return view('createReport');
});

/*
|--------------------------------------------------------------------------
| Notification Routes
|--------------------------------------------------------------------------
*/

Route::match(
    ['get', 'post'],
    '/readNotification',
    [NotificationController::class, 'readNotification']
)->name('readNotification');

/*
|--------------------------------------------------------------------------
| Socials Routes
|--------------------------------------------------------------------------
*/

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);

Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);

Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
