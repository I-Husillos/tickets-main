<?php

namespace App\Http\Controllers\Api\Notifications;

use App\Http\Controllers\Controller;
use App\Http\ValidatesLocale;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Notifications\DatabaseNotification;


class UserNotificationController extends Controller
{
    use ValidatesLocale;

    public function getNotifications(Request $request)
    {
        $user = auth('api_user')->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // validar locale mediante ValidatesLocale trait
        $locale = $this->getValidatedLocale($request);

        $query = $user->notifications();

        $total = $query->count();

        if ($search = $request->input('search.value')) {
            $query->where(function ($q) use ($search) {
                $q->where('data->message', 'LIKE', "%{$search}%")
                  ->orWhere('data->type', 'LIKE', "%{$search}%")
                  ->orWhere('data->author_name', 'LIKE', "%{$search}%");
            });
        }

        // busqueda
        if($search = $request->input('search.value')){
            $query->where(function($q) use ($search) {
                $q->where('data->message', 'LIKE', "%{$search}%")
                  ->orWhere('data->type', 'LIKE', "%{$search}%")
                  ->orWhere('data->author_name', 'LIKE', "%{$search}%");
            });
        }


        $filtered = $query->count();

        // paginacion
        $notifications = $query->orderBy('created_at', 'desc')
            ->skip($request->input('start', 0))
            ->take($request->input('length', 10))
            ->get();

        // usar NotificationService para cada notificacion
        $data = $notifications->map(fn($notification)=>
            NotificationService::format($notification, $locale, 'user')
        );

        return response()->json([
            'draw' => (int) $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);
    }

    
    public function showNotification(Request $request, $notificationId)
    {
        $user = auth('api_user')->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        
        $locale = $request->header('X-Locale') ?? 'es';
        if (!in_array($locale, ['es', 'en'])) {
            $locale = 'es';
        }
        app()->setLocale($locale);

        
        $notification = $user->notifications()->find($notificationId);

        if (!$notification) {
            return response()->json(['error' => 'Notification not found'], 404);
        }

        
        return response()->json([
            'data' => NotificationService::format($notification, $locale, 'user')
        ]);
    }



    public function markAsRead($notificationId)
    {
        $user = auth('api_user')->user();
        $notification = $user->notifications()->find($notificationId);

        if ($notification) {
            $notification->markAsRead();
            return response()->json(['message' => 'Notification marked as read']);
        }

        return response()->json(['error' => 'Notification not found'], 404);
    }

    public function markAsUnread($notificationId)
    {
        $user = auth('api_user')->user();
        $notification = $user->notifications()->find($notificationId);

        if ($notification) {
            $notification->update(['read_at' => null]);
            return response()->json(['message' => 'Notification marked as unread']);
        }

        return response()->json(['error' => 'Notification not found'], 404);
    }

}

