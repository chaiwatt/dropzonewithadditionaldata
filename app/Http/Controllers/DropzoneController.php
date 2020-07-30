<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Model\Upload;
use Illuminate\Http\Request;

class DropzoneController extends Controller
{
    public function Index(){
        return view('dropzone.index');
    }

    public function Upload(Request $request){
        $file = $request->file;
        $filelocation ='';
        $new_name ='';
       if(!Empty($file)) {
         $extension = $file->getClientOriginalExtension();
         $validextensions = array("jpeg","jpg","png");
         if(in_array(strtolower($extension), $validextensions)){
            $new_name = str_random(10).".".$file->getClientOriginalExtension();
            $file->move("storage/uploads/" , $new_name);
            $filelocation = "storage/uploads/".$new_name;
            $upload = new Upload();
            $upload->user = $request->yourname;
            $upload->name = $new_name;
            $upload->url = $filelocation;
            $upload->save();
         }

         $uploads = Upload::get();
         return response()->json($uploads);  
        }
    }   
}
