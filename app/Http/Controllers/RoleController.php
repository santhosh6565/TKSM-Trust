<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User; // Import the User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\LogService;

class RoleController extends Controller
{
    protected $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

    public function showRoles()
    {
        $roles = Role::all();
        $users = User::whereNull('user_role')->get(); // Fetch users with their roles
        return view('admin.roles.index', compact('roles', 'users'));
    }

    // Method to update user permissions
    public function editUserRole(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'permission_array' => 'nullable|array', // Expect an array of permissions
        ]);

        if ($validator->fails()) {
            // Log validation error
            $this->logService->logError('Failed to update user role permissions: Validation error - ' . $validator->errors()->first());
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Find the user
        $user = User::find($id);
        if (!$user) {
            // Log user not found error
            $this->logService->logError('Failed to update user role permissions: User not found with ID ' . $id);
            return response()->json(['error' => 'User not found'], 404);
        }

        // Ensure the user has a role before updating permissions
        if (!$user->role) {
            // Log missing role error
            $this->logService->logError('Failed to update user role permissions: Role not found for user ' . $user->name);
            return response()->json(['error' => 'User role not found'], 400);
        }

        try {
            // Convert the permission array to a JSON string and save it
            $user->role->permission_array = json_encode($request->permission_array);
            $user->role->save();

            // Log success
            $this->logService->logSuccess('User permissions updated successfully for: ' . $user->name);
            return redirect()->route('admin.roles')->with('success', 'User role updated successfully.');
        } catch (\Exception $e) {
            // Log any unexpected error during the save process
            $this->logService->logError('Failed to update user role permissions: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while updating permissions'], 500);
        }
    }
    
}