<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\Image;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{

       public function store(Request $request) {
        $rules= [
            'project_id' => 'required|numeric',
            'file'=> 'required',
            'file.*'=> 'image|mimes:jpeg,png,gif,svg,jpg|max:2048'
        ];

        $validator=Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return Redirect::back()
            ->withInput()
            ->withErrors($validator)
            ->with(
                [
                    'notification'=>'succes',
                    'message'=>'Er ging iets mis :('
                ]
            );
        }

        if($request->hasFile('file')) {
            // folder van de afbeeldingen
            $directory = '/project-'.$request->project_id;

            foreach($request->file('file') as $image) {
                $name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $filename = pathinfo($name, PATHINFO_FILENAME).'-'.uniqid(5).'.'.$extension;
                $image->storeAs($directory, $filename, 'public');

                $this->storeImageToDatabase($request->project_id, $filename, 'storage'.$directory);
            }
            
            return back()->with([
                'notification' => 'succes',
                'message'=>"het uploaden is succesvolgeladen"
            ]);


        }
    }

    private function storeImageToDatabase($project_id, $filename, $filepath) {
        $image = new Image();
        $image->project_id = $project_id;
        $image->title = $filename;
        $image->path = $filepath;
        $image->caption = 'dit is een caption';

        $image->save();
    }

    public function delete($image_id, Request $request){

        $image = Image::where('id',$image_id)->first();

        $file = str_replace('storage', '', $image->path) . '/' . $image->title;
        //dd($file);

        if(Storage::disk('public')->exists($file)){
            //dd('bestaat, dus kan verwijderd worden');
            $isDeleted = Storage::disk('public')->delete($file);
            if($isDeleted) {
                Image::where('id',$image_id)->delete();
            }
        } else {
            dd('iets mis');
        }
        
        return redirect()->back();
    }
}
