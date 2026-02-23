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
    'content_commented' => ':author ha añadido un comentario al ticket ":title":',
    'comment_body_label' => 'Contenido del comentario:',
    'content_status_changed' => ':admin ha cambiado el estado del ticket ":title" a: :status',
    'content_closed' => ':admin ha cerrado el ticket ":title"',
    'content_reopened' => ':admin ha reabierto el ticket ":title"',

    // Contenido para la web
    'content_created_web' => '<strong>:user</strong> ha creado el ticket <strong>":title"</strong>',
    'content_commented_web' => '<strong>:author</strong> comentó en <strong>":title"</strong>: <em>":comment"</em>',
    'content_closed_web' => '<strong>:author</strong> ha cerrado el ticket <strong>":title"</strong>',
    'content_reopened_web' => '<strong>:author</strong> ha reabierto el ticket <strong>":title"</strong>',
    'content_status_changed_web' => '<strong>:author</strong> cambió el estado de <strong>":title"</strong> a <strong>:status</strong>',


    // Confirmación de creación de ticket al usuario
    'ticket_created_confirmation_subject'  => 'Tu ticket #:id ha sido recibido',
    'ticket_created_confirmation_greeting' => '¡Hola, :name!',
    'ticket_created_confirmation_intro'    => 'Hemos recibido tu solicitud de soporte y nuestro equipo se pondrá manos a la obra lo antes posible.',
    'ticket_created_confirmation_detail'   => 'Ticket #:id — ":title"',
    'ticket_created_confirmation_next'     => 'Te notificaremos ante cualquier actualización. Gracias por contactarnos.',
    'ticket_created_confirmation_thanks'   => 'El equipo de soporte.',

    // Botones y acciones
    'view_ticket' => 'Ver Ticket',
    'view_comment' => 'Ver Comentario',
    'mark_as_read' => 'Marcar como leída',
];
