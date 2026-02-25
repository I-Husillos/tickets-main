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

    public static function formatCollection(
        $notifications,
        string $locale = 'es',
        string $guard = 'user'
    ): array {
        return $notifications->map(
            fn($notification) => self::format($notification, $locale, $guard)
        )->all();
    }

    /**
     * Genera la URL web correcta hacia un ticket según guard e idioma.
     */
    public static function ticketUrl(string $guard, int $ticketId, string $locale): string
    {
        $guard = self::normalizeGuard($guard);
        $locale = self::normalizeLocale($locale);

        $routeKey = $guard === 'admin'
            ? 'admin.view.ticket'
            : 'user.tickets.show';

        return self::buildTranslatedRoute($routeKey, $ticketId, $locale);
    }

    /**
     * Construye la URL sin usar trans() ni url() para que funcione
     * correctamente dentro de Jobs en cola Redis donde no hay contexto HTTP.
     * Usa config('app.url') + mapa explícito de rutas traducidas.
     */
    private static function buildTranslatedRoute(string $routeKey, int $ticketId, string $locale): string
    {
        $base = rtrim(config('app.url'), '/');

        $translatedPath = trans("routes.{$routeKey}", ['ticket' => $ticketId], $locale);

        $fallbackMap = [
            'user.tickets.show' => "usuario/tickets/{$ticketId}",
            'admin.view.ticket' => "admin/tickets/{$ticketId}",
        ];

        $path = $translatedPath;
        if ($translatedPath === "routes.{$routeKey}" || str_contains($translatedPath, '{ticket}')) {
            $path = $fallbackMap[$routeKey] ?? "usuario/tickets/{$ticketId}";
        }

        $path = ltrim($path, '/');

        return "{$base}/{$locale}/{$path}";
    }

    public static function normalizeLocale(string $locale): string
    {
        $allowedLocales = ['es', 'en'];
        $defaultLocale = config('app.locale', 'es');

        if (in_array($locale, $allowedLocales, true)) {
            return $locale;
        }

        return in_array($defaultLocale, $allowedLocales, true) ? $defaultLocale : 'es';
    }

    private static function normalizeGuard(string $guard): string
    {
        return $guard === 'admin' ? 'admin' : 'user';
    }

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

            'closed'   => trans('general.admin_notifications.ticket_closed', [], $locale),
            'reopened' => trans('general.admin_notifications.ticket_reopened', [], $locale),

            default => 'Notificación',
        };
    }

    private static function generateLink(string $guard, array $data, string $locale): ?string
    {
        $ticketId = $data['ticket_id'] ?? null;
        if (!$ticketId) return null;
        return self::ticketUrl($guard, (int) $ticketId, $locale);
    }

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

    private static function formatDate(Carbon $date, string $locale = 'es'): array
    {
        $date->locale($locale);
        return [
            'display'   => $date->format('d/m/Y H:i'),
            'relative'  => $date->diffForHumans(),
            'timestamp' => $date->timestamp,
        ];
    }

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