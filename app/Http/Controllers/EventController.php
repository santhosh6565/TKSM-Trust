<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index() {
        $images = Event::all();
        return view('admin.images.index', compact('images'));
    }

    public function create() {
        return view('admin.images.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'nullable',
            'description' => 'nullable',
            'image' => 'required|file|mimes:avif,webp',
            // 'view' => 'required|in:gallery,event_and_gallery',
            'location' => 'nullable|string',
            'requirements' => 'nullable|array',
            'requirements.*.requirement_name' => 'required_with:requirements.*|string', // Validate each requirement name
            'requirements.*.cost' => 'required_with:requirements.*|numeric|min:0',     // Validate each cost
            'requirements.*.quantity' => 'required_with:requirements.*|integer|min:1', // Validate each quantity
            // 'event_status' => 'required|in:upcoming,finished',
        ]);
    
        // Handle file upload for the image
        $imagePath = $request->file('image')->store('images', 'public');
    
        // Store the image details in the database
        Event::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
            'image_path' => $imagePath,
            'view' => 'gallery',
            'location' => $request->location,
            'requirements' => $request->requirements ? json_encode($request->requirements) : null, // JSON encode if exists
            'event_status' => 'upcoming',
        ]);
    
        // Redirect to the index page with a success message
        return redirect()->route('admin.images.index')->with('success', 'Image uploaded successfully.');
    }    

    public function edit(Event $image) {
        return view('admin.images.edit', compact('image'));
    }

    public function update(Request $request, Event $image) {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|file|mimes:avif',
            'view' => 'required|in:gallery,event_and_gallery',
            'event_status' => 'required|in:upcoming,finished',
            'requirements' => 'nullable|array',
            'requirements.*.requirement_name' => 'required|string',
            'requirements.*.cost' => 'required|numeric|min:0',
            'requirements.*.quantity' => 'required|integer|min:1',
        ]);  
    
        // Handle image update if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $image->image_path = $imagePath;
        }
    
        // Update the event details and requirements
        $image->update([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'requirements' => json_encode($request->requirements), // Save requirements as JSON
            'event_status' => $request->event_status,
            'view' => $request->view,
        ]);
    
        return redirect()->route('admin.images.index')->with('success', 'Image updated successfully.');
    }        

    public function destroy(Event $image) {
        // Delete the image file from storage
        if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }
    
        // Delete the image record from the database
        $image->delete();
    
        return redirect()->route('admin.images.index')->with('success', 'Image and requirements deleted successfully.');
    }    
}