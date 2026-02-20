<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\App;

class NotificationService
{
    /**
     * Formatea una notificación individual para la API/vista
     */
    public static function format(DatabaseNotification $notification, string $locale, string $guard): array
    {
        App::setLocale($locale);
        $data = $notification->data;
        $type = $data['type'] ?? 'unknown';

        return [
            'id'         => $notification->id,
            'type'       => $type,
            'message'    => self::getMessage($type, $locale),
            'content'    => self::getContent($type, $data, $locale),
            'created_at' => self::formatDate($notification->created_at, $locale)['display'],
            'actions'    => self::generateActions($notification, $locale, $guard),
            'link'       => self::generateLink($guard, $data, $locale),
            'raw_data'   => $data,
        ];
    }

    /**
     * Formatea una colección de notificaciones
     */
    public static function formatCollection(
        $notifications,
        string $locale = 'es',
        string $guard = 'user'
    ): array {
        return $notifications->map(
            fn($notification) => self::format($notification, $locale, $guard)
        )->all();
    }

    // ------
    /**
     * Genera la URL web correcta hacia un ticket, respetando el locale y
     * las rutas traducidas del proyecto.
     *
     * @param string $guard   'user' | 'admin'
     * @param int    $ticketId
     * @param string $locale  'es' | 'en'
     */
    public static function ticketUrl(string $guard, int $ticketId, string $locale): string
    {
        $routeKey = $guard === 'admin'
            ? 'admin.view.ticket'
            : 'user.tickets.show';

        return self::buildTranslatedRoute($routeKey, $ticketId, $locale);
    }

    /**
     * Devuelve el asunto/título traducido según el tipo de notificación
     */
    private static function getMessage(string $type, string $locale): string
    {
        $typeMap = [
            'created'  => 'ticket_created',
            'comment'  => 'ticket_commented',
            'status'   => 'ticket_status_changed',
            'closed'   => 'ticket_closed',
            'reopened' => 'ticket_reopened',
        ];

        $translationKey = $typeMap[$type] ?? $type;
        $messageKey     = "notifications.{$translationKey}";

        if (!trans()->has($messageKey, $locale)) {
            return ucfirst(str_replace('_', ' ', $translationKey));
        }

        return trans($messageKey, [], $locale);
    }

    /**
     * Devuelve el contenido descriptivo interpolado con los datos del ticket
     */
    private static function getContent(string $type, array $data, string $locale): string
    {
        return match ($type) {
            'created' => trans('general.admin_notifications.content_created', [
                'user'  => $data['created_by'] ?? 'Usuario desconocido',
                'title' => $data['title'] ?? 'Sin título',
            ], $locale),

            'comment' => trans('general.admin_notifications.content_commented', [
                'author' => $data['author'] ?? 'Usuario desconocido',
                'title'  => $data['ticket_title'] ?? 'Sin título',
            ], $locale),

            'status' => trans('general.admin_notifications.content_status_changed', [
                'status' => self::translateStatus($data['status'] ?? '', $locale),
            ], $locale),

            'closed' => trans('general.admin_notifications.ticket_closed', [], $locale),

            'reopened' => trans('general.admin_notifications.ticket_reopened', [], $locale),

            default => 'Notificación',
        };
    }

    /**
     * Genera el enlace al ticket según el guard del destinatario
     */
    private static function generateLink(string $guard, array $data, string $locale): ?string
    {
        $ticketId = $data['ticket_id'] ?? null;

        if (!$ticketId) {
            return null;
        }

        return self::ticketUrl($guard, (int) $ticketId, $locale);
    }

    /**
     * Construye la URL traducida correctamente, igual que TicketDataActions.
     *
     * Carga el array completo de routes.php para el locale dado y sustituye
     * el parámetro {ticket} con el ID real. De este modo nunca se usa
     * route() (que en Jobs en cola puede resolver mal la ruta) ni url()
     * con paths hardcodeados sin locale.
     */
    private static function buildTranslatedRoute(string $routeKey, int $ticketId, string $locale): string
    {
        // Cargar el array completo: lang/{locale}/routes.php
        $routes = trans('routes', [], $locale);

        $translatedPath = $routes[$routeKey] ?? null;

        if (!$translatedPath) {
            // Fallback seguro si la clave no existe en el fichero de rutas
            return url("/$locale/tickets/$ticketId");
        }

        // Sustituir {ticket} por el ID real
        $path = str_replace('{ticket}', $ticketId, $translatedPath);

        // Resultado: http://tudominio.com/es/usuario/tickets/97
        return url("/$locale/$path");
    }

    /**
     * Traduce el valor de estado al idioma indicado
     */
    private static function translateStatus(string $status, string $locale): string
    {
        $maps = [
            'en' => [
                'new'         => 'New',
                'open'        => 'Open',
                'in_progress' => 'In Progress',
                'pending'     => 'Pending',
                'resolved'    => 'Resolved',
                'closed'      => 'Closed',
                'reopened'    => 'Reopened',
                'cancelled'   => 'Cancelled',
            ],
            'es' => [
                'new'         => 'Nuevo',
                'open'        => 'Abierto',
                'in_progress' => 'En progreso',
                'pending'     => 'Pendiente',
                'resolved'    => 'Resuelto',
                'closed'      => 'Cerrado',
                'reopened'    => 'Reabierto',
                'cancelled'   => 'Cancelado',
            ],
        ];

        return $maps[$locale][$status]
            ?? $maps['es'][$status]
            ?? ucfirst($status);
    }

    /**
     * Formatea una fecha Carbon para su presentación
     */
    private static function formatDate(Carbon $date, string $locale = 'es'): array
    {
        $date->locale($locale);

        return [
            'display'   => $date->format('d/m/Y H:i'),
            'relative'  => $date->diffForHumans(),
            'timestamp' => $date->timestamp,
        ];
    }

    /**
     * Renderiza el componente Blade de acciones para la notificación
     */
    private static function generateActions(
        DatabaseNotification $notification,
        string $locale,
        string $guard
    ): string {
        return view('components.actions.notification-actions', [
            'notification' => $notification,
            'locale'       => $locale,
            'guard'        => $guard,
        ])->render();
    }
}