<?php

use App\Http\Controllers\DeleteController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UpdateController;

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

// Route::get('/', function () {
//     return Inertia::render('MainPage/Show', [
//     ]);
// });

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/testmail', [MainController::class, 'testmail'])->name('testmail');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    // Pages
    Route::get('/edit-site', [MainController::class, 'editSite'])->name('site.edit');
    Route::get('/messages', [MainController::class, 'messages'])->name('messages');
    Route::get('/all-projects', [MainController::class, 'allProjects'])->name('all.projects');
    // Info
    Route::post('/edit-info', [UpdateController::class, 'Info'])->name('info.edit');
    // Skill
    Route::post('/stack{stack}/edit', [UpdateController::class, 'Stack'])->name('stack.edit');
    Route::post('/create-stack', [UpdateController::class, 'Stack'])->name('stack.create');
    // Project
    Route::post('project/{project}/edit', [UpdateController::class, 'Project'])->name('project.edit');
    Route::post('/create-project', [UpdateController::class, 'Project'])->name('project.create');
    // Experience
    Route::post('experience/{experience}/edit', [UpdateController::class, 'Experience'])->name('experience.edit');
    Route::post('/create-experience', [UpdateController::class, 'Experience'])->name('experience.create');
    // Certification
    Route::post('certification/{certification}/edit', [UpdateController::class, 'Certification'])->name('certification.edit');
    Route::post('/create-certification', [UpdateController::class, 'Certification'])->name('certification.create');
    // Social
    Route::post('social/{social}/edit', [UpdateController::class, 'Social'])->name('social.edit');
    Route::post('/create-social', [UpdateController::class, 'Social'])->name('social.create');
    // Message
    Route::post('/message/{message}', [MessageController::class, 'show'])->name('message.show');
    Route::post('/send-message', [MessageController::class, 'sendMessage'])->name('message.send');
    Route::post('/reply-message', [MessageController::class, 'replyMessage'])->name('message.reply');
    Route::post('/delete-message', [MessageController::class, 'deleteMessage'])->name('message.delete');
    // Delete
    Route::post('/delete/project/{project}', [DeleteController::class, 'Project'])->name('project.delete');
    Route::post('/delete/skill/{skill}', [DeleteController::class, 'Skill'])->name('skill.delete');
    Route::post('/delete/certification/{certification}', [DeleteController::class, 'Certification'])->name('certification.delete');
    Route::post('/delete/experience/{experience}', [DeleteController::class, 'Experience'])->name('experience.delete');
    Route::post('/delete/social/{social}', [DeleteController::class, 'Social'])->name('social.delete');
});
