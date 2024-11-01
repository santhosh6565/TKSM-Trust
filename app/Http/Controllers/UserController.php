<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Constants\Permission;
use App\Services\LogService;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $logService;
    protected $notificationService;

    public function __construct(LogService $logService, NotificationService $notificationService)
    {
        $this->logService = $logService;
        $this->notificationService = $notificationService;
    }
    public function showUsers()
    {
        // Fetch users where role_user is null
        $users = User::whereNull('user_role')->get(); // Eager load the role if necessary
        $roles = Role::all(); // Fetch all roles

        return view('admin.users.index', compact('users', 'roles')); // Pass both users and roles to the view
    }

    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|digits:10',
            'address' => 'nullable|string|max:500',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,user',
        ]);

        if ($validator->fails()) {
            $this->logService->logError('Failed to add user: ' . $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get the permissions based on the selected role
        $permissions = Permission::getPermissions($request->role);

        // Create the role with permissions
        $role = Role::create([
            'permission_array' => json_encode($permissions),
        ]);

        // Create the user and assign the role
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role_id' => $role->id,
        ]);

        // Log success
        $this->logService->logSuccess('User added successfully: ' . $user->name . ' - Role: ' . $request->role);

        // Create a welcome notification
        $welcomeMessage = "Welcome to Thirukulandhai Sri Mayan Charitable Trust, {$user->name}! We're glad to have you onboard. As a part of our team.";
        $this->notificationService->createNotification($user->id, $welcomeMessage);

        return redirect()->route('admin.users')->with('success', 'User added successfully.');
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    public function editUser(User $user)
    {
        // Fetch all roles for the edit form
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function updateUser(Request $request, User $user)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'nullable|digits:10',
            'address' => 'nullable|string|max:255',
            'role' => 'nullable|string|in:0,1', // Role can be either '1' for Admin or '0' for User
        ]);

        if ($validator->fails()) {
            $this->logService->logError('Failed to update user: ' . $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update user details
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone; // Update phone number
        $user->address = $request->address; // Update address

        // Update password only if it's provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Check and update role if provided
        $roleInput = $request->role;
        if ($roleInput !== null) {
            if ($roleInput == '1') {
                $permissions = Permission::getPermissions('admin'); // Admin role
            } elseif ($roleInput == '0') {
                $permissions = Permission::getPermissions('user'); // User role
            }

            // Update the user's role_id
            $user->role_id = ($roleInput == '1') ? 1 : 2; // Assuming 1 is Admin, 2 is User

            // Update permissions dynamically for the user's current role
            if ($user->role_id) {
                $role = Role::find($user->role_id);

                if ($role) {
                    $role->permission_array = json_encode($permissions);
                    $role->save();
                }
            }
        }

        // Save user data
        $user->save();

        // Log success
        $this->logService->logSuccess('User updated successfully: ' . $user->name . ' - Role: ' . ($roleInput == '1' ? 'Admin' : 'User'));

        // Send a notification to the user about the update
        $notificationMessage = "Hello {$user->name}, your account details have been successfully updated. If you did not request this change, please contact support.";
        $this->notificationService->createNotification($user->id, $notificationMessage);

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    public function restoreUser($id)
    {
        try {
            // Attempt to find the user with the given ID, including soft-deleted users
            $user = User::withTrashed()->find($id);

            // Check if the user exists and is trashed
            if ($user && $user->trashed()) {
                // Restore the user
                $user->restore();
                
                // Log the successful restoration
                $this->logService->logSuccess("User restored successfully: ID - {$id}");

                return redirect()->back()->with('success', 'User restored successfully.');
            }

            // Log the case where the user was not found or not deleted
            $this->logService->logError("Failed to restore user: ID - {$id}. User not found or not deleted.");
            
            return redirect()->back()->with('error', 'User not found or not deleted.');
        } catch (\Exception $e) {
            // Log any exceptions that occur
            $this->logService->logError("Error restoring user ID - {$id}: " . $e->getMessage());
            
            return back()->withErrors(['error' => 'Failed to restore user: ' . $e->getMessage()]);
        }
    }

    public function forceDeleteUser($id)
    {
        try {
            // Attempt to find the user with the given ID, including soft-deleted users
            $user = User::withTrashed()->find($id);
            
            // Check if the user exists and is trashed
            if ($user && $user->trashed()) {
                // Permanently delete the user
                $user->forceDelete();
                
                // Log the successful permanent deletion
                $this->logService->logSuccess("User deleted permanently: ID - {$id}");
                
                return redirect()->back()->with('success', 'User deleted permanently.');
            }

            // Log the case where the user was not found or not deleted
            $this->logService->logError("Failed to permanently delete user: ID - {$id}. User not found or not deleted.");
            
            return redirect()->back()->with('error', 'User not found or not deleted.');
        } catch (\Exception $e) {
            // Log any exceptions that occur
            $this->logService->logError("Error permanently deleting user ID - {$id}: " . $e->getMessage());
            
            return back()->withErrors(['error' => 'Failed to delete user permanently: ' . $e->getMessage()]);
        }
    }   

}