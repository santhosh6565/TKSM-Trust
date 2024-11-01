<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\User;

class AnnouncementController extends Controller
{
    public function index() {
        $users = User::all();
        $announcements = Announcement::all();
        return view('admin.announcement.index', compact('users','announcements') );
    }
    public function store(Request $request)
    {
        // Set default value for is_all_users
        $is_all_users = $request->input('is_all_users', false);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_all_users' => 'boolean',
            'user_ids' => 'array',
            'user_ids.*' => 'exists:users,id', // Validate user IDs
        ]);

        Announcement::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'is_all_users' => $is_all_users,
            'user_ids' => $is_all_users ? null : $validated['user_ids'],
        ]);

        return redirect()->back()->with('success', 'Announcement created successfully!');
    }
}
