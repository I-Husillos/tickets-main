<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\App;

class NotificationService
{
    public static function format(DatabaseNotification $notification, string $locale, string $guard): array
    {
        App::setLocale($locale);
        $data = $notification->data;
        $type = $data['type'] ?? 'unknown';

        return [
            'id' => $notification->id,
            'type' => $type,
            'message' => self::getMessage($type, $locale),
            'content' => self::getContent($type, $data, $locale),
            'created_at' => self::formatDate($notification->created_at, $locale)['display'],
            'actions' => self::generateActions($notification, $locale, $guard),
            'link' => self::generateLink($guard, $data, $locale),
            // Solo datos sin procesar aquí
            'raw_data' => $data,
        ];
    }

    /**
     * Formatea fecha para presentación
     */
    private static function formatCollection(
        $notifications, 
        string $locale='es',
        string $guard ='user'
    ): array {
        return $notifications->map(fn($notification) =>
            self::format($notification, $locale, $guard)
        )->all();
    }

    /**
     * Obtiene el contenido adicional traducido
     */
    private static function getMessage(string $type, string $locale): string
    {
        $typeMap =[
            'created' => 'ticket_created',
            'comment' => 'ticket_commented',
            'status' => 'ticket_status_changed',
            'closed' => 'ticket_closed',
            'reopened' => 'ticket_reopened',
        ];


        $translationKey = $typeMap[$type] ?? $type;
        $messageKey = "notifications.{$translationKey}";

        // Fallback si no existe
        if (!trans()->has($messageKey, $locale)) {
            return ucfirst(str_replace('_',' ', $translationKey));
        }

        return trans($messageKey, [], $locale);
    }

    /**
     * Obtiene el contenido descriptivo según el tipo
     * 
     * Interpola los datos crudos con traducciones
     */
    private static function getContent(string $type, array $data, string $locale): string
    {
        return match($type) {
            // Ticket creado
            'created' => trans('general.admin_notifications.content_created', [
                'user' => $data['created_by'] ?? 'Usuario desconocido',
                'title' => $data['title'] ?? 'Sin título',
            ], $locale),

            // Comentario añadido
            'comment' => trans('general.admin_notifications.content_commented', [
                'author' => $data['author'] ?? 'Usuario desconocido',
                'title' => $data['ticket_title'] ?? 'Sin título',
            ], $locale),

            // Estado cambió
            'status' => trans('general.admin_notifications.content_status_changed', [
                'status' => self::translateStatus($data['status'] ?? '', $locale),
            ], $locale),

            // Ticket cerrado
            'closed' => trans('general.admin_notifications.ticket_closed', [], $locale),

            // Ticket reabierto
            'reopened' => trans('general.admin_notifications.ticket_reopened', [], $locale),

            default => 'Notificación',
        };
    }

    /**
     * Genera el link al ticket según el guard
     * 
     * @param string $guard (user|admin)
     * @param array $data Datos de la notificación
     * @param string $locale
     * @return string|null
     */
    private static function generateLink(string $guard, array $data, string $locale): ?string
    {
        if (!$ticketId = $data['ticket_id'] ?? null) {
            return null;
        }

        $link = null;

        if ($ticketId) {
            // Obtener la ruta traducida según el locale
            $routes = trans('routes', [], $locale);
            
            $link = match ($guard) {
                'admin' => self::buildTranslatedRoute('admin.view.ticket', $ticketId, $locale, $routes),
                'user' => self::buildTranslatedRoute('user.tickets.show', $ticketId, $locale, $routes),
                default => null,
            };
        }
        return $link;
    }

    /**
     * Traduce estados de ticket
     * 
     * @param string $status
     * @param string $locale
     * @return string
     */
    private static function translateStatus(string $status, string $locale): string
    {
        // Mapear estados a claves de traducción
        $statusMap = [
            'open' => 'Open',
            'in_progress' => 'In Progress',
            'pending' => 'Pending',
            'closed' => 'Closed',
            'reopened' => 'Reopened',
        ];

        // Para español, convertir manualmente
        if ($locale === 'es') {
            $statusMap = [
                'open' => 'Abierto',
                'in_progress' => 'En progreso',
                'pending' => 'Pendiente',
                'closed' => 'Cerrado',
                'reopened' => 'Reabierto',
            ];
        }

        return $statusMap[$status] ?? ucfirst($status);
    }

    /**
     * Formatea fecha para presentación
     * 
     * @param Carbon $date
     * @return array
     */
    private static function formatDate(Carbon $date): array
    {
        return [
            'display' => $date->format('d/m/Y H:i'),
            'relative' => $date->diffForHumans(),
            'timestamp' => $date->timestamp,
        ];
    }

    private static function buildTranslatedRoute(string $routeName, int $ticketId, string $locale, array $routes): string
    {
        // Obtener la ruta traducida
        $translatedPath = $routes[$routeName] ?? null;

        if (!$translatedPath) {
            // Si no existe la traducción, construir con ruta por defecto
            return url("/$locale/admin/tickets/$ticketId");
        }

        // Reemplazar el parámetro {ticket} con el ID
        $path = str_replace('{ticket}', $ticketId, $translatedPath);

        return url("/$locale/$path");
    }


    private static function generateActions(DatabaseNotification $notification, string $locale, string $guard): string
    {
        return view('components.actions.notification-actions', [
            'notification' => $notification,
            'locale' => $locale,
            'guard' => $guard
        ])->render();
    }
}
