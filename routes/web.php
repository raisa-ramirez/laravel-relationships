<?php

use App\Models\User;
use App\Models\Level;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $users = User::get();
    return view('welcome', ['users' => $users]);
})->name('home');

Route::get('/profile/{id}', function($id){
    $user = User::find($id);
    $posts = $user->posts()->with('category','tags','image')->withCount('comments')->get();
    $videos = $user->videos()->with('category','tags','image')->withCount('comments')->get();
    
    return view('profile', [
        'user' => $user,
        'posts' => $posts,
        'videos' => $videos
    ]);
})->name('profile');

Route::get('level/{id}', function ($id) {
    $level = Level::find($id);
    $posts = $level->posts()->with('category','tags','image')->withCount('comments')->get();
    $videos = $level->videos()->with('category','tags','image')->withCount('comments')->get();

    return view('level',[
        'level' => $level,
        'posts' => $posts,
        'videos' => $videos
    ]);
})->name('level');
