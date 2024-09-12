<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFolderRequest;
use App\Http\Requests\StoreFolderUpdateRequest;
use App\Models\Category;
use App\Models\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function listFolders()
    {
        $user = authenticated();
        $courses = Category::where('is_active', true)->get();
        $folders = Folder::all();
        $folderSize = Folder::with('media')->get()->map(function ($folder) {
            $folder->size = $folder->media->sum('size');
            return $folder;
        });
        return view('backend.file.folder', [
            'user' => $user,
            'courses' => $courses,
            'folders' => $folders,
            'folderSize' => $folderSize,
        ]);
    }

    public function storeFolder(StoreFolderRequest $request)
    {
        $user = authenticated();
        Folder::create($request->safe()->merge([
            'user_id' => $user->id,
        ])->all());

        toast()->success('Folder created successfully.');
        return redirect()->back();
    }

    public function updateFolder(StoreFolderUpdateRequest $request, Folder $folder)
    {
        $folder->update($request->safe()->all());
        toast()->success('Folder updated successfully.');
        return redirect()->back();
    }

    public function destroyFolder(Folder $folder)
    {
        // Get all media files associated with the folder and delete them
        $folder->getMedia()->each->delete();

        // Delete the folder
        $folder->delete();

        toast()->success('Folder and its files deleted successfully.');
        return redirect()->back();
    }
}
