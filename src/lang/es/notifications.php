<?php
return [
    // Títulos/Mensajes principales
    'ticket_created' => 'Nuevo ticket creado',
    'ticket_commented' => 'Nuevo comentario en tu ticket',
    'ticket_status_changed' => 'Estado del ticket actualizado',
    'ticket_closed' => 'Ticket cerrado',
    'ticket_reopened' => 'Ticket reabierto',

    // Contenido descriptivo para BD/API
    'content_created' => 'El usuario :user ha creado un nuevo ticket: ":title"',
    'content_commented' => ':author ha añadido un comentario al ticket ":title"',
    'content_status_changed' => 'El estado ha cambiado a: :status',

    // Contenido para la web
    'content_created_web' => '<strong>:user</strong> ha creado el ticket <strong>":title"</strong>',
    'content_commented_web' => '<strong>:author</strong> comentó en <strong>":title"</strong>: <em>":comment"</em>',
    'content_closed_web' => '<strong>:author</strong> ha cerrado el ticket <strong>":title"</strong>',
    'content_reopened_web' => '<strong>:author</strong> ha reabierto el ticket <strong>":title"</strong>',
    'content_status_changed_web' => '<strong>:author</strong> cambió el estado de <strong>":title"</strong> a <strong>:status</strong>',


    // Botones y acciones
    'view_ticket' => 'Ver Ticket',
    'view_comment' => 'Ver Comentario',
    'mark_as_read' => 'Marcar como leída',
];
