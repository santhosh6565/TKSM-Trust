<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Services\LogService;
use App\Models\User;

class AnnouncementController extends Controller
{
    protected $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }
    public function index() {
        $users = User::all();
        $announcements = Announcement::all();
        return view('admin.announcement.index', compact('users','announcements') );
    }
    public function store(Request $request)
    {
        try {
            // Set default value for is_all_users
            $is_all_users = $request->input('is_all_users', false);

            // Validate the request data
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'is_all_users' => 'boolean',
                'user_ids' => 'array',
                'user_ids.*' => 'exists:users,id', // Validate user IDs
            ]);

            // Log the creation of the announcement
            $this->logService->logSuccess("Creating announcement: Title - {$validated['title']}, is_all_users - {$is_all_users}");

            // Create the announcement
            Announcement::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'is_all_users' => $is_all_users,
                'user_ids' => $is_all_users ? null : $validated['user_ids'],
            ]);

            // Log successful creation
            $this->logService->logSuccess("Announcement created successfully: Title - {$validated['title']}");

            return redirect()->back()->with('success', 'Announcement created successfully!');
        } catch (\Exception $e) {
            // Log the error if creation fails
            $this->logService->logError("Failed to create announcement: " . $e->getMessage());

            return back()->withErrors(['error' => 'Failed to create announcement: ' . $e->getMessage()]);
        }
    }

}
