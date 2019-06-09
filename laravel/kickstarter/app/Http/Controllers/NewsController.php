<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\User;



class NewsController extends Controller
{
    public function news() {
        $mustsee = Project::all()->where('kijker', 1);
        $projects = Project::all();
        $users = User::all();
        $userId = Auth::user();
        $news = News::all();
        return view('news')->with(compact('mustsee','users','projects','userId', 'news'));
    }

    public function create(){
        $userId = Auth::user();
        return view('/createNews')->with(compact('userId'));
    }

    public function save(Request $request){
        \request()->validate([
            'titel' => 'required',
            'tekst' => 'required',
        ]);

        $data = [
            'titel' => request('titel'),
            'tekst'=> request('tekst'),
            'excerpt'=> request('inleiding'),
            'slot'=>request('slot'),
        ];

        News::create($data);
        $mustsee = Project::all()->where('kijker', 1);
        $projects = Project::all();
        $users = User::all();
        $userId = Auth::user();
        $news = News::all();

        return view('news')->with(compact('mustsee','users','projects','userId','news'));
    }

    public function edit($news_id) {
        $news = News::where('id',$news_id)->first();
        $userId = Auth::user();

        return view('/editNews')->with(compact('news','userId'));
    }

    public function update($news_id){
        $news = News::where('id',$news_id)->first();
        $data = [
            'titel' => request('titel'),
            'tekst'=> request('tekst'),
            'excerpt'=> request('inleiding'),
            'slot'=>request('slot'),
        ];

        $news->update($data);
        return redirect()->back()->with('succes', 'updated');
    }

    public function delete($news_id){
        $news = News::where('id',$news_id)->delete();
        return redirect()->back();
    }
}
