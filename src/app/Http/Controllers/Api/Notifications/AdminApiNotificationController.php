<?php

namespace App\Http\Controllers\Api\Notifications;

use App\Http\Controllers\Controller;
use App\Http\ValidatesLocale;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AdminApiNotificationController extends Controller
{
    use ValidatesLocale;


    public function getNotifications(Request $request)
    {
        $admin = auth('api')->user();

        if(!$admin) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $locale = $this->getValidatedLocale($request);
        // Validar que el locale sea válido
        if (!in_array($locale, ['es', 'en'])) {
            $locale = 'es';
        }
        app()->setLocale($locale);

        $queryService = new \App\Services\DataTables\NotificationQueryService();
        
        $total = $admin->notifications()->count();
        
        // Construir la query con filtrados y ordenamiento
        $query = $queryService->buildQuery($request, $admin->notifications());
        
        $filtered = $query->count();

        $notifications = $query->skip($request->input('start', 0))
            ->take($request->input('length', 10))
            ->get();

        $data = $notifications->map(fn($notification)=>
            NotificationService::format($notification, $locale, 'admin')
        );

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);

    }


    public function showNotification(Request $request, $notificationId)
    {
        $admin = auth('api')->user();

        if (!$admin) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $locale = $request->header('X-Locale') ?? 'es';
        if (!in_array($locale, ['es', 'en'])) {
            $locale = 'es';
        }
        app()->setLocale($locale);

        $notification = $admin->notifications()->find($notificationId);

        if (!$notification) {
            return response()->json(['error' => 'Notification not found'], 404);
        }

        return response()->json([
            'data' => NotificationService::format($notification, $locale, 'admin')
        ]);
    }


    public function markAsRead($notificationId)
    {
        $admin = auth('api')->user();
        $notification = $admin->notifications()->find($notificationId);

        if ($notification) {
            $notification->markAsRead();
            return response()->json(['message' => 'Notification marked as read']);
        }

        return response()->json(['error' => 'Notification not found'], 404);
    }


    public function markAsUnread($notificationId)
    {
        $admin = auth('api')->user();
        $notification = $admin->notifications()->find($notificationId);

        if (!$notification) {
            return response()->json(['error' => 'Notification not found'], 404);
        }

            $notification->update(['read_at' => null]);
            return response()->json(['message' => 'Notification marked as unread']);
    }

}
