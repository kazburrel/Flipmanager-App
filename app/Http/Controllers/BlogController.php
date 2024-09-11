<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\StoreBlogUpdateRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function listBlogs()
    {
        $blogs = Blog::with('media')->get()->map(function ($blog) {
            $blog->image = $blog->getFirstMediaUrl($blog->id);
            return $blog;
        });
        $user = authenticated();
        return view('backend.blog.all-blogs', [
            'blogs' => $blogs,
            'user' => $user
        ]);
    }
    public function storeBlog(StoreBlogRequest $request)
    {
        $user = authenticated();
        $blog = Blog::create($request->safe()->merge([
            'author_id' => $user->id,
        ])->all());

        // Add the blog file to spatie media
        if ($request->hasFile('media')) {
            $media = $blog->addMedia($request->file('media'))->toMediaCollection($blog->id);
            // Update the blog media_id column with the uuid column of the media table
            $blog->update(['media_id' => $media->uuid]);
        }

        toast()->success('Blog created successfully.');
        return redirect()->back();
    }
    public function destroyBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        toast()->success('Blog deleted successfully.');
        return redirect()->back();
    }

    public function updateBlog(StoreBlogUpdateRequest $request, Blog $blog)
    {


        $user = authenticated();
        $blog->update($request->safe()->merge([
            'published_at' => now(),
            'updated_by' => $user->id,
            'is_published' => $request->input('is_published') === 'true' ? true : false
        ])->all());

        // Update the blog file in spatie media if a new file is uploaded
        if ($request->hasFile('media')) {
            // Remove the old media
            $blog->clearMediaCollection($blog->id);

            // Add the new media
            $media = $blog->addMedia($request->file('media'))->toMediaCollection($blog->id);

            // Update the blog media_id column with the uuid column of the new media
            $blog->update(['media_id' => $media->uuid]);
        }

        toast()->success('Blog updated successfully.');
        return redirect()->back();
    }
}
