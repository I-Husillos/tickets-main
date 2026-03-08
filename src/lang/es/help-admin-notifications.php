<?php

return [
    'header' => [
        'title' => 'Notificaciones del administrador',
        'subtitle' => 'Gestión de alertas y avisos del sistema para mantener el control de las incidencias.',
    ],
    'section_intro' => [
        'title' => '¿Qué son las notificaciones de administrador?',
        'content' => 'El sistema de notificaciones es el centro de alerta temprana para el equipo de soporte. permite a los administradores reaccionar rápidamente ante nuevos incidentes o respuestas de usuarios sin necesidad de monitorizar constantemente la lista de tickets. cada vez que ocurre un evento relevante en un ticket que te concierne, recibirás un aviso inmediato.',
    ],
    'section_access' => [
        'title' => 'Cómo acceder a tus notificaciones',
        'intro' => 'Existen <strong>dos métodos principales</strong> para consultar las novedades:',
        'option_1' => [
            'title' => 'Opción 1: desde la barra superior (navbar)',
            'desc' => 'Esta es la forma más rápida de ver las últimas novedades mientras trabajas en otras áreas.',
            'alert_title' => 'Indicador visual:',
            'steps' => [
                'En la esquina superior derecha, verás un icono de <strong>campana</strong>.',
                'Si hay un círculo amarillo con un número, indica la cantidad de notificaciones <strong>no leídas</strong>.',
                'Al hacer clic, verás un resumen rápido de las últimas notificaciones.',
            ],
            'note' => 'Para ver el listado completo, haz clic en "ver todas las notificaciones" al final de ese menú desplegable.',
        ],
        'option_2' => [
            'title' => 'Opción 2: listado completo',
            'desc' => 'Para una gestión más detallada, puedes acceder a la vista de tabla completa donde podrás filtrar, buscar y gestionar alertas antiguas.',
            'box_text' => 'Accede pulsando "ver todas" desde la campana o desde el menú lateral si está habilitado.',
        ],
    ],
    'section_screen' => [
        'title' => 'La pantalla de gestión de notificaciones',
        'intro' => 'La vista principal "Mis notificaciones" está diseñada para procesar grandes volúmenes de alertas de manera eficiente.',
        'table_title' => 'Estructura de la tabla',
        'table_desc' => 'La información se presenta en 4 columnas clave:',
        'table_headers' => [
            'col' => 'Columna',
            'desc' => 'Descripción',
            'example' => 'Ejemplo',
        ],
        'table_rows' => [
            'type' => [
                'col' => 'Tipo',
                'desc' => 'Categoría del evento. Ayuda a distinguir urgencias.',
                'example' => '<span class="badge badge-info">comentario</span>, <span class="badge badge-success">nuevo ticket</span>',
            ],
            'content' => [
                'col' => 'Contenido',
                'desc' => 'Resumen breve de lo ocurrido. Incluye el ID del ticket y el autor de la acción.',
                'example' => '"Nuevo ticket creado con ID 45 por usuario..."',
            ],
            'date' => [
                'col' => 'Fecha',
                'desc' => 'Momento exacto en que se generó la alerta.',
                'example' => '10/02/2026 09:30',
            ],
            'actions' => [
                'col' => 'Acciones',
                'desc' => 'Herramientas para interactuar con la notificación.',
                'example' => 'Ver, marcar leída',
            ],
        ],
    ],
    'section_logic' => [
        'title' => 'Lógica de envío: ¿qué notificaciones recibo?',
        'subtitle' => 'El sistema utiliza reglas inteligentes para no saturar tu bandeja. Recibirás avisos según tu rol y asignación:',
        'cards' => [
            'new_ticket' => [
                'title' => '1. Nuevo ticket creado',
                'who' => '<strong>¿Quién la recibe?</strong> todos los administradores.',
                'why' => 'Para garantizar que ninguna incidencia nueva pase desapercibida, todo el equipo técnico es alertado cuando entra un ticket nuevo.',
            ],
            'assigned_reply' => [
                'title' => '2. Respuesta en ticket asignado',
                'who' => '<strong>¿Quién la recibe?</strong> solo el admin asignado.',
                'why' => 'Si tú eres el responsable de un ticket, solo tú recibirás la notificación cuando el usuario conteste, evitando ruido al resto del equipo.',
            ],
            'unassigned_reply' => [
                'title' => '3. Respuesta en ticket no asignado',
                'who' => '<strong>¿Quién la recibe?</strong> todos los administradores.',
                'why' => 'Si un ticket no tiene dueño y el usuario contesta, se avisa a todos para que alguien lo tome.',
            ],
        ],
    ],
    'section_types' => [
        'title' => 'Tipos de eventos',
        'cards' => [
            'comment' => [
                'title' => 'Nuevo comentario',
                'desc' => 'El usuario ha respondido a una de tus preguntas o ha añadido información extra.',
                'priority' => 'Prioridad: alta (el usuario espera feedback).',
            ],
            'new_ticket' => [
                'title' => 'Ticket nuevo',
                'desc' => 'Se ha registrado una nueva incidencia en el sistema.',
                'priority' => 'Prioridad: crítica (requiere triaje y asignación).',
            ],
            'reopened' => [
                'title' => 'Ticket reabierto',
                'desc' => 'Un usuario ha reabierto un ticket que estaba cerrado, indicando que la solución no fue efectiva.',
                'priority' => 'Prioridad: muy alta (reincidencia).',
            ],
        ],
    ],
    'section_tools' => [
        'title' => 'Herramientas de productividad',
        'search' => [
            'title' => 'Buscador inteligente',
            'desc' => 'Usa la caja de búsqueda para encontrar notificaciones específicas. Puedes buscar por:',
            'items' => [
                '<strong>ID del Ticket:</strong> Escribe "45" para ver todo lo relacionado con ese caso.',
                '<strong>Nombre de Usuario:</strong> Encuentra actividad de un cliente concreto.',
                '<strong>Palabras clave:</strong> Como "Error", "Factura", etc.',
            ],
        ],
        'organization' => [
            'title' => 'Organización',
            'desc' => 'El sistema ordena automáticamente las notificaciones, mostrando las más recientes primero.',
            'tip' => 'Consejo: mantén tu bandeja limpia marcando como leídas las notificaciones antiguas.',
        ],
    ],
    'section_actions' => [
        'title' => 'Acciones principales',
        'intro' => 'En la columna "Acciones" encontrarás tres botones fundamentales para tu flujo de trabajo:',
        'buttons' => [
            'view' => [
                'title' => 'Ver detalles',
                'desc' => 'Abre un modal con el mensaje completo sin salir de la página. Incluye un enlace directo al ticket.',
            ],
            'mark_read' => [
                'title' => 'Marcar leída',
                'desc' => 'Quita el indicador de "Nueva". Úsalo cuando ya has tomado nota pero quieres mantener el registro.',
            ],
        ],
    ],
    'section_workflow' => [
        'title' => 'Ejemplo de flujo de trabajo ideal',
        'steps' => [
            '1' => [
                'title' => '1. Recepción',
                'desc' => 'Ves el indicador "1" en la campana. Es un cliente respondiendo a un ticket tuyo que estaba en "pendiente".',
            ],
            '2' => [
                'title' => '2. Revisión rápida',
                'desc' => 'Pulsas el botón "Ver" (ojo). Lees la respuesta del cliente en la ventana modal. Ves que adjunta el dato que faltaba.',
            ],
            '3' => [
                'title' => '3. Acción',
                'desc' => 'Desde el modal, haces clic en "Ir al ticket". Respondes al cliente y cambias el estado a "Resuelto".',
            ],
            '4' => [
                'title' => '4. Finalización',
                'desc' => 'Vuelves a notificaciones y marcas la alerta como leída (si aún no lo está) para limpiar tu bandeja de pendientes.',
            ],
        ],
    ],
];
