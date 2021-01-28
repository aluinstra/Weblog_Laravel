<?php

namespace App\Http\Controllers;

use App\Models\File;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function createForm($postID)
    {
        return view('file-upload', compact('postID'));
    }

    public function fileUpload(Request $req, $postID)
    {
        // dd($postID);

        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,jpeg|max:2048'
        ]);


        if ($req->file()) {
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel = new File();
            $fileModel->post_id = $postID;
            $fileModel->name = $fileName;
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName);
        }
    }
}
