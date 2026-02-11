<?php

return [
    'header' => [
        'title' => 'Notificaciones del Administrador',
        'subtitle' => 'Gestión de alertas y avisos del sistema para mantener el control de las incidencias.',
    ],
    'section_intro' => [
        'title' => '¿Qué son las notificaciones de administrador?',
        'content' => 'El sistema de notificaciones es el centro de alerta temprana para el equipo de soporte. Permite a los administradores reaccionar rápidamente ante nuevos incidentes o respuestas de usuarios sin necesidad de monitorizar constantemente la lista de tickets. Cada vez que ocurre un evento relevante en un ticket que te concierne, recibirás un aviso inmediato.',
    ],
    'section_access' => [
        'title' => 'Cómo acceder a tus notificaciones',
        'intro' => 'Existen <strong>dos métodos principales</strong> para consultar las novedades:',
        'option_1' => [
            'title' => 'Opción 1: Desde la Barra Superior (Navbar)',
            'desc' => 'Esta es la forma más rápida de ver las últimas novedades mientras trabajas en otras áreas.',
            'alert_title' => 'Indicador Visual:',
            'steps' => [
                'En la esquina superior derecha, verás un icono de <strong>campana</strong>.',
                'Si hay un círculo amarillo con un número, indica la cantidad de notificaciones <strong>no leídas</strong>.',
                'Al hacer clic, verás un resumen rápido de las últimas notificaciones.',
            ],
            'note' => 'Para ver el listado completo, haz clic en "Ver todas las notificaciones" al final de ese menú desplegable.',
        ],
        'option_2' => [
            'title' => 'Opción 2: Listado Completo',
            'desc' => 'Para una gestión más detallada, puedes acceder a la vista de tabla completa donde podrás filtrar, buscar y gestionar alertas antiguas.',
            'box_text' => 'Accede pulsando "Ver todas" desde la campana o desde el menú lateral si está habilitado.',
        ],
    ],
    'section_screen' => [
        'title' => 'La Pantalla de Gestión de Notificaciones',
        'intro' => 'La vista principal "Mis Notificaciones" está diseñada para procesar grandes volúmenes de alertas de manera eficiente.',
        'table_title' => 'Estructura de la Tabla',
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
                'example' => '<span class="badge badge-info">Comentario</span>, <span class="badge badge-success">Nuevo Ticket</span>',
            ],
            'content' => [
                'col' => 'Contenido',
                'desc' => 'Resumen breve de lo ocurrido. Incluye el ID del ticket y el autor de la acción.',
                'example' => '"Nuevo ticket creado con ID 45 por Usuario..."',
            ],
            'date' => [
                'col' => 'Fecha',
                'desc' => 'Momento exacto en que se generó la alerta.',
                'example' => '10/02/2026 09:30',
            ],
            'actions' => [
                'col' => 'Acciones',
                'desc' => 'Herramientas para interactuar con la notificación.',
                'example' => 'Ver, Marcar leída',
            ],
        ],
    ],
    'section_logic' => [
        'title' => 'Lógica de Envío: ¿Qué notificaciones recibo?',
        'subtitle' => 'El sistema utiliza reglas inteligentes para no saturar tu bandeja. Recibirás avisos según tu rol y asignación:',
        'cards' => [
            'new_ticket' => [
                'title' => '1. Nuevo Ticket Creado',
                'who' => '<strong>¿Quién la recibe?</strong> Todos los administradores.',
                'why' => 'Para garantizar que ninguna incidencia nueva pase desapercibida, todo el equipo técnico es alertado cuando entra un ticket nuevo.',
            ],
            'assigned_reply' => [
                'title' => '2. Respuesta en Ticket Asignado',
                'who' => '<strong>¿Quién la recibe?</strong> Solo el admin asignado.',
                'why' => 'Si tú eres el responsable de un ticket, solo tú recibirás la notificación cuando el usuario conteste, evitando ruido al resto del equipo.',
            ],
            'unassigned_reply' => [
                'title' => '3. Respuesta en Ticket NO Asignado',
                'who' => '<strong>¿Quién la recibe?</strong> Todos los administradores.',
                'why' => 'Si un ticket no tiene dueño y el usuario contesta, se avisa a todos para que alguien lo tome.',
            ],
        ],
    ],
    'section_types' => [
        'title' => 'Tipos de Eventos',
        'cards' => [
            'comment' => [
                'title' => 'Nuevo Comentario',
                'desc' => 'El usuario ha respondido a una de tus preguntas o ha añadido información extra.',
                'priority' => 'Prioridad: Alta (El usuario espera feedback).',
            ],
            'new_ticket' => [
                'title' => 'Ticket Nuevo',
                'desc' => 'Se ha registrado una nueva incidencia en el sistema.',
                'priority' => 'Prioridad: Crítica (Requiere triaje y asignación).',
            ],
            'reopened' => [
                'title' => 'Ticket Reabierto',
                'desc' => 'Un usuario ha reabierto un ticket que estaba cerrado, indicando que la solución no fue efectiva.',
                'priority' => 'Prioridad: Muy Alta (Reincidencia).',
            ],
        ],
    ],
    'section_tools' => [
        'title' => 'Herramientas de Productividad',
        'search' => [
            'title' => 'Buscador Inteligente',
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
            'tip' => 'Consejo: Mantén tu bandeja limpia marcando como leídas las notificaciones antiguas.',
        ],
    ],
    'section_actions' => [
        'title' => 'Acciones Principales',
        'intro' => 'En la columna "Acciones" encontrarás tres botones fundamentales para tu flujo de trabajo:',
        'buttons' => [
            'view' => [
                'title' => 'Ver Detalles',
                'desc' => 'Abre un modal con el mensaje completo sin salir de la página. Incluye un enlace directo al ticket.',
            ],
            'mark_read' => [
                'title' => 'Marcar Leída',
                'desc' => 'Quita el indicador de "Nueva". Úsalo cuando ya has tomado nota pero quieres mantener el registro.',
            ],
        ],
    ],
    'section_workflow' => [
        'title' => 'Ejemplo de Flujo de Trabajo Ideal',
        'steps' => [
            '1' => [
                'title' => '1. Recepción',
                'desc' => 'Ves el indicador "1" en la campana. Es un cliente respondiendo a un ticket tuyo que estaba en "Pendiente".',
            ],
            '2' => [
                'title' => '2. Revisión Rápida',
                'desc' => 'Pulsas el botón "Ver" (Ojo). Lees la respuesta del cliente en la ventana modal. Ves que adjunta el dato que faltaba.',
            ],
            '3' => [
                'title' => '3. Acción',
                'desc' => 'Desde el modal, haces clic en "Ir al Ticket". Respondes al cliente y cambias el estado a "Resuelto".',
            ],
            '4' => [
                'title' => '4. Finalización',
                'desc' => 'Vuelves a notificaciones y marcas la alerta como leída (si aún no lo está) para limpiar tu bandeja de pendientes.',
            ],
        ],
    ],
];
