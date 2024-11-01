<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\LogService;

class EventController extends Controller
{
    protected $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

    public function index() {
        $images = Event::all();
        return view('admin.images.index', compact('images'));
    }

    public function create() {
        return view('admin.images.create');
    }

    public function store(Request $request) 
    {
        // Input validation
        $validated = $request->validate([
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

        try {
            // Handle file upload for the image
            $imagePath = $request->file('image')->store('images', 'public');

            // Store the image details in the database
            $event = Event::create([
                'title' => $validated['title'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'description' => $validated['description'],
                'image_path' => $imagePath,
                'view' => 'gallery',
                'location' => $validated['location'],
                'requirements' => $validated['requirements'] ? json_encode($validated['requirements']) : null, // JSON encode if exists
                'event_status' => 'upcoming',
            ]);

            // Log success
            $this->logService->logSuccess("Event created successfully: Title - " . $event->title);

            // Redirect to the index page with a success message
            return redirect()->route('admin.images.index')->with('success', 'Image uploaded successfully.');
        } catch (\Exception $e) {
            // Log error
            $this->logService->logError("Failed to create event: " . $e->getMessage());

            return back()->withErrors(['error' => 'Failed to upload image: ' . $e->getMessage()]);
        }
    }    

    public function edit(Event $image) {
        return view('admin.images.edit', compact('image'));
    }

    public function update(Request $request, Event $image)
    {
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

        try {
            // Log the initial state of the event
            $this->logService->logSuccess("Updating Event: ID - {$image->id}, Title - {$image->title}");

            // Handle image update if provided
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $this->logService->logSuccess("Updating image for Event ID - {$image->id}, New Image Path - {$imagePath}");
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

            // Log successful update
            $this->logService->logSuccess("Event updated successfully: ID - {$image->id}, Title - {$image->title}");

            return redirect()->route('admin.images.index')->with('success', 'Image updated successfully.');
        } catch (\Exception $e) {
            // Log the error if update fails
            $this->logService->logError("Failed to update Event ID - {$image->id}: " . $e->getMessage());

            return back()->withErrors(['error' => 'Failed to update image: ' . $e->getMessage()]);
        }
    }        

    public function destroy(Event $image)
    {
        try {
            // Log the initial state before deletion
            $this->logService->logSuccess("Attempting to delete Event: ID - {$image->id}, Title - {$image->title}");

            // Delete the image file from storage if it exists
            if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
                $this->logService->logSuccess("Image file deleted from storage for Event ID - {$image->id}, Path - {$image->image_path}");
            }

            // Delete the image record from the database
            $image->delete();

            // Log successful deletion
            $this->logService->logSuccess("Event and associated requirements deleted successfully: ID - {$image->id}");

            return redirect()->route('admin.images.index')->with('success', 'Image and requirements deleted successfully.');
        } catch (\Exception $e) {
            // Log the error if deletion fails
            $this->logService->logError("Failed to delete Event ID - {$image->id}: " . $e->getMessage());

            return back()->withErrors(['error' => 'Failed to delete image and requirements: ' . $e->getMessage()]);
        }
    }
    
}