<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){
        $users = User::get();

        return view('welcome', [
            'users' => $users
        ]);
    }

    public function profile($userId){
        $user = User::find($userId);
        $posts = $user->posts()->with('category','tags','image')->withCount('comments')->get();
        $videos = $user->videos()->with('category','tags','image')->withCount('comments')->get();
        
        return view('profile', [
            'user' => $user,
            'posts' => $posts,
            'videos' => $videos
        ]);
    }

    public function level($levelId){
        $level = Level::find($levelId);
        $posts = $level->posts()->with('category','tags','image')->withCount('comments')->get();
        $videos = $level->videos()->with('category','tags','image')->withCount('comments')->get();

        return view('level',[
            'level' => $level,
            'posts' => $posts,
            'videos' => $videos
        ]);
    }
}
