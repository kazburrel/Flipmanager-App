<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function listEvents()
    {
        $events = Event::with('media')->get()->map(function ($event) {
            $event->image = $event->getFirstMediaUrl($event->id);
            return $event;
        });
        // dd($events);
        $user = authenticated();
        return view('backend.event.all-events', [
            'events' => $events,
            'user' => $user
        ]);
    }

    public function storeEvent(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'description' => 'required|string',
            'media' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'required|date|after:today',
        ]);

        $user = authenticated();
        $event = Event::create($request->merge([
            'user_id' => $user->id,
        ])->all());


        if ($request->hasFile('media')) {
            $media = $event->addMedia($request->file('media'))->toMediaCollection($event->id);
            $event->update(['media_id' => $media->uuid]);
        }

        toast()->success('Event created successfully.');
        return redirect()->back();
    }

    public function updateEvent(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'description' => 'required|string',
            'media' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'required|date|after:today',
        ]);

        $user = authenticated();
        $event->update($request->merge([
            'updated_by' => $user->id,
        ])->all());

        if ($request->hasFile('media')) {
            $event->clearMediaCollection($event->id);
            $media = $event->addMedia($request->file('media'))->toMediaCollection($event->id);
            $event->update(['media_id' => $media->uuid]);
        }

        toast()->success('Event updated successfully.');
        return redirect()->back();
    }

    public function destroyEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        toast()->success('Event deleted successfully.');
        return redirect()->back();
    }
}
