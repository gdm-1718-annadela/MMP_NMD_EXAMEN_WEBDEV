<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reactie;
use Illuminate\Support\Facades\Auth;

class ReactieUploadController extends Controller
{
    public function store(Request $request) {
        $reactie = request('reactie');
        $projectid = request('project_id');
        $userid = Auth::user()->id;

        $data= [
            'reactie'=> $reactie,
            'project_id'=> $projectid,
            'user_id'=> $userid,
        ];

        
        Reactie::create($data);
        return redirect()->back();
    }

    public function deleteReaction($reaction_id){
        $reaction = Reactie::where('id',$reaction_id)->delete();
        return redirect()->back();
    }
}
