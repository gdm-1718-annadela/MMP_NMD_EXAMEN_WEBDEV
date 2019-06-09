<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Project;
use App\Models\Image;
use App\Models\Categorie;
use App\Models\Fund;
use App\Models\Pages;
use App\Models\Reactie;
use Illuminate\Support\Facades\Auth;
use App\Models\News;


class AdminController extends Controller
{
    public function table(){
        $users = User::all();
        $projects = Project::all();
        $images = Image::all();
        $mustsees = Project::all()->where('kijker', 1);
        $categories = Categorie::all();
        $fundings = Fund::all();
        $pages = Pages::all();
        $reactions = Reactie::all();
        $userId = Auth::user();

        return view('admin')->with(compact('users', 'projects','images','mustsees','categories', 'fundings', 'pages', 'reactions','userId'));
    }

    public function users(){
        $users = User::all();
        $userId = Auth::user();
        return view('admin/users')->with(compact('users','userId'));
    }

    public function projects(){
        $users = User::all();
        $projects = Project::all();
        $userId = Auth::user();
        return view('admin/projects')->with(compact('users','projects','userId'));
    }

    public function images(){
        $images = Image::all();
        $userId = Auth::user();
        return view('admin/images')->with(compact('images','userId'));
    }

    public function news(){
        $mustsees = Project::all()->where('kijker', 1);
        $userId = Auth::user();
        $news = News::all();
        return view('admin/news')->with(compact('mustsees','userId','news'));
    }

    public function category(){
        $categories = Categorie::all();
        $userId = Auth::user();
        return view('admin/categorie')->with(compact('categories','userId'));
    }

    public function donation(){
        $fundings = Fund::all();
        $userId = Auth::user();
        return view('admin/donation')->with(compact('fundings','userId'));
    }

    public function pages(){
        $userId = Auth::user();
        $pages = Pages::all();
        return view('admin/pages')->with(compact('pages','userId'));
    }

    public function reaction(){
        $userId = Auth::user();
        $reactions = Reactie::all();
        return view('admin/reaction')->with(compact('reactions','userId'));
    }
}
