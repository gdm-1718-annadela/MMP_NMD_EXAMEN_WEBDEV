<?php

namespace App\Http\Controllers;
use App\Models\Pages;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;

class PagesController extends Controller
{
    public function home() {
        $userId = Auth::user();
        $page = Pages::where('id',1)->first();
        return view('welcome')->with(compact('page','userId'));
    }


    public function projects() {
        $userId = Auth::user();
        return view('projects')->with(compact('userId'));
    }

    public function about() {
        $page = Pages::where('id',2)->first();
        $userId = Auth::user();
        return view('about')->with(compact('page','userId'));
    }
    
    public function contact() {
        $page = Pages::where('id',4)->first();
        $userId = Auth::user();
        return view('contact')->with(compact('page','userId'));
    }

    public function privacy() {
        $page = Pages::where('id',3)->first();
        $userId = Auth::user();
        return view('privacy')->with(compact('page','userId'));
    }

    public function account() {
        $userId = Auth::user();
        $projects = Project::all()->where('user_id', $userId->id);
        return view('account')->with(compact('projects', 'userId'));
    }
}
