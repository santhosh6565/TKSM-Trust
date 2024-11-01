<?php

namespace App\Services;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationService
{
    /**
     * Create a notification for a specific user.
     *
     * @param int $userId
     * @param string $message
     * @return Notification
     */
    public function createNotification(int $userId, string $message): Notification
    {
        return Notification::create([
            'user_id' => $userId,
            'message' => $message,
        ]);
    }

    /**
     * Mark a notification as read.
     *
     * @param int $notificationId
     * @return bool
     */
    public function markAsRead(int $notificationId): bool
    {
        $notification = Notification::find($notificationId);
        
        if ($notification && $notification->user_id === Auth::id()) {
            $notification->is_read = true;
            return $notification->save();
        }

        return false;
    }

    /**
     * Get unread notifications for the authenticated user.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUnreadNotifications()
    {
        return Notification::where('user_id', Auth::id())
                           ->where('is_read', false)
                           ->get();
    }
}