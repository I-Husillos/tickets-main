<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notification;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Log;

class UserNotificationController extends Controller
{
    public function showNotificationsView(Request $request)
    {
        $user= Auth::guard('user')->user();

        $query = DatabaseNotification::where('notifiable_id', $user->id)->where('notifiable_type', get_class($user));
        
        if($request->filled('type'))
        {
            $query->where('data->type', $request->type);
        }
        
        $notifications = $query->orderBy('created_at', 'desc')->paginate(10);


        return view('user.notifications.viewnotifications', compact('notifications'));
    }

    public function showUserNotification(String $locale, $notification)
    {
        $user = Auth::guard('user')->user();
        $notificationId = $user->notifications()->find($notification);

        if (!$notificationId) {
            return response()->json(['error' => 'Notification not found'], 404);
        }

        return response()->json([
            'data' => NotificationService::format($notificationId, $locale, 'user')
        ]);
    }
    
    public function markAsRead($locale, $notificationId)
    {
        Log::info('Marcar como leída', [$notificationId]);

        $user = Auth::guard('user')->user();
        
        $notification = $user->notifications->find($notificationId);

        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->route('user.notifications', ['locale' => $locale]);
    }



    public function markAsUnread(String $locale, $notification)
    {
        $user = Auth::user();
        $notif = $user->notifications()->findOrFail($notification);

        $notif->update(['read_at' => null]);

        return redirect()->back()->with('success', 'Notificación marcada como no leída.');
    }
}



