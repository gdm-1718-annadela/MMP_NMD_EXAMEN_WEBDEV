<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\User;
use App\Mail\Fundmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Reactie;
use App\Models\Project;
use App\Models\Image;
use App\Models\Fund;
use Carbon\Carbon;
use PDF;

class ProjectController extends Controller
{
    public function projects() {
        $projects = Project::all()->where('gepubliceerd_tot', '>', Carbon::now())->sortBy('categorie_id');
        $users = User::all();
        return view('projects')->with(compact('projects', 'users'));
    }

    public function createProject() {
        $categories = Categorie::all();
        return view('createform')->with(compact('categories'));
    }

    public function saveProject(Request $request) {
        
        \request()->validate( [
            'categorie'=>'required',
            'naam'=> 'required',
            'uitleg'=> 'required',
            'doelbedrag'=> 'required',
            'deadline'=> 'required',
         ]);

    
        $data = [
            'categorie_id'=>request('categorie'),
            'naam'=>request('naam'),
            'uitleg'=>request('uitleg'),
            'credits_doelbedrag'=>request('doelbedrag'),
            'gepubliceerd_tot'=>request('deadline'),
            'user_id'=> Auth::user()->id,
            'minimumbedrag' =>request('minimumbedrag'),
            'minimumsouvenir' =>request('minimumsouvenir'),
            'maximumbedrag' =>request('maximumbedrag'),
            'maximumsouvenir' =>request('maximumsouvenir'),
        ];

        $project= Project::create($data);
        $project_id = Project::where('id',$project->id)->first()->id;
        
        return redirect('/projects/'. $project_id);
    }

    public function editProject($project_id) {
        $project = Project::where('id',$project_id)->first();
        $categories = Categorie::all();

        return view('/editProject')->with(compact('project', 'categories'));
    }

    public function updateProject($project_id) {

        $project = Project::where('id',$project_id)->first();
        $data = [
            'categorie_id'=>request('categorie'),
            'naam'=>request('naam'),
            'uitleg'=>request('uitleg'),
            'credits_doelbedrag'=>request('doelbedrag'),
            'gepubliceerd_tot'=>request('deadline'),
            'minimumbedrag'=>request('minimumbedrag'),
            'minimumsouvenir'=>request('minimumsouvenir'),
            'maximumbedrag'=>request('maximumbedrag'),
            'maximumsouvenir'=>request('maximumsouvenir')
        ];

        $project->update($data);
        return redirect()->back()->with('succes', 'updated');
    }

    public function deleteProject($project_id) {
        $project = Project::where('id',$project_id)->delete();
        return redirect()->back();

    }

    public function detailProject($project_id) {
        $project = Project::where('id',$project_id)->first();
        $images = Image::all()->where('project_id', $project_id);
        $reacties = Reactie::all()->where('project_id', $project_id);
        $categorie = Categorie::where('id', $project->categorie_id)->first()->categorie;
        $totaldonated = Fund::all()->where('project_id', $project_id)->sum('bedrag');
        $fundhistory = Fund::all()->where('project_id' , $project_id);
        if(Auth::check()){
            $projectcreater = Auth::user()->where('id', $project->user_id)->first();
            $user = Auth::user()->credits;
            return view('/detailProject')->with(compact('project', 'user', 'images', 'reacties', 'totaldonated', 'fundhistory','projectcreater','categorie'));
        } else {
            return view('/detailProject')->with(compact('project', 'images', 'reacties', 'totaldonated', 'fundhistory', 'categorie'));
        }

    }

    public function donateProject($project_id, Request $request) {
        $project = Project::where('id',$project_id)->first();
        
        $total = request("donate");
        $user = User::where('id', Auth::user()->id)->first();
        $usercredits = $user->credits;
        $newusercredits = $usercredits - $total;
        if(Fund::all()->where('project_id', $project_id)->sum('bedrag') + $total > $project->credits_doelbedrag){
            return redirect()->back()->with('fail', 'te hoog bedrag zorg dat je niet teveel credits weggeeft!');
        }

        if($newusercredits < 0) {
            return redirect()->back()->with('fail', 'Je hebt teweinig credits om dit te doneren!');
        } else {
            User::where('id', Auth::user()->id)->update([
                'credits'=> $newusercredits
            ]);
        }
        

        
        $projectcreater = $project->user_id;
        $creatorCredits = User::where('id', $projectcreater)->first()->credits;
        $newcreatercredit = $creatorCredits + ($total * 0.9);

        User::where('id', $projectcreater)->update([
            'credits'=> $newcreatercredit
        ]);

        $adminCredits = User::where('soortgebruiker', 'admin')->first()->credits;
        $newAdmincredit = $adminCredits + ($total * 0.1);

        User::where('soortgebruiker', 'admin')->update([
            'credits'=> $newAdmincredit
        ]);

        $data = [
            'bedrag' => $total,
            'project_id' => $project->id,
            'user_id'=> Auth::user()->id,
            'user_name'=>Auth::user()->name,
        ];;

        $sub = $project->credits_gesubsideert + ($total * 0.9);

        Project::where('id', $project_id)->update([
            'credits_gesubsideert' => $sub,
        ]);

        Fund::create($data);
        //TERUG AANZETTEN!

        // $usermail = User::where('id', $projectcreater)->first()->email;
        // $mail = new Fundmail();
        // Mail::to($usermail)->send($mail);

        return redirect()->back();
    }

    public function pdfmaker($project_id){
        $project = Project::where('id', $project_id)->first();
        $user = User::where('id', $project->user_id)->first();
        $categorie = Categorie::where('id', $project->categorie_id)->first()->categorie;
        $funding = Fund::where('project_id', $project->id)->first();
        $image = Image::where('project_id', $project->id)->inRandomOrder()->first();

        if($image == null) {
            $data = [
                'imagepath' => '../resources/images',
                'imagename' => 'logo.png',
                'titel'=> $project->naam,
                ];
        } else {
            $data = [
                'imagepath' => $image->path,
                'imagename' => $image->title,
                'titel'=> $project->naam,
            ];
        }

        $pdf = PDF::loadview('pdfmaker', array('data'=> $data));
        return $pdf->stream($project->naam.'.pdf');
    }

    public function kijker($project_id){
        $project = Project::where('id', $project_id)->first();
        $user = User::where('id', Auth::user()->id)->first();
        // dd(User::where('id', Auth::user()->id)->first()->credits);
        if(User::where('id', Auth::user()->id)->first()->credits < 1000){
            return redirect()->back()->with('fail', 'je hebt niet genoeg credits om jou project in de kijker te zetten');
        } else {
            $kijker = $project->kijker;
            $adminCredits = User::where('soortgebruiker', 'admin')->first()->credits;
            $newAdmincredit = $adminCredits + 1000;
            $newusercredits = $user->credits - 1000;
            Project::where('id', $project_id)->update([
                'kijker'=> true,
            ]);
            User::where('soortgebruiker', 'admin')->update([
                'credits'=> $newAdmincredit
            ]);
            User::where('id', Auth::user()->id)->update([
                'credits'=> $newusercredits
            ]);
            return redirect()->back();
        }
        
        
    }
}
