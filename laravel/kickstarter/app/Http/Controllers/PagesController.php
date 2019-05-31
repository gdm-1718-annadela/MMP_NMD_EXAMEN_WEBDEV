<?php

namespace App\Http\Controllers;
use App\Models\Pages;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\User;

class PagesController extends Controller
{
    public function home() {
        $page = Pages::where('id',1)->first();
        return view('welcome')->with(compact('page'));
    }

    public function news() {
        $projects = Project::all()->where('kijker', true);
        return view('news')->with(compact('projects'));
    }

    public function projects() {
        return view('projects');
    }

    public function about() {
        $page = Pages::where('id',2)->first();
        return view('about')->with(compact('page'));
    }
    
    public function contact() {
        return view('contact');
    }

    public function privacy() {
        $page = Pages::where('id',3)->first();
        return view('privacy')->with(compact('page'));
    }

    public function account() {
        $userId = Auth::user()->id;
        $projects = Project::all()->where('user_id', $userId);
        return view('account')->with(compact('projects', 'userId'));
    }
}
