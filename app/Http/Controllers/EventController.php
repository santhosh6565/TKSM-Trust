<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
use App\Services\LogService;

class EventController extends Controller
{
    protected $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

    public function index() {
        // Get the count of images grouped by the 'view' column
        $imageCounts = Event::selectRaw('view, count(*) as count')
            ->groupBy('view')
            ->get()
            ->keyBy('view'); // This will make the view values the keys in the collection
    
        // Get all images (if needed for display)
        $images = Event::all();
    
        return view('admin.images.index', compact('images', 'imageCounts'));
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
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048', // Accept more formats to allow conversion to AVIF
            'view' => 'required|in:gallery,event_and_gallery,event',
            'location' => 'nullable|string',
            'requirements' => 'nullable|array',
            'requirements.*.requirement_name' => 'required_with:requirements.*|string', // Validate each requirement name
            'requirements.*.cost' => 'required_with:requirements.*|numeric|min:0',     // Validate each cost
            'requirements.*.quantity' => 'required_with:requirements.*|integer|min:1', // Validate each quantity
            // 'event_status' => 'required|in:upcoming,finished',
        ]);

        try {
            // Load the uploaded image
            $image = $request->file('image');
            
            // Define the image path and filename
            $imageName = time() . '.avif';
            $imagePath = 'images/' . $imageName;

            // Convert the image to AVIF format
            $img = InterventionImage::make($image->getRealPath());
            $img->encode('avif', 90); // Encode as AVIF with quality 90

            // Store the converted AVIF image
            Storage::disk('public')->put($imagePath, $img);

            // Store the event details in the database
            $event = Event::create([
                'title' => $validated['title'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'description' => $validated['description'],
                'image_path' => $imagePath, // Save AVIF image path
                'view' => $validated['view'],
                'location' => $validated['location'],
                'requirements' => $validated['requirements'] ? json_encode($validated['requirements']) : null, // JSON encode if exists
                'event_status' => 'planning',
            ]);

            // Log success
            $this->logService->logSuccess("Event created successfully: Title - " . $event->title);

            // Redirect to the index page with a success message
            return redirect()->route('admin.images.index')->with('success', 'Image uploaded and converted to AVIF successfully.');
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
        // Input validation
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048', // Accept more formats to allow conversion to AVIF
            'view' => 'required|in:gallery,event_and_gallery,event',
            'event_status' => 'required|in:upcoming,finished,planning',
            'requirements' => 'nullable|array',
            'requirements.*.requirement_name' => 'required|string',
            'requirements.*.cost' => 'required|numeric|min:0',
            'requirements.*.quantity' => 'required|integer|min:1',
        ]);

        try {
            // Log the initial state of the event
            $this->logService->logSuccess("Updating Event: ID - {$image->id}, Title - {$image->title}");

            // Handle image update if a new file is provided
            if ($request->hasFile('image')) {
                // Delete the previous image if it exists
                if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
                    Storage::disk('public')->delete($image->image_path);
                }

                // Convert the new image to AVIF format
                $img = InterventionImage::make($request->file('image')->getRealPath());
                $imageName = time() . '.avif';
                $imagePath = 'images/' . $imageName;
                $img->encode('avif', 90);

                // Store the converted AVIF image
                Storage::disk('public')->put($imagePath, $img);
                
                // Log the new image update
                $this->logService->logSuccess("Updated image for Event ID - {$image->id}, New Image Path - {$imagePath}");

                // Update image path in the database
                $image->image_path = $imagePath;
            }

            // Update the event details and requirements
            $image->update([
                'title' => $request->title,
                'description' => $request->description,
                'location' => $request->location,
                'requirements' => $request->requirements ? json_encode($request->requirements) : null,
                'event_status' => $request->event_status,
                'view' => $request->view,
            ]);

            // Log successful update
            $this->logService->logSuccess("Event updated successfully: ID - {$image->id}, Title - {$image->title}");

            return redirect()->route('admin.images.index')->with('success', 'Event updated successfully.');
        } catch (\Exception $e) {
            // Log the error if update fails
            $this->logService->logError("Failed to update Event ID - {$image->id}: " . $e->getMessage());

            return back()->withErrors(['error' => 'Failed to update event: ' . $e->getMessage()]);
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