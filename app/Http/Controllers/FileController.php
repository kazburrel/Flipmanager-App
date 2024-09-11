<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Folder;
use App\Models\Media;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function listFiles()
    {
        $files = Media::with('folder')->get();
        $courses = Category::where('is_active', true)->get();
        $folders = Folder::all();
        $user = authenticated();
        return view('backend.file.all-files', [
            'files' => $files,
            'courses' => $courses,
            'folders' => $folders,
            'user' => $user,
        ]);
    }

    public function viewFolderFile($folder)
    {
        $folder = Folder::with('media')->findOrFail($folder);
        $files = $folder->getMedia($folder->id);
        $courses = Category::where('is_active', true)->get();
        $folders = Folder::all();
        $user = authenticated();
        return view('backend.file.file', [
            'folder' => $folder,
            'files' => $files,
            'courses' => $courses,
            'folders' => $folders,
            'user' => $user,
        ]);
    }



    public function uploadFiles(Request $request)
    {
        $request->validate([
            'folder_id' => 'required|exists:folders,id',
            'file' => 'required|array',
            'file.*' => 'file|max:1024', // 1MB Max per file
        ]);

        $folder = Folder::findOrFail($request->folder_id);
        $user = authenticated();
        foreach ($request->file('file') as $file) {
            // Get the uploaded file
            $file = $file;
            // Generate a unique file name
            $fileName = Str::uuid() . '.' . $file->getClientOriginalName();

            // Add the media to the folder's media collection
            $folder->addMedia($file)
                ->usingFileName($fileName)
                ->withCustomProperties(['uploaded_by' => $user->id])
                ->toMediaCollection($folder->id, 'public');
        }
        toast()->success('Files uploaded successfully.');
        return redirect()->back();
    }

    public function destroyFile($file)
    {
        $file = Media::findOrFail($file);
        $file->delete();
        toast()->success('File deleted successfully.');
        return redirect()->back();
    }
}
