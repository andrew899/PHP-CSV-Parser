<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileUpload extends Controller
{
    public function createForm(){
        return view('file-upload');
    }

    public function fileUpload(Request $req){
        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls'
        ]);

        $fileModel = new File;

        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file');//->storeAs('uploads', $fileName, 'public');
            $disk = Storage::disk('local');
            $disk->put($fileName, fopen($filePath, 'r+'));


            $fileModel->name = $fileName;
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->user_id = Auth::id();
            $fileModel->save();

            return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
        }
    }
}
