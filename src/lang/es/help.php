<?php

return [
    'title' => 'Ayuda · Gestión de Tickets',
    'header' => 'Gestión de Tickets',
    'breadcrumbs' => [
        'help' => 'Ayuda',
        'tickets' => 'Tickets',
    ],
    'intro' => [
        'title' => '¿Qué es un Ticket?',
        'text' => 'Un "Ticket" es el registro digital de tu solicitud, incidencia o pregunta. Es como un expediente que contiene toda la información del problema, la conversación con el técnico y el estado actual de la resolución.',
    ],
    'create' => [
        'title' => '1. ¿Cómo crear un nuevo Ticket?',
        'step1' => 'Sigue estos pasos para reportar una incidencia:',
        'list' => [
            '1' => [
                'title' => 'Ir a la sección Tickets:',
                'text' => 'En el menú lateral izquierdo, haz clic en',
            ],
            '2' => [
                'title' => 'Botón Crear:',
                'text' => 'Haz clic en el botón',
                'suffix' => 'situado en la parte superior derecha de la tabla.'
            ],
            '3' => [
                'title' => 'Completar el Formulario:',
                'li1' => [
                    'text' => '(Obligatorio) Escribe un resumen breve y claro del problema (ej. "Error al imprimir factura"). Evita títulos genéricos como "Ayuda" o "Problema".'
                ],
                'li2' => [
                    'text' => '(Obligatorio) Explica qué sucede. Incluye mensajes de error si los hay.',
                    'alert' => '<strong>Importante:</strong> Este campo tiene un límite de <strong>255 caracteres</strong>.<br>Si necesitas extenderte más, crea el ticket con un resumen breve y añade todos los detalles necesarios usando un <strong>Comentario</strong> (que permite texto ilimitado) una vez creado.'
                ],
                'li3' => [
                    'text' => 'Selecciona qué tan urgente es. <i>Úsalo con responsabilidad</i>; marcar todo como "Alta" puede retrasar la gestión.'
                ],
                'li4' => [
                    'text' => 'Elige la categoría que mejor se ajuste (ej. Incidencia Técnica, Consulta, etc.).'
                ],
                'note' => '<strong>Nota sobre Archivos:</strong> Actualmente no es posible adjuntar ficheros directamente. Por favor, describe el contenido o usa enlaces externos si es necesario.',
            ],
            '4' => [
                'title' => 'Enviar:',
                'text' => 'Haz clic en el botón <strong>Guardar</strong>. El sistema te redirigirá a la lista de tickets y verás un mensaje de confirmación.'
            ]
        ],
        'img_caption' => 'Ejemplo del formulario para crear un nuevo ticket'
    ],
    'list' => [
        'title' => '2. Ver y Buscar mis Tickets',
        'intro' => 'En la pantalla principal de "Tickets" verás un listado de todos tus tickets creados, ordenados del más reciente al más antiguo.',
        'img_caption' => 'Ejemplo de la tabla donde se listan los tickets',
        'table_title' => 'La Tabla de Tickets',
        'table_intro' => 'Cada fila representa un ticket e incluye columnas clave:',
        'columns' => [
            'id' => '<strong>ID:</strong> Número único de identificación del ticket (útil para referencias).',
            'title' => '<strong>Título:</strong> El asunto del ticket.',
            'status' => '<strong>Estado:</strong> Estado actual del proceso (ver sección Estados).',
            'priority' => '<strong>Prioridad y Tipo:</strong> Clasificación del ticket.',
            'actions' => '<strong>Acciones:</strong> Botones para interactuar con el ticket.'
        ],
        'search_title' => 'Buscador',
        'search_text' => 'Si tienes muchos tickets, usa la barra de búsqueda en la parte superior de la lista. Escribe una palabra clave del título (ej. "impresora") y presiona "Enter" o el botón de buscar. Esto filtrará la lista para mostrar solo las coincidencias.'
    ],
    'states' => [
        'title' => '3. Ciclo de Vida y Estados del Ticket',
        'intro' => 'Un ticket pasa por varios estados desde que nace hasta que se cierra. Entenderlos es vital para saber qué se espera de ti:',
        'open' => 'Abierto / Pendiente',
        'open_desc' => 'El ticket ha sido creado y enviado al sistema correctamente. Los administradores pueden verlo, pero aún no han comenzado a trabajar en él o están en proceso de triage y asignación.',
        'progress' => 'En Progreso / Asignado',
        'progress_desc' => 'Un administrador ha sido asignado a tu caso y está trabajando en él. Es probable que recibas comentarios solicitando más información. Revisa tus notificaciones.',
        'resolved' => 'Resuelto',
        'resolved_desc' => 'El administrador indica que ha solucionado el problema.',
        'resolved_action' => '<strong>¡TU TURNO!</strong> En este punto, se requiere tu confirmación.',
        'resolved_list' => [
            '1' => 'Si funciona: Debes usar la opción <strong>"Validar"</strong> para cerrar el ticket.',
            '2' => 'Si NO funciona: Debes comentar indicando que el fallo persiste, para que el administrador siga trabajando.'
        ],
        'closed' => 'Cerrado',
        'closed_desc' => 'El proceso ha finalizado. El ticket queda guardado en tu historial como referencia, pero ya no admite más cambios, comentarios ni ediciones.'
    ],
    'detail' => [
        'title' => '4. Pantalla de Detalle: Estructura Completa',
        'intro' => 'La pantalla de detalle del ticket se ha diseñado para que tengas todo a mano. Está dividida en tres áreas principales (Izquierda, Derecha e Inferior). A continuación explicamos cada una:',
        'img_caption' => '<em>Vista general: Izquierda (Info), Derecha (Nuevo mensaje), Abajo (Historial).</em>',
        'zone_a' => [
            'title' => 'A. Zona Izquierda: Información y Validación',
            'text' => 'Este panel contiene la "ficha técnica" de tu incidencia:',
            'list' => [
                '1' => '<strong>Título y Descripción:</strong> El problema tal como lo reportaste.',
                '2' => '<strong>Estado y Prioridad:</strong> Badges de color indicando la situación actual.',
                '3' => '<strong>Fechas:</strong> Creación y última actualización.'
            ],
            'validation' => [
                'title' => 'Área de Validación (¡Importante!)',
                'text' => 'Solo aparece cuando el estado es <strong>Resolved</strong>.',
                'validate' => '<span class="badge badge-success"><i class="fas fa-check"></i> Validar</span>: Confirma que la solución funciona. El ticket se cerrará (Closed).',
                'reject' => '<span class="badge badge-danger"><i class="fas fa-times"></i> Rechazar</span>: Indica que NO funciona. El ticket volverá a "Pendiente".'
            ]
        ],
        'zone_b' => [
            'title' => 'B. Zona Derecha: Agregar Comentarios',
            'text' => 'Usa este formulario para comunicarte con el soporte. Es el canal oficial para añadir información.',
            'usage' => '¿Cuándo usarlo?',
            'list' => [
                '1' => 'Para responder preguntas del técnico.',
                '2' => 'Para adjuntar nuevos datos o errores.',
                '3' => 'Para preguntar "¿Cómo va mi caso?".'
            ],
            'footer' => 'Simplemente escribe y pulsa <strong>"Agregar Comentario"</strong>.'
        ],
        'zone_c' => [
            'title' => 'C. Zona Inferior: Historial de Conversación',
            'text' => 'Debajo de los paneles superiores verás la <strong>Línea de Tiempo (Timeline)</strong>. Aquí queda registrado todo el histórico del ticket.',
            'list' => [
                '1' => '<strong>Todo en un lugar:</strong> Verás tus mensajes y las respuestas de los administradores intercaladas por fecha.',
                '2' => '<strong>Identificación:</strong>',
                'sublist' => [
                    '1' => 'Tus mensajes tienen botones de <i class="fas fa-edit text-primary"></i> Editar y <i class="fas fa-trash text-danger"></i> Eliminar.',
                    '2' => 'Las respuestas del Admin aparecen con su nombre y cabecera distintiva.'
                ]
            ],
            'img_caption' => 'Ejemplo de conversación en el ticket'
        ]
    ],
    'advanced' => [
        'title' => '5. Editar y Eliminar (Gestión Avanzada)',
        'intro' => 'Es posible que necesites corregir información inicial o cancelar una solicitud por error. Aquí te explicamos cómo funcionan estos procesos críticos.',
        'edit' => [
            'title' => 'A. Editar un Ticket',
            'subtitle' => 'Disponible mientras el ticket no esté <strong>Cerrado</strong>.',
            'step1' => 'Haz clic en el botón <span class="badge badge-warning"><i class="fas fa-pencil-alt"></i> Editar</span> en la tabla principal.',
            'step2' => 'Se abrirá un formulario similar al de creación, pero con tus datos cargados.',
            'step2_list' => '<em>Puedes modificar:</em> Título, Descripción, Prioridad y Tipo.',
            'step3' => 'Al pulsar <strong>Actualizar</strong>, volverás al listado.',
            'success_title' => 'Confirmación de Éxito:',
            'success_text' => 'Verás un mensaje verde en la parte superior:<br><em>"Ticket actualizado correctamente."</em>',
            'img_caption' => 'Ejemplo del mensaje de confirmación tras editar un ticket'
        ],
        'delete' => [
            'title' => 'B. Eliminar un Ticket',
            'warning' => '<strong><i class="fas fa-exclamation-triangle"></i> ¡Advertencia!</strong> Esta acción es irreversible. El ticket desaparecerá de tu historial y del panel del administrador.',
            'step1' => 'Haz clic en el botón <span class="badge badge-danger"><i class="fas fa-trash"></i> Eliminar</span>.',
            'step2' => '<strong>Paso de Seguridad:</strong> El navegador mostrará una ventana emergente (Pop-up) preguntando:<br><em>"¿Estás seguro de eliminar este ticket?"</em>',
            'step3' => 'Si aceptas, ocurrirá lo siguiente:',
            'step3_list' => [
                '1' => 'Aparecerá una alerta confirmando: <em>"Ticket eliminado"</em>.',
                '2' => 'La tabla se actualizará automáticamente y la fila desaparecerá.'
            ],
            'img_caption' => 'Ejemplo del mensaje de confirmación'
        ]
    ],
    'introduction_page' => [
        'title' => 'Ayuda · Introducción',
        'header' => 'Introducción y Primeros Pasos',
        'breadcrumbs' => 'Ayuda',
        'welcome' => [
            'title' => 'Bienvenido al Portal de Usuarios',
            'text1' => 'Bienvenido a la plataforma de gestión de incidencias y soporte (Tickets). Esta herramienta ha sido diseñada para centralizar, organizar y agilizar toda la comunicación entre tú y el equipo de soporte técnico/administración.',
            'text2' => 'A través de este portal, podrás reportar problemas, realizar solicitudes de servicio, consultar el estado de tus peticiones anteriores y mantener una comunicación directa y registrada con los responsables de resolver tus incidencias.',
            'can_do' => [
                'title' => 'Lo que PUEDES hacer:',
                'list' => [
                    'create' => '<strong>Crear Tickets:</strong> Abrir nuevas solicitudes de soporte detallando tu problema o requerimiento.',
                    'history' => '<strong>Consultar Historial:</strong> Ver todos los tickets que has creado, filtrarlos y buscar por palabras clave.',
                    'comment' => '<strong>Comentar:</strong> Dialogar con los agentes mediante un hilo de comentarios dentro de cada ticket.',
                    'notifications' => '<strong>Recibir Notificaciones:</strong> Estar al tanto de actualizaciones, cambios de estado o respuestas en tus tickets.',
                    'validate' => '<strong>Validar Soluciones:</strong> Confirmar si la solución propuesta por el agente ha resuelto tu problema.',
                    'edit' => '<strong>Editar/Eliminar:</strong> Modificar la información de tus tickets o eliminarlos (bajo ciertas condiciones).'
                ]
            ],
            'cannot_do' => [
                'title' => 'Lo que NO puedes hacer:',
                'list' => [
                    'view_others' => 'Ver los tickets de otros usuarios (por privacidad y seguridad).',
                    'assign' => 'Asignar tickets a administradores específicos (el sistema o los administradores se encargan de la asignación).',
                    'modify_closed' => 'Modificar un ticket una vez que ha sido cerrado (aunque podrás consultarlo).'
                ]
            ]
        ],
        'dashboard' => [
            'title' => 'Panel de Control del usuario (Dashboard)',
            'text' => 'Al iniciar sesión, accederás inmediatamente a tu <strong>Panel de Control</strong>. Esta es tu "base de operaciones".',
            'img_caption' => 'Ejemplo del Panel de Control del Usuario',
            'green_box' => [
                 'title' => 'Tickets Abiertos',
                 'desc' => 'En color <strong>Verde</strong>. Tickets activos que están siendo atendidos.'
            ],
            'blue_box' => [
                 'title' => 'Tickets Resueltos',
                 'desc' => 'En color <strong>Azul</strong>. Solucionados pero pendientes de que los valides.'
            ],
            'yellow_box' => [
                 'title' => 'Tickets Pendientes',
                 'desc' => 'En color <strong>Amarillo</strong>. Tickets esperando acción.'
            ],
            'components' => [
                'title' => 'Componentes del Panel:',
                'summary_dt' => 'Resumen de Estado',
                'summary_dd' => 'Tres tarjetas de colores (Verde, Azul, Amarillo) que te dan un vistazo rápido de cuántos tickets tienes en cada situación.',
                'latest_dt' => 'Últimos Tickets',
                'latest_dd' => 'Una lista en la parte inferior con los tickets que han tenido actividad reciente. Incluye botones rápidos para <span class="badge badge-primary"><i class="fas fa-eye"></i> Ver</span> y <span class="badge badge-warning"><i class="fas fa-edit"></i> Editar</span>.',
                'create_dt' => 'Crear Rápido',
                'create_dd' => 'Un botón en la parte superior derecha de la tarjeta principal para abrir una nueva incidencia al instante.'
            ]
        ],
        'profile' => [
            'title' => 'Mi Perfil',
            'text1' => 'Puedes acceder a tu perfil haciendo clic en tu nombre en la esquina superior derecha y seleccionando el icono <strong><i class="fas fa-user fa-2x mb-2"></i></strong> o bien haciendo click sobre <strong>tu nombre en el menu lateral</strong>.',
            'text2' => 'En esta sección podrás visualizar tus datos registrados en el sistema:',
            'list' => [
                'name' => 'Nombre completo.',
                'email' => 'Correo electrónico asociado.',
                'date' => 'Fecha de registro.'
            ],
            'note' => '<strong>Nota Importante:</strong> Por razones de seguridad, la edición de datos sensibles (como el correo electrónico) está restringida. Si necesitas corregir un dato erróneo, por favor crea un ticket solicitándolo a un administrador.',
            'img1_caption' => 'Ejemplo del menú de opciones',
            'img2_caption' => 'Ejemplo de acceso al perfil desde el menú lateral'
        ],
        'support' => [
            'title' => '¿Necesitas más ayuda?',
            'text' => 'Esta sección de ayuda se divide en tres partes fundamentales. Te recomendamos leerlas para dominar la herramienta:',
            'buttons' => [
                'intro' => 'Introducción',
                'tickets' => 'Tickets',
                'notifications' => 'Notificaciones',
                'profile' => 'Mi Perfil'
            ]
        ]
    ],
    'notifications_page' => [
        'title' => 'Documentación - Notificaciones',
        'header' => 'Notificaciones del Usuario',
        'breadcrumbs' => 'Mis Notificaciones',
        'intro' => [
            'title' => '¿Qué son las notificaciones?',
            'text' => 'El sistema de notificaciones te mantiene informado automáticamente sobre cualquier cambio importante en tus tickets. No necesitas revisar cada ticket manualmente: la aplicación te avisa cuando algo sucede.',
        ],
        'access' => [
            'title' => 'Cómo acceder a tus notificaciones',
            'subtitle' => 'Hay <strong>dos formas</strong> de ver tus notificaciones:',
            'option1' => [
                'title' => 'Opción 1: Desde el icono de la campana',
                'text' => 'En la <strong>parte superior derecha</strong> de la pantalla, junto al selector de idioma y tu foto de perfil, encontrarás un icono de campana.',
                'alert_title' => 'Indicador de notificaciones nuevas:',
                'list' => [
                    '1' => 'Si tienes notificaciones sin leer, aparece un <strong>círculo amarillo con un número</strong> que indica cuántas notificaciones nuevas tienes.',
                    '2' => 'Ejemplo: Si ves un "5" sobre la campana, significa que tienes 5 notificaciones pendientes de revisar.'
                ],
                'action' => '<strong>Para acceder:</strong> Haz clic en el icono de la campana y serás redirigido a la página completa de notificaciones.'
            ],
            'option2' => [
                'title' => 'Opción 2: Desde el menú lateral',
                'text' => 'En el menú de navegación del lado izquierdo, busca la opción <strong>"Notificaciones"</strong> (con un icono de campana). Haz clic ahí para acceder.'
            ]
        ],
        'screen' => [
            'title' => 'La pantalla de notificaciones',
            'intro' => 'Cuando entras a esta sección, verás:',
            'location' => [
                'title' => 'Ubicación en el sistema',
                'text' => 'En la parte superior aparece una ruta que te muestra dónde estás:',
                'path' => 'Inicio / Mis Notificaciones',
                'note' => 'Puedes hacer clic en "Inicio" para volver al panel principal.'
            ],
            'table' => [
                'title' => 'La tabla de notificaciones',
                'intro' => 'Todas tus notificaciones se muestran en una <strong>tabla organizada</strong> con <strong>4 columnas</strong>:',
                'headers' => [
                    'col' => 'Columna',
                    'what' => 'Qué muestra',
                    'example' => 'Ejemplo'
                ],
                'columns' => [
                    'type' => 'Tipo',
                    'type_desc' => 'El tipo de evento que ocurrió',
                    'type_example' => 'Comentario, Estado, Creado',
                    'content' => 'Contenido',
                    'content_desc' => 'Un resumen de lo que pasó',
                    'content_example' => '"Se ha agregado un nuevo comentario en tu ticket"',
                    'date' => 'Fecha',
                    'date_desc' => 'Cuándo ocurrió el evento',
                    'date_example' => '12/06/2025 11:53',
                    'actions' => 'Acciones',
                    'actions_desc' => 'Botones para interactuar',
                    'actions_example' => 'Ver detalles, Marcar como leída'
                ],
            ]
        ],
        'types' => [
            'title' => 'Tipos de notificaciones que puedes recibir',
            'comment' => [
                'title' => 'Nuevo Comentario',
                'when' => '<strong>Cuándo la recibes:</strong> Cuando un administrador escribe un comentario en uno de tus tickets.',
                'what' => '<strong>Qué dice:</strong> "Se ha agregado un nuevo comentario en tu ticket"',
                'why' => '<strong>Por qué es útil:</strong> Te avisa que alguien respondió a tu solicitud sin tener que revisar todos tus tickets uno por uno.'
            ],
            'status' => [
                'title' => 'Cambio de Estado',
                'when' => '<strong>Cuándo la recibes:</strong> Cuando un administrador cambia el estado de tu ticket (por ejemplo, de "Pendiente" a "En Proceso" o "Resuelto").',
                'what' => '<strong>Qué dice:</strong> "El ticket con ID [número] ha sido actualizado"',
                'why' => '<strong>Por qué es útil:</strong> Sabes inmediatamente que tu ticket está siendo atendido o que ya fue resuelto.'
            ],
            'created' => [
                'title' => 'Ticket Creado',
                'when' => '<strong>Cuándo la recibes:</strong> Cuando creas un nuevo ticket exitosamente.',
                'what' => '<strong>Qué dice:</strong> "Nuevo ticket creado con ID [número]"',
                'why' => '<strong>Por qué es útil:</strong> Confirma que tu solicitud fue registrada correctamente en el sistema.'
            ],
            'closed' => [
                'title' => 'Ticket Cerrado',
                'when' => '<strong>Cuándo la recibes:</strong> Cuando un administrador marca tu ticket como cerrado.',
                'what' => '<strong>Qué dice:</strong> "El ticket ha sido cerrado"',
                'why' => '<strong>Por qué es útil:</strong> Te informa que el problema se considera resuelto y el ticket ya no está activo.'
            ],
            'reopened' => [
                'title' => 'Ticket Reabierto',
                'when' => '<strong>Cuándo la recibes:</strong> Cuando un ticket que estaba cerrado se vuelve a abrir (por ti o por un administrador).',
                'what' => '<strong>Qué dice:</strong> "El ticket ha sido reabierto"',
                'why' => '<strong>Por qué es útil:</strong> Sabes que el problema se está revisando nuevamente.'
            ]
        ],
        'tools' => [
            'title' => 'Herramientas de la tabla',
            'intro' => 'La tabla incluye varias funciones que te ayudan a organizar y encontrar información:',
            'search' => [
                'title' => 'Búsqueda',
                'text' => 'En la esquina superior derecha hay un campo que dice <strong>"Buscar:"</strong>',
                'list' => [
                    '1' => 'Escribe cualquier palabra (por ejemplo, "comentario" o el nombre de un ticket)',
                    '2' => 'La tabla filtra automáticamente y muestra solo las notificaciones que coinciden',
                    '3' => 'Borra el texto para ver todas las notificaciones nuevamente'
                ]
            ],
            'records' => [
                'title' => 'Cantidad de registros por página',
                'text' => 'En la esquina superior izquierda verás <strong>"Mostrar 10 registros"</strong> (con un menú desplegable). Puedes cambiar cuántas notificaciones ver en cada página:',
                'list' => [
                    '10' => '10 registros (valor por defecto)',
                    '25' => '25 registros',
                    '50' => '50 registros',
                    '100' => '100 registros'
                ],
                'note' => 'Esto es útil si tienes muchas notificaciones y quieres verlas todas sin cambiar de página constantemente.'
            ],
            'pagination' => [
                'title' => 'Paginación',
                'text' => 'Si tienes más notificaciones de las que caben en una página, verás en la parte inferior:',
                'example' => 'Mostrando 1 a 10 de 25 registros [Anterior] [1] [2] [3] [Siguiente]',
                'list' => [
                    'nav' => '<strong>Anterior/Siguiente:</strong> Navega entre páginas',
                    'jump' => '<strong>Números:</strong> Salta directamente a una página específica',
                    'info' => '<strong>Indicador:</strong> Te muestra cuántas notificaciones hay en total'
                ]
            ],
            'sort' => [
                'title' => 'Ordenar columnas',
                'text' => 'Haz clic en el encabezado de cualquier columna (Tipo, Contenido o Fecha) para ordenar las notificaciones:',
                'list' => [
                    'asc' => '<strong>Primer clic:</strong> Ordena de forma ascendente (A→Z, más antigua→más reciente)',
                    'desc' => '<strong>Segundo clic:</strong> Ordena de forma descendente (Z→A, más reciente→más antigua)',
                    'visual' => '<strong>Indicador visual:</strong> Aparece una flechita que muestra el orden actual'
                ]
            ]
        ],
        'actions' => [
            'title' => 'Botones de acciones',
            'intro' => 'Cada notificación tiene <strong>dos botones</strong> en la columna "Acciones":',
            'details' => [
                'title' => 'Ver Detalles (botón azul con ícono de ojo)',
                'what' => '<strong>Qué hace:</strong> Abre una ventana emergente con toda la información completa de la notificación.',
                'when' => '<strong>Cuándo usarlo:</strong> Cuando quieres saber exactamente qué pasó, quién hizo el cambio, y más detalles.'
            ],
            'mark' => [
                'title' => 'Marcar como leída / Marcar como no leída',
                'desc' => 'Este botón cambia según si la notificación ya fue leída o no:',
                'unread_state' => [
                    'title' => 'Si la notificación NO ha sido leída:',
                    'list' => [
                        'visual' => 'Aparece un botón <strong>azul</strong> con un ícono de check',
                        'hover' => 'Dice "Marcar como leída" (al pasar el mouse)',
                        'action' => '<strong>Qué hace:</strong> Al hacer clic, marca la notificación como leída. El número en la campana disminuye.'
                    ]
                ],
                'read_state' => [
                    'title' => 'Si la notificación YA fue leída:',
                    'list' => [
                        'visual' => 'Aparece un botón <strong>gris</strong> con un ícono de X',
                        'hover' => 'Dice "Marcar como no leída" (al pasar el mouse)',
                        'action' => '<strong>Qué hace:</strong> Al hacer clic, marca la notificación como no leída nuevamente. El número en la campana aumenta.'
                    ]
                ]
            ]
        ],
        'modal' => [
            'title' => 'Ventana de detalles (Modal)',
            'intro' => 'Esta es la ventana emergente que aparece cuando haces clic en <strong>"Ver Detalles"</strong>.',
            'look' => [
                'title' => 'Cómo se ve',
                'desc' => 'La ventana aparece <strong>en el centro de la pantalla</strong>, con un fondo oscurecido detrás. Se divide en tres partes:',
                'part1' => [
                    'title' => '1. Parte superior (Título)',
                    'text' => 'Muestra el <strong>mensaje principal</strong> de la notificación. Por ejemplo: "Notificación". En la esquina superior derecha hay una <strong>X</strong> para cerrar la ventana.'
                ],
                'part2' => [
                    'title' => '2. Parte central (Contenido detallado)',
                    'text' => 'Aquí se muestra información completa que varía según el tipo de notificación:'
                ],
                'accordion' => [
                    'comment' => 'Si es un Comentario',
                    'comment_content' => "Se ha agregado un nuevo comentario en tu ticket\n\n────────────────────────────────────────\n\nComentario de: Iván\nEn ticket: \"Ticket de prueba 3\"\nComentario: \"Este es un comentario de ejemplo del administrador\"\n\n────────────────────────────────────────\n\nFecha: 13/06/2025 11:20     [Ver Ticket]",
                     'status' => 'Si es un Cambio de Estado',
                     'status_content' => "El ticket con ID 22 ha sido actualizado\n\n────────────────────────────────────────\n\nTicket: \"No se puede iniciar sesión\"\nNuevo estado: En Proceso\nPrioridad: Alta\nActualizado por: Admin Iván\n\n────────────────────────────────────────\n\nFecha: 12/06/2025 09:30     [Ver Ticket]",
                     'created' => 'Si es un Ticket Creado',
                     'created_content' => "Nuevo ticket creado con ID 29\n\n────────────────────────────────────────\n\nCreado por: Luis\nTicket: \"Error al guardar archivo\"\n\n────────────────────────────────────────\n\nFecha: 10/06/2025 14:22     [Ver Ticket]",
                     'closed' => 'Si es un Ticket Cerrado',
                     'closed_content' => "El ticket ha sido cerrado\n\n────────────────────────────────────────\n\nTicket cerrado: \"Problema con la base de datos\"\nCerrado por: Admin Carlos\n\n────────────────────────────────────────\n\nFecha: 08/06/2025 16:45     [Ver Ticket]",
                     'reopened' => 'Si es un Ticket Reabierto',
                     'reopened_content' => "El ticket ha sido reabierto\n\n────────────────────────────────────────\n\nTicket reabierto: \"Solicitud de nueva funcionalidad\"\nReabierto por: Luis\n\n────────────────────────────────────────\n\nFecha: 09/06/2025 10:15     [Ver Ticket]"
                ],
                'part3' => [
                    'title' => '3. Parte inferior (Botones)',
                    'text' => 'Siempre hay un botón <strong>"Cerrar"</strong> (gris) que cierra la ventana y te devuelve a la tabla de notificaciones. Si la notificación está relacionada con un ticket específico, también aparece un botón <strong>"Ver Ticket"</strong> que te lleva directamente a ese ticket.'
                ]
            ]
        ],
        'example' => [
            'title' => 'Ejemplo de uso completo',
            'intro' => 'Imagina esta situación paso a paso:',
            'step1' => [
                'title' => '1. Recibes una notificación',
                'text' => 'Un administrador comenta en tu ticket. Automáticamente: El icono de campana en la parte superior muestra un número en círculo amarillo (cuántas notificaciones nuevas tienes).'
            ],
            'step2' => [
                'title' => '2. Abres las notificaciones',
                'text' => 'Haces clic en la campana y llegas a la tabla de notificaciones. Ves una fila nueva con: Tipo, Contenido, Fecha.'
            ],
            'step3' => [
                'title' => '3. Ves los detalles',
                'text' => 'Haces clic en el botón azul con el ojo (Ver detalles). Se abre la ventana emergente que muestra toda la información detallada.'
            ],
            'step4' => [
                'title' => '4. Vas al ticket',
                'text' => 'Haces clic en <strong>"Ver Ticket"</strong> en la ventana emergente. Te lleva directamente a la página de ese ticket (donde puedes leer y responder).'
            ],
            'step5' => [
                'title' => '5. Marcas como leída',
                'text' => 'Vuelves a las notificaciones y haces clic en el botón azul de check (Marcar como leída). Ahora el botón se vuelve gris con una X y el contador de la campana disminuye.'
            ]
        ],
        'empty' => [
            'title' => 'Si no tienes notificaciones',
            'text' => 'Cuando entras a esta sección y no tienes ninguna notificación, verás un mensaje:<br><br><i class="fas fa-info-circle"></i> No tienes notificaciones.<br><br>Esto significa que todo está tranquilo: no ha habido cambios en tus tickets recientemente.'
        ],
        'language' => [
            'title' => 'Cambio de idioma',
            'text' => 'Toda la sección de notificaciones está disponible en <strong>Español</strong> e <strong>Inglés</strong>. Para cambiar el idioma, usa el selector <strong>ES</strong> / <strong>EN</strong> en la barra superior de navegación. Los textos que cambian incluyen: Títulos, Botones, Mensajes, Opciones de búsqueda.'
        ]
    ],
    'profile_page' => [
        'title' => 'Ayuda · Mi Perfil',
        'header' => 'Gestión del Perfil y Cuenta',
        'breadcrumbs' => 'Perfil',
        'info' => [
            'title' => 'Ver mi Información',
            'text1' => 'Para acceder a tus datos personales registrados en la aplicación:',
            'step1' => 'Haz clic en tu <strong>Nombre</strong> en la esquina superior derecha (barra superior).',
            'step2' => 'Selecciona la opción <strong>"Mi Perfil"</strong> en el menú desplegable.',
            'text2' => 'En esta pantalla podrás visualizar:',
            'list' => [
                'name' => '<strong>Nombre Completo:</strong> Tal como figura en el sistema.',
                'email' => '<strong>Correo Electrónico:</strong> Tu dirección de email vinculada para notificaciones.',
                'tickets' => '<strong>Tickets Creados:</strong> Un contador histórico de todas tus solicitudes.'
            ]
        ],
        'edit' => [
            'title' => '¿Cómo edito mis datos?',
            'text1' => 'Actualmente, la edición directa de nombre o correo electrónico está deshabilitada por razones de seguridad y consistencia de datos corporativos.',
            'text2' => 'Si detectas un error en tu información o necesitas actualizar tu email, por favor <strong>crea un ticket</strong> de tipo "Consulta" o "Administrativo" solicitando el cambio al equipo de soporte.'
        ],
        'security' => [
            'title' => 'Seguridad y Sesión',
            'logout_title' => 'Cerrar Sesión',
            'logout_text' => 'Si utilizas un ordenador compartido o público, es crucial que cierres tu sesión al terminar.',
            'logout_step1' => 'Haz clic en el icono de <strong>"Puerta"</strong> o "Cerrar Sesión" en la barra superior derecha.',
            'logout_step2' => 'O despliega el menú de usuario y selecciona "Salir".',
            'password_title' => 'Cambio de Contraseña',
            'password_text' => 'Si has olvidado tu contraseña o deseas cambiarla, deberás utilizar el enlace "¿Olvidaste tu contraseña?" en la pantalla de inicio de sesión, o contactar con un administrador para que te envíe un enlace de restablecimiento.'
        ],
        'language' => [
            'title' => 'Idioma',
            'text' => 'La aplicación está disponible en varios idiomas (Español e Inglés). Puedes cambiar el idioma de la interfaz en cualquier momento usando el selector (icono de bandera) situado en la barra superior.'
        ]
    ],
    'admin_intro_page' => [
        'title' => 'Manual Operativo · Introducción y Dashboard',
        'header' => 'Manual del Administrador: Introducción y Dashboard',
        'subtitle' => 'Guía completa de familiarización con la interfaz de gestión IT y el cuadro de mando principal.',
        'welcome' => [
            'title' => 'Bienvenida al Centro de Resolución',
            'text' => 'Bienvenido al Panel de Administración del Sistema de Tickets. Esta herramienta ha sido diseñada no solo como un repositorio de problemas, sino como un <strong>Centro de Resolución de Incidencias</strong>.',
            'role_desc' => 'Como administrador, usted tiene la responsabilidad de orquestar la solución a los problemas reportados por los usuarios finales. El sistema centraliza todas las solicitudes, eliminando el caos de los correos electrónicos dispersos, llamadas telefónicas no registradas y mensajes de pasillo.',
            'pillars_title' => 'Pilares del Sistema:',
            'pillars' => [
                'centralization' => '<strong>Centralización:</strong> Toda la información técnica y comunicación en un solo lugar.',
                'traceability' => '<strong>Trazabilidad:</strong> Cada acción queda registrada con fecha, hora y autor en el historial.',
                'efficiency' => '<strong>Eficiencia:</strong> Flujos de trabajo claros para asignar, gestionar y resolver incidencias.'
            ],
            'goal_title' => 'Objetivo del Sistema',
            'goal_text' => 'Minimizar el tiempo de inactividad de los usuarios (Downtime) y maximizar la transparencia en la gestión del departamento de IT.'
        ],
        'dashboard' => [
            'title' => 'El Dashboard Principal',
            'intro' => 'Al iniciar sesión, lo primero que verá es el <strong>Dashboard</strong>. Este panel es su centro de mando para supervisar las operaciones del sistema de soporte. Proporciona acceso rápido a métricas clave, eventos recientes y notificaciones pendientes, todo en un vistazo.',
            'img_caption' => 'Fig 1.1 - Panel de control principal del administrador',
            'cards_title' => 'Tarjetas de Acceso Rápido',
            'cards_note' => '<strong>Nota:</strong> Las tarjetas disponibles dependen de su tipo de cuenta. Los <span class="badge badge-danger">Superadministradores</span> ven todas las métricas; los administradores normales tienen una vista simplificada.',
            'superadmin_note' => '<strong>Para Superadministradores:</strong> El dashboard muestra 4 tarjetas con acceso directo a las secciones principales de gestión.',
            'users_card' => [
                'title' => 'Usuarios Registrados',
                'desc' => 'Suma total de usuarios normales y administradores. Click para gestionar usuarios.'
            ],
            'admins_card' => [
                'title' => 'Administradores',
                'desc' => 'Personal técnico con acceso administrativo. Click para gestionar admins.'
            ],
            'assigned_tickets_card' => [
                'title' => 'Tickets Asignados',
                'desc' => 'Tickets con un administrador responsable. Click para ver asignaciones.'
            ],
            'total_tickets_card' => [
                'title' => 'Total de Tickets',
                'desc' => 'Todos los tickets registrados en el sistema. Click para gestionar tickets.'
            ],
            'events_title' => 'Últimos Eventos del Sistema',
            'events_text' => 'En la parte central encontrará una tabla con los <strong>5 eventos más recientes</strong> del historial. Esto incluye creación de tickets, actualizaciones de estado, comentarios y asignaciones. Cada evento muestra: tipo, descripción, usuario responsable y fecha/hora.',
            'events_link' => 'Puede acceder al <strong>historial completo</strong> mediante el botón "Ver historial completo" en la esquina superior derecha de la tarjeta.',
            'events_caption' => 'Ejemplo de tabla de eventos recientes',
            'notifications_title' => 'Notificaciones Recientes',
            'notifications_text' => 'En la parte inferior se muestran las <strong>5 notificaciones no leídas más recientes</strong>. Estas alertas le informan de: nuevos tickets creados, comentarios añadidos, cambios de estado y cierres/reaperturas.',
            'notifications_link' => 'Use el botón "Ver todas" para acceder a su bandeja completa de notificaciones y marcarlas como leídas.',
            'notifications_caption' => 'Ejemplo de tabla de notificaciones recientes'
        ],
        'navigation' => [
            'title' => 'Estructura de Navegación',
            'sidebar_title' => 'Menú Principal (Sidebar)',
            'sidebar_desc' => 'La barra lateral izquierda es su herramienta de navegación principal. Está dividida en secciones lógicas para facilitar el acceso rápido a las funciones más usadas:',
            'dashboard' => [
                'term' => 'Dashboard',
                'desc' => 'Vuelta al inicio. Resumen gráfico de la situación actual.'
            ],
            'tickets' => [
                'term' => 'Tickets',
                'desc' => 'El núcleo del trabajo diario.',
                'list' => [
                    'manage' => '<strong>Gestionar tickets:</strong> Listado global de incidencias.',
                    'assigned' => '<strong>Tickets asignados:</strong> Su cola de trabajo personal.'
                ]
            ],
            'users' => [
                'term' => 'Usuarios',
                'desc' => '<em>(Solo Superadmin)</em> Gestión de altas, bajas y modificación de datos de usuarios y personal técnico.'
            ],
            'config' => [
                'term' => 'Config.',
                'desc' => 'Definición de Tipos de incidencias y ajustes globales del sistema.'
            ],
            'icons_title' => 'Guía Rápida de Iconografía',
            'icons_desc' => 'Para mantener la interfaz limpia, utilizamos iconos estandarizados para las acciones comunes. Familiarícese con ellos:',
            'table' => [
                'icon' => 'Icono',
                'action' => 'Acción',
                'desc' => 'Descripción',
                'view' => ['action' => 'Ver / Detalles', 'desc' => 'Accede a la ficha completa para leer y revisar sin editar.'],
                'edit' => ['action' => 'Editar', 'desc' => 'Modifica los datos del registro (título, estado, prioridad).'],
                'resolve' => ['action' => 'Resolver', 'desc' => 'Acción rápida para marcar un ticket como solucionado.'],
                'delete' => ['action' => 'Eliminar', 'desc' => 'Borrado permanente. Requiere confirmación adicional.']
            ]
        ],
        'tips' => [
            'title' => 'Consejos de Productividad',
            'list' => [
                'search' => 'Utilice el <strong>buscador global</strong> en la parte superior derecha de las tablas de datos para encontrar usuarios o tickets rápidamente por nombre o ID.',
                'close' => 'Mantenga el dashboard limpio <strong>cerrando definitivamente</strong> los tickets que han sido resueltos y validados por el usuario.',
                'notifications' => 'Revise la campana de <strong>Notificaciones</strong> diariamente para no dejar ninguna interacción de usuario sin respuesta.'
            ]
        ]
    ],
    'admin_tickets_page' => [
        'title' => 'Gestión Técnica de Incidencias',
        'intro' => 'El módulo de tickets es el corazón operativo del Help Desk. Aquí se centraliza la comunicación con el usuario y se ejecutan los flujos de resolución. Esta guía detalla los procedimientos estándar para maximizar la eficiencia y cumplir con los acuerdos de nivel de servicio (SLA).',
        'lifecycle' => [
            'title' => '2.1. Ciclo de Vida y Estados del Ticket',
            'desc' => 'El sistema utiliza un autómata de estados estricto para gestionar el flujo de trabajo. Comprender estos estados es vital para mantener la bandeja de entrada organizada:',
            'status' => [
                'new' => '<strong>NUEVO (New):</strong> Estado inicial automático al crearse el ticket. Indica que nadie ha revisado el caso aún. Acción requerida: Triaje inmediato.',
                'open' => '<strong>ABIERTO (Open):</strong> El ticket ha sido asignado a un agente y se está trabajando en él. El SLA de resolución está activo y contando.',
                'pending' => '<strong>PENDIENTE (Pending):</strong> El agente ha solicitado información al usuario y está esperando respuesta. Este estado "congela" el contador del SLA hasta que el cliente contesta.',
                'solved' => '<strong>RESUELTO (Solved):</strong> El agente ha proporcionado una solución definitiva. El sistema enviará una notificación al usuario para que confirme la resolución.',
                'closed' => '<strong>CERRADO (Closed):</strong> Estado final inmutable. El ticket se archiva y no admite nuevas respuestas. Solo puede ser consultado como histórico.',
            ],
            'flow_title' => 'Flujo de Trabajo Recomendado',
            'flow_text' => 'Para una gestión eficiente, se recomienda no dejar tickets en estado "Nuevo" por más de 1 hora. Si la resolución no es inmediata, cambie el estado a "Abierto" para indicar que está siendo procesado, o "Pendiente" si el bloqueo está en el lado del cliente.'
        ],
        'triage' => [
            'title' => '2.2. Protocolos de Asignación y Triaje',
            'desc' => 'El Triaje es el proceso de categorización y asignación inicial. Un ticket mal asignado aumenta drásticamente el tiempo de resolución (TTR).',
            'manual' => '<strong>Asignación Directa (Push):</strong> Un supervisor o dispatcher revisa la cola de "Nuevos" y asigna manualmente el ticket al especialista más adecuado según la categoría (Hardware, Software, Redes).',
            'claim' => '<strong>Auto-Asignación (Pull):</strong> En equipos ágiles, los agentes toman proactivamente los tickets de la bolsa general ("Pool") utilizando el botón "Asignarme a mí".',
            'filters_title' => 'Filtrado de Colas',
            'filters_text' => 'Utilice los filtros superiores de la bandeja de entrada para alternar entre "Mis Tickets" (su responsabilidad directa), "Tickets sin Asignar" (oportunidades de trabajo) y "Todos" (supervisión global).'
        ],
        'sla' => [
            'title' => '2.3. Matriz de Prioridad y SLA',
            'desc' => 'La prioridad define la urgencia del ticket y sus tiempos de respuesta esperados. El sistema puede enviar alertas si estos tiempos se violan.',
            'high' => [
                'tag' => 'ALTA (Crítico)',
                'desc' => 'Incidencias que detienen la operación crítica del negocio o afectan a múltiples usuarios.',
                'time' => 'Tiempos Meta: Respuesta < 1h | Resolución < 4h'
            ],
            'medium' => [
                'tag' => 'MEDIA (Normal)',
                'desc' => 'Degradación del servicio que no detiene la operación, o problemas funcionales para un único usuario.',
                'time' => 'Tiempos Meta: Respuesta < 4h | Resolución < 24h'
            ],
            'low' => [
                'tag' => 'BAJA (Consulta)',
                'desc' => 'Peticiones de información, dudas o sugerencias que no afectan la funcionalidad del sistema.',
                'time' => 'Tiempos Meta: Respuesta < 24h | Resolución < 72h'
            ]
        ],
        'features' => [
            'title' => '2.4. Herramientas de Resolución',
            'desc' => 'Dentro de la vista de detalle del ticket, el agente dispone de un set de herramientas para interactuar:',
            'reply' => '<strong>Respuesta Pública:</strong> Envía un correo electrónico al cliente. Use esto para pedir datos o dar soluciones. Se admite formato enriquecido (negritas, listas, enlaces).',
            'notes' => '<strong>Notas Internas (Privado):</strong> Permite dejar comentarios que SOLO verán otros agentes. Ideal para documentar pasos técnicos, dejar bitácora de llamadas o pedir consejo a compañeros sin alertar al cliente.',
            'files' => '<strong>Adjuntos del Sistema:</strong> Puede subir logs, capturas de pantalla o documentos PDF. El sistema escanea y bloquea extensiones peligrosas (.exe, .sh) automáticamente.'
        ]
    ],
    'admin_users_page' => [
        'title' => 'Administración de Identidad y Accesos (IAM)',
        'intro' => 'Control de cuentas de usuario, roles y permisos de acceso al sistema.',
        'types' => [
            'title' => '3.1. Tipología de Cuentas',
            'desc' => 'El sistema distingue estrictamente entre dos tipos de actores por razones de seguridad y operatividad. Ambos tienen accesos y portales diferenciados.',
            'client_title' => 'Usuario Final (Client)',
            'client_desc' => 'Empleados o clientes que requieren asistencia técnica. Acceden exclusivamente al Portal de Usuario para crear tickets.',
            'admin_title' => 'Administrador (Staff)',
            'admin_desc' => 'Personal técnico encargado de resolver incidencias. Acceden al Panel de Administración (Backoffice) para gestionar operaciones.',
        ],
        'manage_users' => [
            'title' => '3.2. Gestión de Usuarios Finales',
            'desc' => 'Operaciones estándar de administración para la base de datos de clientes.',
            'create' => [
                'title' => 'Alta de Nuevo Usuario',
                'steps' => [
                    '1' => 'Navegue a <strong>Usuarios > Crear Nuevo</strong>.',
                    '2' => 'Complete los campos obligatorios: Nombre completo y Correo electrónico corporativo.',
                    '3' => 'Establezca una contraseña temporal segura.',
                ]
            ],
            'password' => [
                'title' => 'Restablecimiento de Contraseñas',
                'desc' => 'Para resetear, edite el usuario y escriba la nueva clave. Si deja el campo vacío, se mantendrá la actual.'
            ]
        ],
        'superadmin' => [
            'title' => '3.3. Gestión de Staff (Solo Superadmin)',
            'desc' => 'Área restringida para la elevación de privilegios y creación de nuevos agentes de soporte.',
            'warning' => 'Otorgar permisos de administrador permite acceso a datos sensibles de tickets y usuarios. Proceda con cautela.'
        ]
    ],
    'admin_notifications_page' => [
        'title' => 'Documentación - Notificaciones',
        'header' => 'Notificaciones del Administrador',
        'subheader' => 'Gestión de alertas y avisos del sistema para mantener el control de las incidencias.',
        'breadcrumbs' => 'Notificaciones',
        'what_is' => [
            'title' => '¿Qué son las notificaciones de administrador?',
            'text' => 'El sistema de notificaciones es el centro de alerta temprana para el equipo de soporte. Permite a los administradores reaccionar rápidamente ante nuevos incidentes o respuestas de usuarios sin necesidad de monitorizar constantemente la lista de tickets. Cada vez que ocurre un evento relevante en un ticket que te concierne, recibirás un aviso inmediato.'
        ],
        'access' => [
            'title' => 'Cómo acceder a tus notificaciones',
            'intro' => 'Existen <strong>dos métodos principales</strong> para consultar las novedades:',
            'option1' => [
                'title' => 'Opción 1: Desde la Barra Superior (Navbar)',
                'text' => 'Esta es la forma más rápida de ver las últimas novedades mientras trabajas en otras áreas.',
                'indicator' => '<strong>Indicador Visual:</strong>',
                'li1' => 'En la esquina superior derecha, verás un icono de <strong>campana</strong>.',
                'li2' => 'Si hay un círculo amarillo con un número, indica la cantidad de notificaciones <strong>no leídas</strong>.',
                'li3' => 'Al hacer clic, verás un resumen rápido de las últimas notificaciones.',
                'view_all' => 'Para ver el listado completo, haz clic en "Ver todas las notificaciones" al final de ese menú desplegable.'
            ],
            'option2' => [
                'title' => 'Opción 2: Listado Completo',
                'text' => 'Para una gestión más detallada, puedes acceder a la vista de tabla completa donde podrás filtrar, buscar y gestionar alertas antiguas.',
                'box' => 'Accede pulsando "Ver todas" desde la campana o desde el menú lateral si está habilitado.'
            ]
        ],
        'screen' => [
            'title' => 'La Pantalla de Gestión de Notificaciones',
            'text' => 'La vista principal "Mis Notificaciones" está diseñada para procesar grandes volúmenes de alertas de manera eficiente.',
            'table_title' => 'Estructura de la Tabla',
            'table_intro' => 'La información se presenta en 4 columnas clave:',
            'columns' => [
                'col1' => 'Columna', 'col2' => 'Descripción', 'col3' => 'Ejemplo',
                'type' => '<strong>Tipo</strong>',
                'type_desc' => 'Categoría del evento. Ayuda a distinguir urgencias.',
                'type_ex' => '<span class="badge badge-info">Comentario</span>, <span class="badge badge-success">Nuevo Ticket</span>',
                'content' => '<strong>Contenido</strong>',
                'content_desc' => 'Resumen breve de lo ocurrido. Incluye el ID del ticket y el autor de la acción.',
                'content_ex' => '"Nuevo ticket creado con ID 45 por Usuario..."',
                'date' => '<strong>Fecha</strong>',
                'date_desc' => 'Momento exacto en que se generó la alerta.',
                'date_ex' => '10/02/2026 09:30',
                'actions' => '<strong>Acciones</strong>',
                'actions_desc' => 'Herramientas para interactuar con la notificación.',
                'actions_ex' => 'Ver, Marcar leída'
            ]
        ],
        'logic' => [
            'title' => 'Lógica de Envío: ¿Qué notificaciones recibo?',
            'intro' => 'El sistema utiliza reglas inteligentes para no saturar tu bandeja. Recibirás avisos según tu rol y asignación:',
            'case1' => [
                'title' => '1. Nuevo Ticket Creado',
                'who' => '<strong>¿Quién la recibe?</strong> Todos los administradores.',
                'desc' => 'Para garantizar que ninguna incidencia nueva pase desapercibida, todo el equipo técnico es alertado cuando entra un ticket nuevo.'
            ],
            'case2' => [
                'title' => '2. Respuesta en Ticket Asignado',
                'who' => '<strong>¿Quién la recibe?</strong> Solo el admin asignado.',
                'desc' => 'Si tú eres el responsable de un ticket, solo tú recibirás la notificación cuando el usuario conteste, evitando ruido al resto del equipo.'
            ],
            'case3' => [
                'title' => '3. Respuesta en Ticket NO Asignado',
                'who' => '<strong>¿Quién la recibe?</strong> Todos los administradores.',
                'desc' => 'Si un ticket no tiene dueño y el usuario contesta, se avisa a todos para que alguien lo tome.'
            ]
        ],
        'types' => [
            'title' => 'Tipos de Eventos',
            'comment' => [
                'title' => 'Nuevo Comentario',
                'text' => 'El usuario ha respondido a una de tus preguntas o ha añadido información extra.',
                'priority' => 'Prioridad: Alta (El usuario espera feedback).'
            ],
            'new_ticket' => [
                'title' => 'Ticket Nuevo',
                'text' => 'Se ha registrado una nueva incidencia en el sistema.',
                'priority' => 'Prioridad: Crítica (Requiere triaje y asignación).'
            ],
            'reopened' => [
                'title' => 'Ticket Reabierto',
                'text' => 'Un usuario ha reabierto un ticket que estaba cerrado, indicando que la solución no fue efectiva.',
                'priority' => 'Prioridad: Muy Alta (Reincidencia).'
            ]
        ],
        'tools' => [
            'title' => 'Herramientas de Productividad',
            'search' => [
                'title' => 'Buscador Inteligente',
                'text' => 'Usa la caja de búsqueda para encontrar notificaciones específicas. Puedes buscar por:',
                'li1' => '<strong>ID del Ticket:</strong> Escribe "45" para ver todo lo relacionado con ese caso.',
                'li2' => '<strong>Nombre de Usuario:</strong> Encuentra actividad de un cliente concreto.',
                'li3' => '<strong>Palabras clave:</strong> Como "Error", "Factura", etc.'
            ],
            'org' => [
                'title' => 'Organización',
                'text' => 'El sistema ordena automáticamente las notificaciones, mostrando las más recientes primero.',
                'tip' => 'Consejo: Mantén tu bandeja limpia marcando como leídas las notificaciones antiguas.'
            ]
        ],
        'actions' => [
            'title' => 'Acciones Principales',
            'intro' => 'En la columna "Acciones" encontrarás tres botones fundamentales para tu flujo de trabajo:',
            'view' => [
                'title' => 'Ver Detalles',
                'text' => 'Abre un modal con el mensaje completo sin salir de la página. Incluye un enlace directo al ticket.'
            ],
            'mark' => [
                'title' => 'Marcar Leída',
                'text' => 'Quita el indicador de "Nueva". Úsalo cuando ya has tomado nota pero quieres mantener el registro.'
            ]
        ],
        'workflow' => [
            'title' => 'Ejemplo de Flujo de Trabajo Ideal',
            'step1' => [
                'title' => '1. Recepción',
                'text' => 'Ves el indicador "1" en la campana. Es un cliente respondiendo a un ticket tuyo que estaba en "Pendiente".'
            ],
            'step2' => [
                'title' => '2. Revisión Rápida',
                'text' => 'Pulsas el botón "Ver" (Ojo). Lees la respuesta del cliente en la ventana modal. Ves que adjunta el dato que faltaba.'
            ],
            'step3' => [
                'title' => '3. Acción',
                'text' => 'Desde el modal, haces clic en "Ir al Ticket". Respondes al cliente y cambias el estado a "Resuelto".'
            ],
            'step4' => [
                'title' => '4. Finalización',
                'text' => 'Vuelves a notificaciones y marcas la alerta como leída (si aún no lo está) para limpiar tu bandeja de pendientes.'
            ]
        ]
    ],    'admin_events_page' => [
        'title' => 'Documentación - Historial de Eventos',
        'header_title' => 'Historial de Eventos',
        'header_subtitle' => 'Sistema de auditoría y seguimiento de actividades del sistema',
        'index' => [
            'title' => 'En esta guía aprenderás:',
            'what_is' => 'Qué es el Historial de Eventos',
            'access' => 'Cómo acceder al historial',
            'interface' => 'Entender la interfaz',
            'types' => 'Tipos de eventos registrados',
            'filter' => 'Filtrar y buscar eventos',
            'analyze' => 'Analizar la información',
            'cases' => 'Casos de uso prácticos',
        ],
        'what_is' => [
            'title' => '¿Qué es el Historial de Eventos?',
            'description' => 'El Historial de Eventos es un <strong>sistema de auditoría automática</strong> que registra todas las acciones importantes realizadas en la plataforma de gestión de tickets.',
            'function_title' => 'Función Principal',
            'function_desc' => 'Proporciona una <strong>trazabilidad completa</strong> de:',
            'function_list' => [
                'who' => '<strong>Quién</strong> realizó una acción (usuario o administrador)',
                'what' => '<strong>Qué</strong> acción se realizó (crear, editar, eliminar, asignar, etc.)',
                'when' => '<strong>Cuándo</strong> se realizó (fecha y hora exacta)',
                'target' => '<strong>Sobre qué</strong> se realizó la acción (tickets, usuarios, tipos, etc.)',
            ],
            'purpose_title' => '¿Para qué sirve?',
            'cards' => [
                'security' => [
                    'title' => 'Seguridad',
                    'list' => [
                        'suspicious' => 'Detectar actividades sospechosas',
                        'unauthorized' => 'Identificar accesos no autorizados',
                        'tracking' => 'Rastrear cambios no deseados',
                        'accountability' => 'Responsabilizar acciones específicas',
                    ]
                ],
                'audit' => [
                    'title' => 'Auditoría',
                    'list' => [
                        'compliance' => 'Cumplir con requisitos de auditoría',
                        'reports' => 'Generar informes de actividad',
                        'history' => 'Revisar el historial de cambios',
                        'workflow' => 'Documentar el flujo de trabajo',
                    ]
                ],
                'troubleshooting' => [
                    'title' => 'Resolución de Problemas',
                    'list' => [
                        'start' => 'Identificar cuándo empezó un problema',
                        'preceding' => 'Ver qué cambios precedieron un error',
                        'sequence' => 'Reconstruir secuencias de eventos',
                        'context' => 'Entender el contexto de incidencias',
                    ]
                ],
                'analysis' => [
                    'title' => 'Análisis',
                    'list' => [
                        'patterns' => 'Analizar patrones de uso',
                        'productivity' => 'Medir la productividad del equipo',
                        'bottlenecks' => 'Identificar cuellos de botella',
                        'optimize' => 'Optimizar procesos',
                    ]
                ]
            ]
        ],
        'access' => [
            'title' => 'Acceso al Historial de Eventos',
            'restricted_alert' => '<strong>Acceso Restringido:</strong> Solo los <strong>Superadministradores</strong> pueden acceder al Historial de Eventos. Los administradores normales no tienen permisos para ver esta sección.',
            'how_to_title' => 'Cómo acceder',
            'steps' => [
                '1' => '<strong>Paso 1:</strong> Inicia sesión como Superadministrador',
                '2' => '<strong>Paso 2:</strong> En el menú lateral izquierdo, localiza la sección <strong>"Administración"</strong>',
                '3' => '<strong>Paso 3:</strong> Haz clic en <strong>"Administración"</strong> para expandir el submenú',
                '4' => '<strong>Paso 4:</strong> Selecciona <strong>"Historial de Eventos"</strong>',
            ],
            'route_info' => '<strong>Ruta:</strong> Panel de Administración → Administración → Historial de Eventos',
            'url' => '<strong>URL:</strong> <code>/admin/eventHistory</code>',
        ],
        'interface' => [
            'title' => 'La Interfaz del Historial',
            'intro' => 'La pantalla de Historial de Eventos presenta una interfaz simplificada centrada en la tabla de datos:',
            'table_title' => 'Tabla de Eventos',
            'table_desc' => 'La tabla muestra todos los eventos registrados en el sistema, ordenados cronológicamente:',
            'columns' => [
                'headers' => ['Columna', 'Qué muestra', 'Información adicional'],
                'event_type' => ['<strong>Tipo de Evento</strong>', 'La acción que se realizó', 'Ej: "ticket_created", "user_login"'],
                'description' => ['<strong>Descripción</strong>', 'Detalles específicos del evento', 'Describe qué cambió (ej: "Ticket #123 created by Juan")'],
                'user' => ['<strong>Usuario</strong>', 'Quién realizó la acción', 'Nombre del responsable'],
                'date' => ['<strong>Fecha</strong>', 'Cuándo ocurrió el evento', 'Formato: dd/mm/yyyy HH:mm'],
            ],
            'note' => '<strong>Nota:</strong> Los nombres de los tipos de evento se muestran en su formato técnico (ej: <code>ticket_created</code>) para mayor precisión en las búsquedas.',
            'functionalities_title' => 'Funcionalidades de la Tabla',
            'cards' => [
                'search' => [
                    'title' => 'Búsqueda Global',
                    'loc' => '<strong>Ubicación:</strong> Esquina superior derecha de la tabla ("Search:")',
                    'func' => '<strong>Función:</strong> Filtra dinámicamente los resultados mostrando solo los eventos que contengan el texto ingresado en <strong>cualquiera de sus columnas</strong>.',
                    'example' => '<strong>Ejemplo:</strong> Escribe "admin" para ver acciones realizadas PÓR admins o SOBRE admins.',
                ],
                'sort' => [
                    'title' => 'Ordenación',
                    'usage' => '<strong>Cómo usarla:</strong> Haz clic en cualquier encabezado de columna',
                    'click1' => '<strong>Primer clic:</strong> Ordena ascendente (A→Z, más antiguo→más reciente)',
                    'click2' => '<strong>Segundo clic:</strong> Ordena descendente (Z→A, más reciente→más antiguo)',
                ],
                'pagination' => [
                    'title' => 'Paginación',
                    'records' => '<strong>Registros por página:</strong> Selector en la esquina superior izquierda',
                    'options' => '<strong>Opciones:</strong> 10, 25, 50 o 100 eventos por página',
                    'nav' => '<strong>Navegación:</strong> Botones "Anterior/Siguiente" en la parte inferior',
                ],
                'view' => [
                    'title' => 'Orden y Visualización',
                    'default' => '<strong>Orden por defecto:</strong> Cronológico inverso (lo más reciente primero).',
                    'tip' => '<strong>Consejo:</strong> Usa la paginación para navegar por el historial antiguo.',
                ]
            ]
        ],
        'event_types' => [
            'title' => 'Tipos de Eventos Registrados',
            'intro' => 'El sistema registra automáticamente los siguientes tipos de eventos:',
            'headers' => ['Evento', 'Cuándo se registra', 'Ejemplo de Descripción'],
            'tickets' => [
                'title' => 'Eventos de Tickets',
                'rows' => [
                    ['<code>ticket_created</code>', 'Cuando un usuario crea un nuevo ticket', '"Ticket #45 creado por usuario@example.com con título \'Error de acceso\'"'],
                    ['<code>ticket_updated</code>', 'Cuando se modifica cualquier campo de un ticket (título, descripción, estado, prioridad, tipo)', '"Ticket #45 actualizado: Estado cambiado de \'Nuevo\' a \'En Proceso\'"'],
                    ['<code>ticket_assigned</code>', 'Cuando un administrador asigna un ticket a otro administrador', '"Ticket #45 asignado a admin@example.com por superadmin@example.com"'],
                    ['<code>ticket_closed</code>', 'Cuando se marca un ticket como cerrado', '"Ticket #45 cerrado por admin@example.com"'],
                    ['<code>comment_added</code>', 'Cuando se añade un comentario a un ticket', '"Comentario añadido al Ticket #45 por admin@example.com"'],
                ]
            ],
            'users' => [
                'title' => 'Eventos de Usuarios',
                'rows' => [
                    ['<code>user_created</code>', 'Cuando se registra un nuevo usuario en el sistema', '"Usuario \'Juan Pérez\' (juan@example.com) registrado"'],
                    ['<code>user_updated</code>', 'Cuando se modifica el perfil de un usuario', '"Usuario \'Juan Pérez\' actualizado: Email cambiado"'],
                    ['<code>user_deleted</code>', 'Cuando se elimina una cuenta de usuario', '"Usuario \'Juan Pérez\' (juan@example.com) eliminado por superadmin@example.com"'],
                    ['<code>user_login</code>', 'Cada vez que un usuario inicia sesión', '"Inicio de sesión: usuario@example.com desde IP 192.168.1.100"'],
                    ['<code>user_logout</code>', 'Cuando un usuario cierra sesión manualmente', '"Cierre de sesión: usuario@example.com"'],
                ]
            ],
            'admins' => [
                'title' => 'Eventos de Administradores',
                'rows' => [
                    ['<code>admin_created</code>', 'Cuando se crea una nueva cuenta de administrador', '"Administrador \'María López\' (maria@admin.com) creado por superadmin@example.com"'],
                    ['<code>admin_updated</code>', 'Cuando se modifica el perfil de un administrador', '"Administrador \'María López\' actualizado: Rol cambiado a Superadministrador"'],
                    ['<code>admin_deleted</code>', 'Cuando se elimina una cuenta de administrador', '"Administrador \'María López\' eliminado por superadmin@example.com"'],
                    ['<code>admin_login</code>', 'Cada vez que un administrador accede al panel', '"Inicio de sesión admin: admin@example.com desde IP 192.168.1.50"'],
                ]
            ],
            'ticket_types' => [
                'title' => 'Eventos de Tipos de Tickets',
                'rows' => [
                    ['<code>type_created</code>', 'Cuando se crea un nuevo tipo de ticket', '"Tipo \'Problema de Red\' creado por superadmin@example.com"'],
                    ['<code>type_updated</code>', 'Cuando se modifica un tipo de ticket existente', '"Tipo \'Bug\' actualizado: Descripción modificada"'],
                    ['<code>type_deleted</code>', 'Cuando se elimina un tipo de ticket', '"Tipo \'Problema de Red\' eliminado por superadmin@example.com"'],
                ]
            ],
            'note' => '<strong>Nota:</strong> Todos estos eventos se registran <strong>automáticamente</strong> por el sistema. No requieren ninguna acción manual para ser guardados.',
        ],
        'filtering' => [
            'title' => 'Cómo Filtrar y Buscar Eventos',
            'intro' => 'El historial puede contener miles de eventos. La herramienta principal para encontrar información es la <strong>Búsqueda Global</strong> en la tabla.',
            'strategies_title' => 'Estrategias de Búsqueda',
            'pro_tip' => '<strong>Consejo Pro:</strong> La barra de búsqueda global es "inteligente". Puedes escribir cualquier término que aparezca en la fila para encontrarlo.',
            'by_type' => [
                'title' => '1. Cómo filtrar por Tipo de Evento',
                'goal' => '<strong>Objetivo:</strong> Ver todas las acciones de un tipo específico (ej. Creación de Tickets).',
                'method' => [
                    '1' => 'Ve a la caja de búsqueda ("Search:") arriba a la derecha de la tabla.',
                    '2' => 'Escribe el código del evento (ej: <code>ticket_created</code>).',
                    '3' => 'La tabla mostrará solo las filas que contengan ese texto.',
                ],
                'terms_title' => '<strong>Términos útiles para buscar:</strong>',
                'terms' => [
                    '<code>ticket_</code>: Muestra todo lo relacionado con tickets.',
                    '<code>user_</code>: Muestra acciones sobre usuarios.',
                    '<code>login</code>: Muestra accesos al sistema.',
                    '<code>comment</code>: Muestra comentarios añadidos.',
                ]
            ],
            'by_user' => [
                'title' => '2. Cómo filtrar por Usuario',
                'goal' => '<strong>Objetivo:</strong> Rastrear las acciones de una persona específica.',
                'method' => [
                    '1' => 'Escribe el <strong>nombre</strong> o <strong>email</strong> del usuario en la caja de búsqueda.',
                    '2' => 'El sistema filtrará automáticamente.',
                ],
                'examples_title' => '<strong>Ejemplos:</strong>',
                'examples' => [
                    'Escribe "admin@example.com" para ver su historial completo.',
                    'Escribe "Juan" para ver acciones de cualquier usuario llamado Juan.',
                ]
            ],
            'by_date' => [
                'title' => '3. Cómo filtrar por Fecha o Contenido',
                'goal' => '<strong>Objetivo:</strong> Encontrar eventos de un día específico o sobre un tema concreto.',
                'dates_title' => '<strong>Para fechas:</strong>',
                'dates_list' => [
                    'Escribe la fecha en formato <code>YYYY-MM-DD</code> o partes de ella.',
                    '<em>Nota: La búsqueda es textual, así que debe coincidir con el formato mostrado en pantalla.</em>',
                ],
                'content_title' => '<strong>Para contenido (Descripción):</strong>',
                'content_list' => [
                    'Escribe palabras clave específicas como "cerrado", "asignado", o el número de un ticket (ej: "Ticket #45").',
                ]
            ],
        ],
        'analysis' => [
            'title' => 'Analizar la Información',
            'intro' => 'Una vez que has filtrado los eventos, es momento de analizar la información. Aquí algunas estrategias:',
            'patterns_title' => 'Patrones a Identificar',
            'cards' => [
                'productivity' => [
                    'title' => 'Análisis de Productividad',
                    'what' => '<strong>Qué buscar:</strong>',
                    'list' => [
                        'Número de tickets procesados por administrador',
                        'Tiempo promedio entre creación y primera respuesta',
                        'Cantidad de asignaciones y reasignaciones',
                        'Horarios de mayor actividad',
                    ],
                    'how' => '<strong>Cómo:</strong> Busca <code>ticket_updated</code> o <code>comment_added</code> y observa los nombres de usuario.'
                ],
                'anomalies' => [
                    'title' => 'Detección de Anomalías',
                    'what' => '<strong>Qué buscar:</strong>',
                    'list' => [
                        'Múltiples inicios de sesión fallidos',
                        'Accesos fuera del horario habitual',
                        'Cambios masivos en poco tiempo',
                        'Eliminaciones inusuales',
                    ],
                    'how' => '<strong>Cómo:</strong> Busca eventos de <code>login</code>, <code>deleted</code>, y ordena por fecha/hora'
                ],
                'tracking' => [
                    'title' => 'Seguimiento de Tickets',
                    'what' => '<strong>Qué buscar:</strong>',
                    'list' => [
                        'Ciclo de vida completo de un ticket',
                        'Todos los cambios realizados',
                        'Quiénes intervinieron',
                        'Tiempos de resolución',
                    ],
                    'how' => '<strong>Cómo:</strong> Usa la búsqueda global escribiendo el ID del ticket (ej: "#123")'
                ],
                'audit' => [
                    'title' => 'Auditoría de Cambios',
                    'what' => '<strong>Qué buscar:</strong>',
                    'list' => [
                        'Quién modificó configuraciones críticas',
                        'Cambios en tipos de tickets',
                        'Creación/eliminación de administradores',
                        'Modificaciones de permisos',
                    ],
                    'how' => '<strong>Cómo:</strong> Busca <code>admin_created</code>, <code>type_updated</code>, etc.'
                ]
            ],
            'dates_title' => 'Interpretación de Fechas y Horas',
            'dates_card' => [
                'format' => '<strong>Formato de fecha:</strong> dd/mm/yyyy HH:mm (ejemplo: 09/02/2026 14:35)',
                'elements' => '<strong>Elementos importantes:</strong>',
                'list' => [
                    '<strong>Secuencia temporal:</strong> Ordena por fecha para ver el orden cronológico de eventos',
                    '<strong>Intervalos:</strong> Nota el tiempo entre eventos relacionados (ej: creación y primera respuesta de un ticket)',
                    '<strong>Patrones horarios:</strong> Identifica picos de actividad en ciertas horas',
                    '<strong>Consistencia:</strong> Detecta acciones simultáneas o muy rápidas que puedan ser sospechosas',
                ],
                'important' => '<strong>Importante:</strong> Las fechas y horas están en el huso horario del servidor. Asegúrate de tener esto en cuenta al analizar eventos.',
            ]
        ],
        'use_cases' => [
            'title' => 'Casos de Uso Prácticos',
            'intro' => 'Aquí algunos escenarios reales donde el Historial de Eventos es fundamental:',
            'cases' => [
                '1' => [
                    'title' => 'Caso 1: "Un ticket desapareció o se modificó sin autorización"',
                    'situation' => '<strong>Situación:</strong> Un usuario reporta que su ticket fue cerrado o modificado sin que nadie le avisara.',
                    'solution_title' => '<strong>Solución:</strong>',
                    'steps' => [
                        'Obtén el ID del ticket (ej: #123)',
                        'En la búsqueda rápida global, escribe "#123"',
                        'Revisa todos los eventos relacionados: creación, actualizaciones, asignaciones',
                        'Identifica quién hizo el cambio y cuándo',
                        'Verifica si fue un error humano o un problema técnico',
                    ],
                    'result' => '<strong>Resultado:</strong> Trazabilidad completa de quién, cuándo y cómo se modificó el ticket.',
                ],
                '2' => [
                    'title' => 'Caso 2: "Revisar el rendimiento de un administrador"',
                    'situation' => '<strong>Situación:</strong> Necesitas evaluar cuánto trabajo ha realizado un administrador en el último mes.',
                    'solution_title' => '<strong>Solución:</strong>',
                    'steps' => [
                        'Escribe el <strong>email del administrador</strong> en la caja de búsqueda.',
                        'La tabla mostrará solo sus acciones.',
                        'Observa las acciones de tipo <code>ticket_updated</code> o <code>comment_added</code>.',
                        'Revisa tickets asignados y resueltos por él.',
                    ],
                    'result' => '<strong>Resultado:</strong> Visión general del trabajo realizado por ese usuario.',
                ],
                '3' => [
                    'title' => 'Caso 3: "Detectar un posible acceso no autorizado"',
                    'situation' => '<strong>Situación:</strong> Sospechas que alguien accedió a una cuenta sin autorización.',
                    'solution_title' => '<strong>Solución:</strong>',
                    'steps' => [
                        'Busca la palabra clave <strong>"login"</strong> en la caja de búsqueda.',
                        'Luego, refina añadiendo el nombre o email del usuario sospechoso.',
                        'Revisa las fechas y horas para encontrar accesos inusuales (madrugada, fines de semana no laborales).',
                    ],
                    'result' => '<strong>Resultado:</strong> Identificación de accesos sospechosos para tomar medidas.',
                ],
                '4' => [
                    'title' => 'Caso 4: "¿Quién eliminó un tipo de ticket importante?"',
                    'situation' => '<strong>Situación:</strong> Un tipo de ticket que se usaba frecuentemente ha desaparecido.',
                     'solution_title' => '<strong>Solución:</strong>',
                    'steps' => [
                        'Busca la palabra clave <strong>"deleted"</strong> o <strong>"type_deleted"</strong>.',
                        'Busca el nombre del tipo en las descripciones si lo recuerdas.',
                        'Identifica quién realizó la eliminación.',
                        'Contacta al responsable para confirmar si fue intencional.',
                    ],
                    'result' => '<strong>Resultado:</strong> Responsable identificado y posibilidad de restaurar si fue un error.',
                ],
                '5' => [
                    'title' => 'Caso 5: "Auditoría de cumplimiento normativo"',
                    'situation' => '<strong>Situación:</strong> Una auditoría externa requiere demostrar trazabilidad de cambios.',
                     'solution_title' => '<strong>Solución:</strong>',
                    'steps' => [
                        'Define el período de auditoría.',
                        'Busca la fecha de inicio (ej: "2026-01-01") para situarte en el tiempo.',
                        'Toma capturas de pantalla o copia los datos relevantes de la tabla.',
                        'Presenta evidencias de quién autorizó cambios críticos.',
                    ],
                    'result' => '<strong>Resultado:</strong> Documentación básica para cumplir con requisitos de auditoría.',
                ]
            ]
        ],
        'best_practices' => [
            'title' => 'Buenas Prácticas',
            'recommendations' => [
                'title' => 'Recomendaciones',
                'list' => [
                    'Revisa el historial regularmente (semanalmente) para detectar anomalías temprano',
                    'Usa filtros combinados para búsquedas más precisas',
                    'Documenta eventos críticos fuera del sistema si es necesario',
                    'Capacita al equipo sobre la importancia de la trazabilidad',
                    'Establece políticas claras sobre quién puede realizar acciones críticas',
                ]
            ],
            'errors' => [
                'title' => 'Errores Comunes',
                'list' => [
                    '<strong>No revisar el historial:</strong> Perder oportunidades de detectar problemas',
                    '<strong>Confiar solo en la memoria:</strong> El historial es la fuente de verdad',
                    '<strong>No combinar filtros:</strong> Obtener demasiados resultados irrelevantes',
                    '<strong>Ignorar patrones:</strong> No analizar tendencias puede ocultar problemas mayores',
                    '<strong>No documentar hallazgos:</strong> Perder evidencias para futuras referencias',
                ]
            ]
        ],
        'limitations' => [
            'title' => 'Limitaciones y Consideraciones',
            'aspects_title' => 'Aspectos a Tener en Cuenta',
            'list' => [
                '<strong>Solo Superadministradores:</strong> Los administradores normales no pueden acceder a esta funcionalidad',
                '<strong>No editable:</strong> Los eventos registrados no se pueden modificar ni eliminar (garantiza integridad)',
                '<strong>Almacenamiento:</strong> Con el tiempo, la tabla crecerá. Considera políticas de retención de datos',
                '<strong>Rendimiento:</strong> Con muchos miles de eventos, las búsquedas pueden volverse más lentas',
                '<strong>Privacidad:</strong> El historial puede contener información sensible. Accede solo cuando sea necesario',
            ]
        ]
    ]
];