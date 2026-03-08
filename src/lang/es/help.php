<?php

return [
    'title' => 'Ayuda · gestión de tickets',
    'header' => 'Gestión de tickets',
    'breadcrumbs' => [
        'help' => 'Ayuda',
        'tickets' => 'Tickets',
    ],
    'intro' => [
        'title' => '¿Qué es un ticket?',
        'text' => 'Un "ticket" es el registro digital de tu solicitud, incidencia o pregunta. es como un expediente que contiene toda la información del problema, la conversación con el técnico y el estado actual de la resolución.',
    ],
    'create' => [
        'title' => '1. ¿Cómo crear un nuevo ticket?',
        'step1' => 'Sigue estos pasos para reportar una incidencia:',
        'list' => [
            '1' => [
                'title' => 'Ir a la sección tickets:',
                'text' => 'En el menú lateral izquierdo, haz clic en',
            ],
            '2' => [
                'title' => 'Botón crear:',
                'text' => 'Haz clic en el botón',
                'suffix' => 'Situado en la parte superior derecha de la tabla.'
            ],
            '3' => [
                'title' => 'Completar el formulario:',
                'li1' => [
                    'text' => '(Obligatorio) escribe un resumen breve y claro del problema (ej. "error al imprimir factura"). evita títulos genéricos como "ayuda" o "problema".'
                ],
                'li2' => [
                    'text' => '(Obligatorio) explica qué sucede. incluye mensajes de error si los hay.',
                    'alert' => '<strong>Importante:</strong> este campo tiene un límite de <strong>255 caracteres</strong>.<br>si necesitas extenderte más, crea el ticket con un resumen breve y añade todos los detalles necesarios usando un <strong>comentario</strong> (que permite texto ilimitado) una vez creado.'
                ],
                'li3' => [
                    'text' => 'Selecciona qué tan urgente es. <i>úsalo con responsabilidad</i>; marcar todo como "alta" puede retrasar la gestión.'
                ],
                'li4' => [
                    'text' => 'Elige la categoría que mejor se ajuste (ej. incidencia técnica, consulta, etc.).'
                ],
                'note' => '<strong>Nota sobre archivos:</strong> actualmente no es posible adjuntar ficheros directamente. por favor, describe el contenido o usa enlaces externos si es necesario.',
            ],
            '4' => [
                'title' => 'Enviar:',
                'text' => 'Haz clic en el botón <strong>guardar</strong>. el sistema te redirigirá a la lista de tickets y verás un mensaje de confirmación.'
            ]
        ],
        'img_caption' => 'Ejemplo del formulario para crear un nuevo ticket'
    ],
    'list' => [
        'title' => '2. Ver y buscar mis tickets',
        'intro' => 'En la pantalla principal de "tickets" verás un listado de todos tus tickets creados, ordenados del más reciente al más antiguo.',
        'img_caption' => 'Ejemplo de la tabla donde se listan los tickets',
        'table_title' => 'La tabla de tickets',
        'table_intro' => 'Cada fila representa un ticket e incluye columnas clave:',
        'columns' => [
            'id' => '<strong>ID:</strong> número único de identificación del ticket (útil para referencias).',
            'title' => '<strong>Título:</strong> el asunto del ticket.',
            'status' => '<strong>Estado:</strong> estado actual del proceso (ver sección estados).',
            'priority' => '<strong>Prioridad y tipo:</strong> clasificación del ticket.',
            'actions' => '<strong>Acciones:</strong> botones para interactuar con el ticket.'
        ],
        'search_title' => 'Buscador',
        'search_text' => 'Si tienes muchos tickets, usa la barra de búsqueda en la parte superior de la lista. escribe una palabra clave del título (ej. "impresora") y presiona "enter" o el botón de buscar. esto filtrará la lista para mostrar solo las coincidencias.'
    ],
    'states' => [
        'title' => '3. Ciclo de vida y estados del ticket',
        'intro' => 'Un ticket pasa por varios estados desde que nace hasta que se cierra. entenderlos es vital para saber qué se espera de TI:',
        'open' => 'Abierto / pendiente',
        'open_desc' => 'El ticket ha sido creado y enviado al sistema correctamente. los administradores pueden verlo, pero aún no han comenzado a trabajar en él o están en proceso de triage y asignación.',
        'progress' => 'En progreso / asignado',
        'progress_desc' => 'Un administrador ha sido asignado a tu caso y está trabajando en él. es probable que recibas comentarios solicitando más información. revisa tus notificaciones.',
        'resolved' => 'Resuelto',
        'resolved_desc' => 'El administrador indica que ha solucionado el problema.',
        'resolved_action' => '<strong>¡Tu turno!</strong> en este punto, se requiere tu confirmación.',
        'resolved_list' => [
            '1' => 'Si funciona: debes usar la opción <strong>"validar"</strong> para cerrar el ticket.',
            '2' => 'Si no funciona: debes comentar indicando que el fallo persiste, para que el administrador siga trabajando.'
        ],
        'closed' => 'Cerrado',
        'closed_desc' => 'El proceso ha finalizado. el ticket queda guardado en tu historial como referencia, pero ya no admite más cambios, comentarios ni ediciones.'
    ],
    'detail' => [
        'title' => '4. Pantalla de detalle: estructura completa',
        'intro' => 'La pantalla de detalle del ticket se ha diseñado para que tengas todo a mano. está dividida en tres áreas principales (izquierda, derecha e inferior). a continuación explicamos cada una:',
        'img_caption' => '<Em>vista general: izquierda (info), derecha (nuevo mensaje), abajo (historial).</em>',
        'zone_a' => [
            'title' => 'A. zona izquierda: información y validación',
            'text' => 'Este panel contiene la "ficha técnica" de tu incidencia:',
            'list' => [
                '1' => '<strong>Título y descripción:</strong> el problema tal como lo reportaste.',
                '2' => '<strong>Estado y prioridad:</strong> badges de color indicando la situación actual.',
                '3' => '<strong>Fechas:</strong> creación y última actualización.'
            ],
            'validation' => [
                'title' => 'Área de validación (¡importante!)',
                'text' => 'Solo aparece cuando el estado es <strong>resolved</strong>.',
                'validate' => '<Span class="badge badge-success"><i class="fas fa-check"></i> validar</span>: confirma que la solución funciona. el ticket se cerrará (closed).',
                'reject' => '<Span class="badge badge-danger"><i class="fas fa-times"></i> rechazar</span>: indica que no funciona. el ticket volverá a "pendiente".'
            ]
        ],
        'zone_b' => [
            'title' => 'B. zona derecha: agregar comentarios',
            'text' => 'Usa este formulario para comunicarte con el soporte. es el canal oficial para añadir información.',
            'usage' => '¿Cuándo usarlo?',
            'list' => [
                '1' => 'Para responder preguntas del técnico.',
                '2' => 'Para adjuntar nuevos datos o errores.',
                '3' => 'Para preguntar "¿cómo va mi caso?".'
            ],
            'footer' => 'Simplemente escribe y pulsa <strong>"agregar comentario"</strong>.'
        ],
        'zone_c' => [
            'title' => 'C. zona inferior: historial de conversación',
            'text' => 'Debajo de los paneles superiores verás la <strong>línea de tiempo (timeline)</strong>. aquí queda registrado todo el histórico del ticket.',
            'list' => [
                '1' => '<strong>Todo en un lugar:</strong> verás tus mensajes y las respuestas de los administradores intercaladas por fecha.',
                '2' => '<strong>Identificación:</strong>',
                'sublist' => [
                    '1' => 'Tus mensajes tienen botones de <i class="fas fa-edit text-primary"></i> editar y <i class="fas fa-trash text-danger"></i> eliminar.',
                    '2' => 'Las respuestas del admin aparecen con su nombre y cabecera distintiva.'
                ]
            ],
            'img_caption' => 'Ejemplo de conversación en el ticket'
        ]
    ],
    'advanced' => [
        'title' => '5. Editar y eliminar (gestión avanzada)',
        'intro' => 'Es posible que necesites corregir información inicial o cancelar una solicitud por error. aquí te explicamos cómo funcionan estos procesos críticos.',
        'edit' => [
            'title' => 'A. editar un ticket',
            'subtitle' => 'Disponible mientras el ticket no esté <strong>cerrado</strong>.',
            'step1' => 'Haz clic en el botón <span class="badge badge-warning"><i class="fas fa-pencil-alt"></i> editar</span> en la tabla principal.',
            'step2' => 'Se abrirá un formulario similar al de creación, pero con tus datos cargados.',
            'step2_list' => '<Em>puedes modificar:</em> título, descripción, prioridad y tipo.',
            'step3' => 'Al pulsar <strong>actualizar</strong>, volverás al listado.',
            'success_title' => 'Confirmación de éxito:',
            'success_text' => 'Verás un mensaje verde en la parte superior:<br><em>"ticket actualizado correctamente."</em>',
            'img_caption' => 'Ejemplo del mensaje de confirmación tras editar un ticket'
        ],
        'delete' => [
            'title' => 'B. eliminar un ticket',
            'warning' => '<strong><i class="fas fa-exclamation-triangle"></i> ¡Advertencia!</strong> esta acción es irreversible. el ticket desaparecerá de tu historial y del panel del administrador.',
            'step1' => 'Haz clic en el botón <span class="badge badge-danger"><i class="fas fa-trash"></i> eliminar</span>.',
            'step2' => '<strong>Paso de seguridad:</strong> el navegador mostrará una ventana emergente (pop-up) preguntando:<br><em>"¿estás seguro de eliminar este ticket?"</em>',
            'step3' => 'Si aceptas, ocurrirá lo siguiente:',
            'step3_list' => [
                '1' => 'Aparecerá una alerta confirmando: <em>"ticket eliminado"</em>.',
                '2' => 'La tabla se actualizará automáticamente y la fila desaparecerá.'
            ],
            'img_caption' => 'Ejemplo del mensaje de confirmación'
        ]
    ],
    'introduction_page' => [
        'title' => 'Ayuda · introducción',
        'header' => 'Introducción y primeros pasos',
        'breadcrumbs' => 'Ayuda',
        'welcome' => [
            'title' => 'Bienvenido al portal de usuarios',
            'text1' => 'Bienvenido a la plataforma de gestión de incidencias y soporte (tickets). esta herramienta ha sido diseñada para centralizar, organizar y agilizar toda la comunicación entre tú y el equipo de soporte técnico/administración.',
            'text2' => 'A través de este portal, podrás reportar problemas, realizar solicitudes de servicio, consultar el estado de tus peticiones anteriores y mantener una comunicación directa y registrada con los responsables de resolver tus incidencias.',
            'can_do' => [
                'title' => 'Lo que puedes hacer:',
                'list' => [
                    'create' => '<strong>Crear tickets:</strong> abrir nuevas solicitudes de soporte detallando tu problema o requerimiento.',
                    'history' => '<strong>Consultar historial:</strong> ver todos los tickets que has creado, filtrarlos y buscar por palabras clave.',
                    'comment' => '<strong>Comentar:</strong> dialogar con los agentes mediante un hilo de comentarios dentro de cada ticket.',
                    'notifications' => '<strong>Recibir notificaciones:</strong> estar al tanto de actualizaciones, cambios de estado o respuestas en tus tickets.',
                    'validate' => '<strong>Validar soluciones:</strong> confirmar si la solución propuesta por el agente ha resuelto tu problema.',
                    'edit' => '<strong>Editar/Eliminar:</strong> modificar la información de tus tickets o eliminarlos (bajo ciertas condiciones).'
                ]
            ],
            'cannot_do' => [
                'title' => 'Lo que no puedes hacer:',
                'list' => [
                    'view_others' => 'Ver los tickets de otros usuarios (por privacidad y seguridad).',
                    'assign' => 'Asignar tickets a administradores específicos (el sistema o los administradores se encargan de la asignación).',
                    'modify_closed' => 'Modificar un ticket una vez que ha sido cerrado (aunque podrás consultarlo).'
                ]
            ]
        ],
        'dashboard' => [
            'title' => 'Panel de control del usuario (dashboard)',
            'text' => 'Al iniciar sesión, accederás inmediatamente a tu <strong>panel de control</strong>. esta es tu "base de operaciones".',
            'img_caption' => 'Ejemplo del panel de control del usuario',
            'green_box' => [
                 'title' => 'Tickets abiertos',
                 'desc' => 'En color <strong>verde</strong>. tickets activos que están siendo atendidos.'
            ],
            'blue_box' => [
                 'title' => 'Tickets resueltos',
                 'desc' => 'En color <strong>azul</strong>. solucionados pero pendientes de que los valides.'
            ],
            'yellow_box' => [
                 'title' => 'Tickets pendientes',
                 'desc' => 'En color <strong>amarillo</strong>. tickets esperando acción.'
            ],
            'components' => [
                'title' => 'Componentes del panel:',
                'summary_dt' => 'Resumen de estado',
                'summary_dd' => 'Tres tarjetas de colores (verde, azul, amarillo) que te dan un vistazo rápido de cuántos tickets tienes en cada situación.',
                'latest_dt' => 'Últimos tickets',
                'latest_dd' => 'Una lista en la parte inferior con los tickets que han tenido actividad reciente. incluye botones rápidos para <span class="badge badge-primary"><i class="fas fa-eye"></i> ver</span> y <span class="badge badge-warning"><i class="fas fa-edit"></i> editar</span>.',
                'create_dt' => 'Crear rápido',
                'create_dd' => 'Un botón en la parte superior derecha de la tarjeta principal para abrir una nueva incidencia al instante.'
            ]
        ],
        'profile' => [
            'title' => 'Mi perfil',
            'text1' => 'Puedes acceder a tu perfil haciendo clic en tu nombre en la esquina superior derecha y seleccionando el icono <strong><i class="fas fa-user fa-2x mb-2"></i></strong> o bien haciendo click sobre <strong>tu nombre en el menu lateral</strong>.',
            'text2' => 'En esta sección podrás visualizar tus datos registrados en el sistema:',
            'list' => [
                'name' => 'Nombre completo.',
                'email' => 'Correo electrónico asociado.',
                'date' => 'Fecha de registro.'
            ],
            'note' => '<strong>Nota importante:</strong> por razones de seguridad, la edición de datos sensibles (como el correo electrónico) está restringida. si necesitas corregir un dato erróneo, por favor crea un ticket solicitándolo a un administrador.',
            'img1_caption' => 'Ejemplo del menú de opciones',
            'img2_caption' => 'Ejemplo de acceso al perfil desde el menú lateral'
        ],
        'support' => [
            'title' => '¿Necesitas más ayuda?',
            'text' => 'Esta sección de ayuda se divide en tres partes fundamentales. te recomendamos leerlas para dominar la herramienta:',
            'buttons' => [
                'intro' => 'Introducción',
                'tickets' => 'Tickets',
                'notifications' => 'Notificaciones',
                'profile' => 'Mi perfil'
            ]
        ]
    ],
    'notifications_page' => [
        'title' => 'Documentación - notificaciones',
        'header' => 'Notificaciones del usuario',
        'breadcrumbs' => 'Mis notificaciones',
        'intro' => [
            'title' => '¿Qué son las notificaciones?',
            'text' => 'El sistema de notificaciones te mantiene informado automáticamente sobre cualquier cambio importante en tus tickets. no necesitas revisar cada ticket manualmente: la aplicación te avisa cuando algo sucede.',
        ],
        'access' => [
            'title' => 'Cómo acceder a tus notificaciones',
            'subtitle' => 'Hay <strong>dos formas</strong> de ver tus notificaciones:',
            'option1' => [
                'title' => 'Opción 1: desde el icono de la campana',
                'text' => 'En la <strong>parte superior derecha</strong> de la pantalla, junto al selector de idioma y tu foto de perfil, encontrarás un icono de campana.',
                'alert_title' => 'Indicador de notificaciones nuevas:',
                'list' => [
                    '1' => 'Si tienes notificaciones sin leer, aparece un <strong>círculo amarillo con un número</strong> que indica cuántas notificaciones nuevas tienes.',
                    '2' => 'Ejemplo: si ves un "5" sobre la campana, significa que tienes 5 notificaciones pendientes de revisar.'
                ],
                'action' => '<strong>Para acceder:</strong> haz clic en el icono de la campana y serás redirigido a la página completa de notificaciones.'
            ],
            'option2' => [
                'title' => 'Opción 2: desde el menú lateral',
                'text' => 'En el menú de navegación del lado izquierdo, busca la opción <strong>"notificaciones"</strong> (con un icono de campana). haz clic ahí para acceder.'
            ]
        ],
        'screen' => [
            'title' => 'La pantalla de notificaciones',
            'intro' => 'Cuando entras a esta sección, verás:',
            'location' => [
                'title' => 'Ubicación en el sistema',
                'text' => 'En la parte superior aparece una ruta que te muestra dónde estás:',
                'path' => 'Inicio / mis notificaciones',
                'note' => 'Puedes hacer clic en "inicio" para volver al panel principal.'
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
                    'type_example' => 'Comentario, estado, creado',
                    'content' => 'Contenido',
                    'content_desc' => 'Un resumen de lo que pasó',
                    'content_example' => '"Se ha agregado un nuevo comentario en tu ticket"',
                    'date' => 'Fecha',
                    'date_desc' => 'Cuándo ocurrió el evento',
                    'date_example' => '12/06/2025 11:53',
                    'actions' => 'Acciones',
                    'actions_desc' => 'Botones para interactuar',
                    'actions_example' => 'Ver detalles, marcar como leída'
                ],
            ]
        ],
        'types' => [
            'title' => 'Tipos de notificaciones que puedes recibir',
            'comment' => [
                'title' => 'Nuevo comentario',
                'when' => '<strong>Cuándo la recibes:</strong> cuando un administrador escribe un comentario en uno de tus tickets.',
                'what' => '<strong>Qué dice:</strong> "se ha agregado un nuevo comentario en tu ticket"',
                'why' => '<strong>Por qué es útil:</strong> te avisa que alguien respondió a tu solicitud sin tener que revisar todos tus tickets uno por uno.'
            ],
            'status' => [
                'title' => 'Cambio de estado',
                'when' => '<strong>Cuándo la recibes:</strong> cuando un administrador cambia el estado de tu ticket (por ejemplo, de "pendiente" a "en proceso" o "resuelto").',
                'what' => '<strong>Qué dice:</strong> "el ticket con ID [número] ha sido actualizado"',
                'why' => '<strong>Por qué es útil:</strong> sabes inmediatamente que tu ticket está siendo atendido o que ya fue resuelto.'
            ],
            'created' => [
                'title' => 'Ticket creado',
                'when' => '<strong>Cuándo la recibes:</strong> cuando creas un nuevo ticket exitosamente.',
                'what' => '<strong>Qué dice:</strong> "nuevo ticket creado con ID [número]"',
                'why' => '<strong>Por qué es útil:</strong> confirma que tu solicitud fue registrada correctamente en el sistema.'
            ],
            'closed' => [
                'title' => 'Ticket cerrado',
                'when' => '<strong>Cuándo la recibes:</strong> cuando un administrador marca tu ticket como cerrado.',
                'what' => '<strong>Qué dice:</strong> "el ticket ha sido cerrado"',
                'why' => '<strong>Por qué es útil:</strong> te informa que el problema se considera resuelto y el ticket ya no está activo.'
            ],
            'reopened' => [
                'title' => 'Ticket reabierto',
                'when' => '<strong>Cuándo la recibes:</strong> cuando un ticket que estaba cerrado se vuelve a abrir (por TI o por un administrador).',
                'what' => '<strong>Qué dice:</strong> "el ticket ha sido reabierto"',
                'why' => '<strong>Por qué es útil:</strong> sabes que el problema se está revisando nuevamente.'
            ]
        ],
        'tools' => [
            'title' => 'Herramientas de la tabla',
            'intro' => 'La tabla incluye varias funciones que te ayudan a organizar y encontrar información:',
            'search' => [
                'title' => 'Búsqueda',
                'text' => 'En la esquina superior derecha hay un campo que dice <strong>"buscar:"</strong>',
                'list' => [
                    '1' => 'Escribe cualquier palabra (por ejemplo, "comentario" o el nombre de un ticket)',
                    '2' => 'La tabla filtra automáticamente y muestra solo las notificaciones que coinciden',
                    '3' => 'Borra el texto para ver todas las notificaciones nuevamente'
                ]
            ],
            'records' => [
                'title' => 'Cantidad de registros por página',
                'text' => 'En la esquina superior izquierda verás <strong>"mostrar 10 registros"</strong> (con un menú desplegable). puedes cambiar cuántas notificaciones ver en cada página:',
                'list' => [
                    '10' => '10 Registros (valor por defecto)',
                    '25' => '25 Registros',
                    '50' => '50 Registros',
                    '100' => '100 Registros'
                ],
                'note' => 'Esto es útil si tienes muchas notificaciones y quieres verlas todas sin cambiar de página constantemente.'
            ],
            'pagination' => [
                'title' => 'Paginación',
                'text' => 'Si tienes más notificaciones de las que caben en una página, verás en la parte inferior:',
                'example' => 'Mostrando 1 a 10 de 25 registros [anterior] [1] [2] [3] [siguiente]',
                'list' => [
                    'nav' => '<strong>anterior/siguiente:</strong> navega entre páginas',
                    'jump' => '<strong>números:</strong> salta directamente a una página específica',
                    'info' => '<strong>indicador:</strong> te muestra cuántas notificaciones hay en total'
                ]
            ],
            'sort' => [
                'title' => 'Ordenar columnas',
                'text' => 'Haz clic en el encabezado de cualquier columna (tipo, contenido o fecha) para ordenar las notificaciones:',
                'list' => [
                    'asc' => '<strong>Primer clic:</strong> ordena de forma ascendente (a→z, más antigua→más reciente)',
                    'desc' => '<strong>Segundo clic:</strong> ordena de forma descendente (z→a, más reciente→más antigua)',
                    'visual' => '<strong>Indicador visual:</strong> aparece una flechita que muestra el orden actual'
                ]
            ]
        ],
        'actions' => [
            'title' => 'Botones de acciones',
            'intro' => 'Cada notificación tiene <strong>dos botones</strong> en la columna "acciones":',
            'details' => [
                'title' => 'Ver detalles (botón azul con ícono de ojo)',
                'what' => '<strong>Qué hace:</strong> abre una ventana emergente con toda la información completa de la notificación.',
                'when' => '<strong>Cuándo usarlo:</strong> cuando quieres saber exactamente qué pasó, quién hizo el cambio, y más detalles.'
            ],
            'mark' => [
                'title' => 'Marcar como leída / marcar como no leída',
                'desc' => 'Este botón cambia según si la notificación ya fue leída o no:',
                'unread_state' => [
                    'title' => 'Si la notificación no ha sido leída:',
                    'list' => [
                        'visual' => 'Aparece un botón <strong>azul</strong> con un ícono de check',
                        'hover' => 'Dice "marcar como leída" (al pasar el mouse)',
                        'action' => '<strong>Qué hace:</strong> al hacer clic, marca la notificación como leída. el número en la campana disminuye.'
                    ]
                ],
                'read_state' => [
                    'title' => 'Si la notificación ya fue leída:',
                    'list' => [
                        'visual' => 'Aparece un botón <strong>gris</strong> con un ícono de x',
                        'hover' => 'Dice "marcar como no leída" (al pasar el mouse)',
                        'action' => '<strong>Qué hace:</strong> al hacer clic, marca la notificación como no leída nuevamente. el número en la campana aumenta.'
                    ]
                ]
            ]
        ],
        'modal' => [
            'title' => 'Ventana de detalles (modal)',
            'intro' => 'Esta es la ventana emergente que aparece cuando haces clic en <strong>"ver detalles"</strong>.',
            'look' => [
                'title' => 'Cómo se ve',
                'desc' => 'La ventana aparece <strong>en el centro de la pantalla</strong>, con un fondo oscurecido detrás. se divide en tres partes:',
                'part1' => [
                    'title' => '1. Parte superior (título)',
                    'text' => 'Muestra el <strong>mensaje principal</strong> de la notificación. por ejemplo: "notificación". en la esquina superior derecha hay una <strong>x</strong> para cerrar la ventana.'
                ],
                'part2' => [
                    'title' => '2. Parte central (contenido detallado)',
                    'text' => 'Aquí se muestra información completa que varía según el tipo de notificación:'
                ],
                'accordion' => [
                    'comment' => 'Si es un comentario',
                    'comment_content' => "Se ha agregado un nuevo comentario en tu ticket\n\n────────────────────────────────────────\n\nComentario de: Iván\nEn ticket: \"Ticket de prueba 3\"\nComentario: \"Este es un comentario de ejemplo del administrador\"\n\n────────────────────────────────────────\n\nFecha: 13/06/2025 11:20     [Ver Ticket]",
                     'status' => 'Si es un cambio de estado',
                     'status_content' => "El ticket con ID 22 ha sido actualizado\n\n────────────────────────────────────────\n\nTicket: \"No se puede iniciar sesión\"\nNuevo estado: En Proceso\nPrioridad: Alta\nActualizado por: Admin Iván\n\n────────────────────────────────────────\n\nFecha: 12/06/2025 09:30     [Ver Ticket]",
                     'created' => 'Si es un ticket creado',
                     'created_content' => "Nuevo ticket creado con ID 29\n\n────────────────────────────────────────\n\nCreado por: Luis\nTicket: \"Error al guardar archivo\"\n\n────────────────────────────────────────\n\nFecha: 10/06/2025 14:22     [Ver Ticket]",
                     'closed' => 'Si es un ticket cerrado',
                     'closed_content' => "El ticket ha sido cerrado\n\n────────────────────────────────────────\n\nTicket cerrado: \"Problema con la base de datos\"\nCerrado por: Admin Carlos\n\n────────────────────────────────────────\n\nFecha: 08/06/2025 16:45     [Ver Ticket]",
                     'reopened' => 'Si es un ticket reabierto',
                     'reopened_content' => "El ticket ha sido reabierto\n\n────────────────────────────────────────\n\nTicket reabierto: \"Solicitud de nueva funcionalidad\"\nReabierto por: Luis\n\n────────────────────────────────────────\n\nFecha: 09/06/2025 10:15     [Ver Ticket]"
                ],
                'part3' => [
                    'title' => '3. Parte inferior (botones)',
                    'text' => 'Siempre hay un botón <strong>"cerrar"</strong> (gris) que cierra la ventana y te devuelve a la tabla de notificaciones. si la notificación está relacionada con un ticket específico, también aparece un botón <strong>"ver ticket"</strong> que te lleva directamente a ese ticket.'
                ]
            ]
        ],
        'example' => [
            'title' => 'Ejemplo de uso completo',
            'intro' => 'Imagina esta situación paso a paso:',
            'step1' => [
                'title' => '1. Recibes una notificación',
                'text' => 'Un administrador comenta en tu ticket. automáticamente: el icono de campana en la parte superior muestra un número en círculo amarillo (cuántas notificaciones nuevas tienes).'
            ],
            'step2' => [
                'title' => '2. Abres las notificaciones',
                'text' => 'Haces clic en la campana y llegas a la tabla de notificaciones. ves una fila nueva con: tipo, contenido, fecha.'
            ],
            'step3' => [
                'title' => '3. Ves los detalles',
                'text' => 'Haces clic en el botón azul con el ojo (ver detalles). se abre la ventana emergente que muestra toda la información detallada.'
            ],
            'step4' => [
                'title' => '4. Vas al ticket',
                'text' => 'Haces clic en <strong>"ver ticket"</strong> en la ventana emergente. te lleva directamente a la página de ese ticket (donde puedes leer y responder).'
            ],
            'step5' => [
                'title' => '5. Marcas como leída',
                'text' => 'Vuelves a las notificaciones y haces clic en el botón azul de check (marcar como leída). ahora el botón se vuelve gris con una x y el contador de la campana disminuye.'
            ]
        ],
        'empty' => [
            'title' => 'Si no tienes notificaciones',
            'text' => 'Cuando entras a esta sección y no tienes ninguna notificación, verás un mensaje:<br><br><i class="fas fa-info-circle"></i> no tienes notificaciones.<br><br>esto significa que todo está tranquilo: no ha habido cambios en tus tickets recientemente.'
        ],
        'language' => [
            'title' => 'Cambio de idioma',
            'text' => 'Toda la sección de notificaciones está disponible en <strong>español</strong> e <strong>inglés</strong>. para cambiar el idioma, usa el selector <strong>es</strong> / <strong>en</strong> en la barra superior de navegación. los textos que cambian incluyen: títulos, botones, mensajes, opciones de búsqueda.'
        ]
    ],
    'profile_page' => [
        'title' => 'Ayuda · mi perfil',
        'header' => 'Gestión del perfil y cuenta',
        'breadcrumbs' => 'Perfil',
        'info' => [
            'title' => 'Ver mi información',
            'text1' => 'Para acceder a tus datos personales registrados en la aplicación:',
            'step1' => 'Haz clic en tu <strong>nombre</strong> en la esquina superior derecha (barra superior).',
            'step2' => 'Selecciona la opción <strong>"mi perfil"</strong> en el menú desplegable.',
            'text2' => 'En esta pantalla podrás visualizar:',
            'list' => [
                'name' => '<strong>Nombre completo:</strong> tal como figura en el sistema.',
                'email' => '<strong>Correo electrónico:</strong> tu dirección de email vinculada para notificaciones.',
                'tickets' => '<strong>Tickets creados:</strong> un contador histórico de todas tus solicitudes.'
            ]
        ],
        'edit' => [
            'title' => '¿Cómo edito mis datos?',
            'text1' => 'Actualmente, la edición directa de nombre o correo electrónico está deshabilitada por razones de seguridad y consistencia de datos corporativos.',
            'text2' => 'Si detectas un error en tu información o necesitas actualizar tu email, por favor <strong>crea un ticket</strong> de tipo "consulta" o "administrativo" solicitando el cambio al equipo de soporte.'
        ],
        'security' => [
            'title' => 'Seguridad y sesión',
            'logout_title' => 'Cerrar sesión',
            'logout_text' => 'Si utilizas un ordenador compartido o público, es crucial que cierres tu sesión al terminar.',
            'logout_step1' => 'Haz clic en el icono de <strong>"puerta"</strong> o "cerrar sesión" en la barra superior derecha.',
            'logout_step2' => 'O despliega el menú de usuario y selecciona "salir".',
            'password_title' => 'Cambio de contraseña',
            'password_text' => 'Si has olvidado tu contraseña o deseas cambiarla, deberás utilizar el enlace "¿olvidaste tu contraseña?" en la pantalla de inicio de sesión, o contactar con un administrador para que te envíe un enlace de restablecimiento.'
        ],
        'language' => [
            'title' => 'Idioma',
            'text' => 'La aplicación está disponible en varios idiomas (español e inglés). puedes cambiar el idioma de la interfaz en cualquier momento usando el selector (icono de bandera) situado en la barra superior.'
        ]
    ],
    'admin_intro_page' => [
        'title' => 'Manual operativo · introducción y dashboard',
        'header' => 'Manual del administrador: introducción y dashboard',
        'subtitle' => 'Guía completa de familiarización con la interfaz de gestión it y el cuadro de mando principal.',
        'welcome' => [
            'title' => 'Bienvenida al centro de resolución',
            'text' => 'Bienvenido al panel de administración del sistema de tickets. esta herramienta ha sido diseñada no solo como un repositorio de problemas, sino como un <strong>centro de resolución de incidencias</strong>.',
            'role_desc' => 'Como administrador, usted tiene la responsabilidad de orquestar la solución a los problemas reportados por los usuarios finales. el sistema centraliza todas las solicitudes, eliminando el caos de los correos electrónicos dispersos, llamadas telefónicas no registradas y mensajes de pasillo.',
            'pillars_title' => 'Pilares del sistema:',
            'pillars' => [
                'centralization' => '<strong>Centralización:</strong> toda la información técnica y comunicación en un solo lugar.',
                'traceability' => '<strong>Trazabilidad:</strong> cada acción queda registrada con fecha, hora y autor en el historial.',
                'efficiency' => '<strong>Eficiencia:</strong> flujos de trabajo claros para asignar, gestionar y resolver incidencias.'
            ],
            'goal_title' => 'Objetivo del sistema',
            'goal_text' => 'Minimizar el tiempo de inactividad de los usuarios (downtime) y maximizar la transparencia en la gestión del departamento de it.'
        ],
        'dashboard' => [
            'title' => 'El dashboard principal',
            'intro' => 'Al iniciar sesión, lo primero que verá es el <strong>dashboard</strong>. este panel es su centro de mando para supervisar las operaciones del sistema de soporte. proporciona acceso rápido a métricas clave, eventos recientes y notificaciones pendientes, todo en un vistazo.',
            'img_caption' => 'Fig 1.1 - panel de control principal del administrador',
            'cards_title' => 'Tarjetas de acceso rápido',
            'cards_note' => '<strong>Nota:</strong> las tarjetas disponibles dependen de su tipo de cuenta. los <span class="badge badge-danger">superadministradores</span> ven todas las métricas; los administradores normales tienen una vista simplificada.',
            'superadmin_note' => '<strong>Para superadministradores:</strong> el dashboard muestra 4 tarjetas con acceso directo a las secciones principales de gestión.',
            'users_card' => [
                'title' => 'Usuarios registrados',
                'desc' => 'Suma total de usuarios normales y administradores. click para gestionar usuarios.'
            ],
            'admins_card' => [
                'title' => 'Administradores',
                'desc' => 'Personal técnico con acceso administrativo. click para gestionar admins.'
            ],
            'assigned_tickets_card' => [
                'title' => 'Tickets asignados',
                'desc' => 'Tickets con un administrador responsable. click para ver asignaciones.'
            ],
            'total_tickets_card' => [
                'title' => 'Total de tickets',
                'desc' => 'Todos los tickets registrados en el sistema. click para gestionar tickets.'
            ],
            'events_title' => 'Últimos eventos del sistema',
            'events_text' => 'En la parte central encontrará una tabla con los <strong>5 eventos más recientes</strong> del historial. esto incluye creación de tickets, actualizaciones de estado, comentarios y asignaciones. cada evento muestra: tipo, descripción, usuario responsable y fecha/hora.',
            'events_link' => 'Puede acceder al <strong>historial completo</strong> mediante el botón "ver historial completo" en la esquina superior derecha de la tarjeta.',
            'events_caption' => 'Ejemplo de tabla de eventos recientes',
            'notifications_title' => 'Notificaciones recientes',
            'notifications_text' => 'En la parte inferior se muestran las <strong>5 notificaciones no leídas más recientes</strong>. estas alertas le informan de: nuevos tickets creados, comentarios añadidos, cambios de estado y cierres/reaperturas.',
            'notifications_link' => 'Use el botón "ver todas" para acceder a su bandeja completa de notificaciones y marcarlas como leídas.',
            'notifications_caption' => 'Ejemplo de tabla de notificaciones recientes'
        ],
        'navigation' => [
            'title' => 'Estructura de navegación',
            'sidebar_title' => 'Menú principal (sidebar)',
            'sidebar_desc' => 'La barra lateral izquierda es su herramienta de navegación principal. está dividida en secciones lógicas para facilitar el acceso rápido a las funciones más usadas:',
            'dashboard' => [
                'term' => 'Dashboard',
                'desc' => 'Vuelta al inicio. resumen gráfico de la situación actual.'
            ],
            'tickets' => [
                'term' => 'Tickets',
                'desc' => 'El núcleo del trabajo diario.',
                'list' => [
                    'manage' => '<strong>Gestionar tickets:</strong> listado global de incidencias.',
                    'assigned' => '<strong>Tickets asignados:</strong> su cola de trabajo personal.'
                ]
            ],
            'users' => [
                'term' => 'Usuarios',
                'desc' => '<Em>(solo superadmin)</em> gestión de altas, bajas y modificación de datos de usuarios y personal técnico.'
            ],
            'config' => [
                'term' => 'Config.',
                'desc' => 'Definición de tipos de incidencias y ajustes globales del sistema.'
            ],
            'icons_title' => 'Guía rápida de iconografía',
            'icons_desc' => 'Para mantener la interfaz limpia, utilizamos iconos estandarizados para las acciones comunes. familiarícese con ellos:',
            'table' => [
                'icon' => 'Icono',
                'action' => 'Acción',
                'desc' => 'Descripción',
                'view' => ['action' => 'Ver / detalles', 'desc' => 'Accede a la ficha completa para leer y revisar sin editar.'],
                'edit' => ['action' => 'Editar', 'desc' => 'Modifica los datos del registro (título, estado, prioridad).'],
                'resolve' => ['action' => 'Resolver', 'desc' => 'Acción rápida para marcar un ticket como solucionado.'],
                'delete' => ['action' => 'Eliminar', 'desc' => 'Borrado permanente. requiere confirmación adicional.']
            ]
        ],
        'tips' => [
            'title' => 'Consejos de productividad',
            'list' => [
                'search' => 'Utilice el <strong>buscador global</strong> en la parte superior derecha de las tablas de datos para encontrar usuarios o tickets rápidamente por nombre o ID.',
                'close' => 'Mantenga el dashboard limpio <strong>cerrando definitivamente</strong> los tickets que han sido resueltos y validados por el usuario.',
                'notifications' => 'Revise la campana de <strong>notificaciones</strong> diariamente para no dejar ninguna interacción de usuario sin respuesta.'
            ]
        ]
    ],
    'admin_tickets_page' => [
        'title' => 'Gestión técnica de incidencias',
        'intro' => 'El módulo de tickets es el corazón operativo del help desk. aquí se centraliza la comunicación con el usuario y se ejecutan los flujos de resolución. esta guía detalla los procedimientos estándar para maximizar la eficiencia y cumplir con los acuerdos de nivel de servicio (sla).',
        'lifecycle' => [
            'title' => '2.1. Ciclo de vida y estados del ticket',
            'desc' => 'El sistema utiliza un autómata de estados estricto para gestionar el flujo de trabajo. Comprender estos estados es vital para mantener la bandeja de entrada organizada:',
            'status' => [
                'new' => '<strong>Nuevo (new):</strong> estado inicial automático al crearse el ticket. indica que nadie ha revisado el caso aún. acción requerida: triaje inmediato.',
                'open' => '<strong>Abierto (open):</strong> el ticket ha sido asignado a un agente y se está trabajando en él. el sla de resolución está activo y contando.',
                'pending' => '<strong>Pendiente (pending):</strong> el agente ha solicitado información al usuario y está esperando respuesta. este estado "congela" el contador del sla hasta que el cliente contesta.',
                'solved' => '<strong>Resuelto (solved):</strong> el agente ha proporcionado una solución definitiva. el sistema enviará una notificación al usuario para que confirme la resolución.',
                'closed' => '<strong>Cerrado (closed):</strong> estado final inmutable. el ticket se archiva y no admite nuevas respuestas. solo puede ser consultado como histórico.',
            ],
            'flow_title' => 'Flujo de trabajo recomendado',
            'flow_text' => 'Para una gestión eficiente, se recomienda no dejar tickets en estado "nuevo" por más de 1 hora. si la resolución no es inmediata, cambie el estado a "abierto" para indicar que está siendo procesado, o "pendiente" si el bloqueo está en el lado del cliente.'
        ],
        'triage' => [
            'title' => '2.2. Protocolos de asignación y triaje',
            'desc' => 'El triaje es el proceso de categorización y asignación inicial. un ticket mal asignado aumenta drásticamente el tiempo de resolución (ttr).',
            'manual' => '<strong>Asignación directa (push):</strong> un supervisor o dispatcher revisa la cola de "nuevos" y asigna manualmente el ticket al especialista más adecuado según la categoría (hardware, software, redes).',
            'claim' => '<strong>Auto-asignación (pull):</strong> en equipos ágiles, los agentes toman proactivamente los tickets de la bolsa general ("pool") utilizando el botón "asignarme a mí".',
            'filters_title' => 'Filtrado de colas',
            'filters_text' => 'Utilice los filtros superiores de la bandeja de entrada para alternar entre "mis tickets" (su responsabilidad directa), "tickets sin asignar" (oportunidades de trabajo) y "todos" (supervisión global).'
        ],
        'sla' => [
            'title' => '2.3. Matriz de prioridad y sla',
            'desc' => 'La prioridad define la urgencia del ticket y sus tiempos de respuesta esperados. el sistema puede enviar alertas si estos tiempos se violan.',
            'high' => [
                'tag' => 'Alta (crítico)',
                'desc' => 'Incidencias que detienen la operación crítica del negocio o afectan a múltiples usuarios.',
                'time' => 'Tiempos meta: respuesta < 1h | resolución < 4h'
            ],
            'medium' => [
                'tag' => 'Media (normal)',
                'desc' => 'Degradación del servicio que no detiene la operación, o problemas funcionales para un único usuario.',
                'time' => 'Tiempos meta: respuesta < 4h | resolución < 24h'
            ],
            'low' => [
                'tag' => 'Baja (consulta)',
                'desc' => 'Peticiones de información, dudas o sugerencias que no afectan la funcionalidad del sistema.',
                'time' => 'Tiempos meta: respuesta < 24h | resolución < 72h'
            ]
        ],
        'features' => [
            'title' => '2.4. Herramientas de resolución',
            'desc' => 'Dentro de la vista de detalle del ticket, el agente dispone de un set de herramientas para interactuar:',
            'reply' => '<strong>Respuesta pública:</strong> envía un correo electrónico al cliente. use esto para pedir datos o dar soluciones. se admite formato enriquecido (negritas, listas, enlaces).',
            'notes' => '<strong>Notas internas (privado):</strong> permite dejar comentarios que solo verán otros agentes. ideal para documentar pasos técnicos, dejar bitácora de llamadas o pedir consejo a compañeros sin alertar al cliente.',
            'files' => '<strong>Adjuntos del sistema:</strong> puede subir logs, capturas de pantalla o documentos PDF. el sistema escanea y bloquea extensiones peligrosas (.exe, .sh) automáticamente.'
        ]
    ],
    'admin_users_page' => [
        'title' => 'Administración de identidad y accesos (iam)',
        'intro' => 'Control de cuentas de usuario, roles y permisos de acceso al sistema.',
        'types' => [
            'title' => '3.1. Tipología de cuentas',
            'desc' => 'El sistema distingue estrictamente entre dos tipos de actores por razones de seguridad y operatividad. ambos tienen accesos y portales diferenciados.',
            'client_title' => 'Usuario final (client)',
            'client_desc' => 'Empleados o clientes que requieren asistencia técnica. acceden exclusivamente al portal de usuario para crear tickets.',
            'admin_title' => 'Administrador (staff)',
            'admin_desc' => 'Personal técnico encargado de resolver incidencias. acceden al panel de administración (backoffice) para gestionar operaciones.',
        ],
        'manage_users' => [
            'title' => '3.2. Gestión de usuarios finales',
            'desc' => 'Operaciones estándar de administración para la base de datos de clientes.',
            'create' => [
                'title' => 'Alta de nuevo usuario',
                'steps' => [
                    '1' => 'Navegue a <strong>usuarios > crear nuevo</strong>.',
                    '2' => 'Complete los campos obligatorios: nombre completo y correo electrónico corporativo.',
                    '3' => 'Establezca una contraseña temporal segura.',
                ]
            ],
            'password' => [
                'title' => 'Restablecimiento de contraseñas',
                'desc' => 'Para resetear, edite el usuario y escriba la nueva clave. si deja el campo vacío, se mantendrá la actual.'
            ]
        ],
        'superadmin' => [
            'title' => '3.3. Gestión de staff (solo superadmin)',
            'desc' => 'Área restringida para la elevación de privilegios y creación de nuevos agentes de soporte.',
            'warning' => 'Otorgar permisos de administrador permite acceso a datos sensibles de tickets y usuarios. proceda con cautela.'
        ]
    ],
    'admin_notifications_page' => [
        'title' => 'Documentación - notificaciones',
        'header' => 'Notificaciones del administrador',
        'subheader' => 'Gestión de alertas y avisos del sistema para mantener el control de las incidencias.',
        'breadcrumbs' => 'Notificaciones',
        'what_is' => [
            'title' => '¿Qué son las notificaciones de administrador?',
            'text' => 'El sistema de notificaciones es el centro de alerta temprana para el equipo de soporte. permite a los administradores reaccionar rápidamente ante nuevos incidentes o respuestas de usuarios sin necesidad de monitorizar constantemente la lista de tickets. cada vez que ocurre un evento relevante en un ticket que te concierne, recibirás un aviso inmediato.'
        ],
        'access' => [
            'title' => 'Cómo acceder a tus notificaciones',
            'intro' => 'Existen <strong>dos métodos principales</strong> para consultar las novedades:',
            'option1' => [
                'title' => 'Opción 1: desde la barra superior (navbar)',
                'text' => 'Esta es la forma más rápida de ver las últimas novedades mientras trabajas en otras áreas.',
                'indicator' => '<strong>Indicador visual:</strong>',
                'li1' => 'En la esquina superior derecha, verás un icono de <strong>campana</strong>.',
                'li2' => 'Si hay un círculo amarillo con un número, indica la cantidad de notificaciones <strong>no leídas</strong>.',
                'li3' => 'Al hacer clic, verás un resumen rápido de las últimas notificaciones.',
                'view_all' => 'Para ver el listado completo, haz clic en "ver todas las notificaciones" al final de ese menú desplegable.'
            ],
            'option2' => [
                'title' => 'Opción 2: listado completo',
                'text' => 'Para una gestión más detallada, puedes acceder a la vista de tabla completa donde podrás filtrar, buscar y gestionar alertas antiguas.',
                'box' => 'Accede pulsando "ver todas" desde la campana o desde el menú lateral si está habilitado.'
            ]
        ],
        'screen' => [
            'title' => 'La pantalla de gestión de notificaciones',
            'text' => 'La vista principal "mis notificaciones" está diseñada para procesar grandes volúmenes de alertas de manera eficiente.',
            'table_title' => 'Estructura de la tabla',
            'table_intro' => 'La información se presenta en 4 columnas clave:',
            'columns' => [
                'col1' => 'Columna', 'col2' => 'Descripción', 'col3' => 'Ejemplo',
                'type' => '<strong>Tipo</strong>',
                'type_desc' => 'Categoría del evento. ayuda a distinguir urgencias.',
                'type_ex' => '<span class="badge badge-info">comentario</span>, <span class="badge badge-success">nuevo ticket</span>',
                'content' => '<strong>Contenido</strong>',
                'content_desc' => 'Resumen breve de lo ocurrido. incluye el ID del ticket y el autor de la acción.',
                'content_ex' => '"Nuevo ticket creado con ID 45 por usuario..."',
                'date' => '<strong>Fecha</strong>',
                'date_desc' => 'Momento exacto en que se generó la alerta.',
                'date_ex' => '10/02/2026 09:30',
                'actions' => '<strong>Acciones</strong>',
                'actions_desc' => 'Herramientas para interactuar con la notificación.',
                'actions_ex' => 'Ver, marcar leída'
            ]
        ],
        'logic' => [
            'title' => 'Lógica de envío: ¿qué notificaciones recibo?',
            'intro' => 'El sistema utiliza reglas inteligentes para no saturar tu bandeja. recibirás avisos según tu rol y asignación:',
            'case1' => [
                'title' => '1. Nuevo ticket creado',
                'who' => '<strong>¿quién la recibe?</strong> todos los administradores.',
                'desc' => 'Para garantizar que ninguna incidencia nueva pase desapercibida, todo el equipo técnico es alertado cuando entra un ticket nuevo.'
            ],
            'case2' => [
                'title' => '2. Respuesta en ticket asignado',
                'who' => '<strong>¿quién la recibe?</strong> solo el admin asignado.',
                'desc' => 'Si tú eres el responsable de un ticket, solo tú recibirás la notificación cuando el usuario conteste, evitando ruido al resto del equipo.'
            ],
            'case3' => [
                'title' => '3. Respuesta en ticket no asignado',
                'who' => '<strong>¿quién la recibe?</strong> todos los administradores.',
                'desc' => 'Si un ticket no tiene dueño y el usuario contesta, se avisa a todos para que alguien lo tome.'
            ]
        ],
        'types' => [
            'title' => 'Tipos de eventos',
            'comment' => [
                'title' => 'Nuevo comentario',
                'text' => 'El usuario ha respondido a una de tus preguntas o ha añadido información extra.',
                'priority' => 'Prioridad: alta (el usuario espera feedback).'
            ],
            'new_ticket' => [
                'title' => 'Ticket nuevo',
                'text' => 'Se ha registrado una nueva incidencia en el sistema.',
                'priority' => 'Prioridad: crítica (requiere triaje y asignación).'
            ],
            'reopened' => [
                'title' => 'Ticket reabierto',
                'text' => 'Un usuario ha reabierto un ticket que estaba cerrado, indicando que la solución no fue efectiva.',
                'priority' => 'Prioridad: muy alta (reincidencia).'
            ]
        ],
        'tools' => [
            'title' => 'Herramientas de productividad',
            'search' => [
                'title' => 'Buscador inteligente',
                'text' => 'Usa la caja de búsqueda para encontrar notificaciones específicas. puedes buscar por:',
                'li1' => '<strong>ID del ticket:</strong> escribe "45" para ver todo lo relacionado con ese caso.',
                'li2' => '<strong>Nombre de usuario:</strong> encuentra actividad de un cliente concreto.',
                'li3' => '<strong>Palabras clave:</strong> como "error", "factura", etc.'
            ],
            'org' => [
                'title' => 'Organización',
                'text' => 'El sistema ordena automáticamente las notificaciones, mostrando las más recientes primero.',
                'tip' => 'Consejo: mantén tu bandeja limpia marcando como leídas las notificaciones antiguas.'
            ]
        ],
        'actions' => [
            'title' => 'Acciones principales',
            'intro' => 'En la columna "acciones" encontrarás tres botones fundamentales para tu flujo de trabajo:',
            'view' => [
                'title' => 'Ver detalles',
                'text' => 'Abre un modal con el mensaje completo sin salir de la página. incluye un enlace directo al ticket.'
            ],
            'mark' => [
                'title' => 'Marcar leída',
                'text' => 'Quita el indicador de "nueva". úsalo cuando ya has tomado nota pero quieres mantener el registro.'
            ]
        ],
        'workflow' => [
            'title' => 'Ejemplo de flujo de trabajo ideal',
            'step1' => [
                'title' => '1. Recepción',
                'text' => 'Ves el indicador "1" en la campana. es un cliente respondiendo a un ticket tuyo que estaba en "pendiente".'
            ],
            'step2' => [
                'title' => '2. Revisión rápida',
                'text' => 'Pulsas el botón "ver" (ojo). lees la respuesta del cliente en la ventana modal. ves que adjunta el dato que faltaba.'
            ],
            'step3' => [
                'title' => '3. Acción',
                'text' => 'Desde el modal, haces clic en "ir al ticket". respondes al cliente y cambias el estado a "resuelto".'
            ],
            'step4' => [
                'title' => '4. Finalización',
                'text' => 'Vuelves a notificaciones y marcas la alerta como leída (si aún no lo está) para limpiar tu bandeja de pendientes.'
            ]
        ]
    ],    'admin_events_page' => [
        'title' => 'Documentación - historial de eventos',
        'header_title' => 'Historial de eventos',
        'header_subtitle' => 'Sistema de auditoría y seguimiento de actividades del sistema',
        'index' => [
            'title' => 'En esta guía aprenderás:',
            'what_is' => 'Qué es el historial de eventos',
            'access' => 'Cómo acceder al historial',
            'interface' => 'Entender la interfaz',
            'types' => 'Tipos de eventos registrados',
            'filter' => 'Filtrar y buscar eventos',
            'analyze' => 'Analizar la información',
            'cases' => 'Casos de uso prácticos',
        ],
        'what_is' => [
            'title' => '¿Qué es el historial de eventos?',
            'description' => 'El historial de eventos es un <strong>sistema de auditoría automática</strong> que registra todas las acciones importantes realizadas en la plataforma de gestión de tickets.',
            'function_title' => 'Función principal',
            'function_desc' => 'Proporciona una <strong>trazabilidad completa</strong> de:',
            'function_list' => [
                'who' => '<strong>¿Quién</strong> realizó una acción (usuario o administrador)',
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
                    'title' => 'Resolución de problemas',
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
            'title' => 'Acceso al historial de eventos',
            'restricted_alert' => '<strong>Acceso restringido:</strong> solo los <strong>superadministradores</strong> pueden acceder al historial de eventos. Los administradores normales no tienen permisos para ver esta sección.',
            'how_to_title' => 'Cómo acceder',
            'steps' => [
                '1' => '<strong>Paso 1:</strong> inicia sesión como superadministrador',
                '2' => '<strong>Paso 2:</strong> en el menú lateral izquierdo, localiza la sección <strong>"administración"</strong>',
                '3' => '<strong>Paso 3:</strong> haz clic en <strong>"administración"</strong> para expandir el submenú',
                '4' => '<strong>Paso 4:</strong> selecciona <strong>"historial de eventos"</strong>',
            ],
            'route_info' => '<strong>Ruta:</strong> panel de administración → administración → historial de eventos',
            'url' => '<strong>URL:</strong> <code>/admin/eventhistory</code>',
        ],
        'interface' => [
            'title' => 'La interfaz del historial',
            'intro' => 'La pantalla de historial de eventos presenta una interfaz simplificada centrada en la tabla de datos:',
            'table_title' => 'Tabla de eventos',
            'table_desc' => 'La tabla muestra todos los eventos registrados en el sistema, ordenados cronológicamente:',
            'columns' => [
                'headers' => ['Columna', 'Qué muestra', 'Información adicional'],
                'event_type' => ['<strong>Tipo de Evento</strong>', 'La acción que se realizó', 'Ej: "ticket_created", "user_login"'],
                'description' => ['<strong>Descripción</strong>', 'Detalles específicos del evento', 'Describe qué cambió (ej: "Ticket #123 created by Juan")'],
                'user' => ['<strong>Usuario</strong>', 'Quién realizó la acción', 'Nombre del responsable'],
                'date' => ['<strong>Fecha</strong>', 'Cuándo ocurrió el evento', 'Formato: dd/mm/yyyy HH:mm'],
            ],
            'note' => '<strong>Nota:</strong> los nombres de los tipos de evento se muestran en su formato técnico (ej: <code>ticket_created</code>) para mayor precisión en las búsquedas.',
            'functionalities_title' => 'Funcionalidades de la tabla',
            'cards' => [
                'search' => [
                    'title' => 'Búsqueda global',
                    'loc' => '<strong>Ubicación:</strong> esquina superior derecha de la tabla ("search:")',
                    'func' => '<strong>Función:</strong> filtra dinámicamente los resultados mostrando solo los eventos que contengan el texto ingresado en <strong>cualquiera de sus columnas</strong>.',
                    'example' => '<strong>Ejemplo:</strong> escribe "admin" para ver acciones realizadas pór admins o sobre admins.',
                ],
                'sort' => [
                    'title' => 'Ordenación',
                    'usage' => '<strong>Cómo usarla:</strong> haz clic en cualquier encabezado de columna',
                    'click1' => '<strong>Primer clic:</strong> ordena ascendente (a→z, más antiguo→más reciente)',
                    'click2' => '<strong>Segundo clic:</strong> ordena descendente (z→a, más reciente→más antiguo)',
                ],
                'pagination' => [
                    'title' => 'Paginación',
                    'records' => '<strong>Registros por página:</strong> selector en la esquina superior izquierda',
                    'options' => '<strong>Opciones:</strong> 10, 25, 50 o 100 eventos por página',
                    'nav' => '<strong>Navegación:</strong> botones "anterior/siguiente" en la parte inferior',
                ],
                'view' => [
                    'title' => 'Orden y visualización',
                    'default' => '<strong>Orden por defecto:</strong> cronológico inverso (lo más reciente primero).',
                    'tip' => '<strong>Consejo:</strong> usa la paginación para navegar por el historial antiguo.',
                ]
            ]
        ],
        'event_types' => [
            'title' => 'Tipos de eventos registrados',
            'intro' => 'El sistema registra automáticamente los siguientes tipos de eventos:',
            'headers' => ['Evento', 'Cuándo se registra', 'Ejemplo de Descripción'],
            'tickets' => [
                'title' => 'Eventos de tickets',
                'rows' => [
                    ['<code>ticket_created</code>', 'Cuando un usuario crea un nuevo ticket', '"Ticket #45 creado por usuario@example.com con título \'Error de acceso\'"'],
                    ['<code>ticket_updated</code>', 'Cuando se modifica cualquier campo de un ticket (título, descripción, estado, prioridad, tipo)', '"Ticket #45 actualizado: Estado cambiado de \'Nuevo\' a \'En Proceso\'"'],
                    ['<code>ticket_assigned</code>', 'Cuando un administrador asigna un ticket a otro administrador', '"Ticket #45 asignado a admin@example.com por superadmin@example.com"'],
                    ['<code>ticket_closed</code>', 'Cuando se marca un ticket como cerrado', '"Ticket #45 cerrado por admin@example.com"'],
                    ['<code>comment_added</code>', 'Cuando se añade un comentario a un ticket', '"Comentario añadido al Ticket #45 por admin@example.com"'],
                ]
            ],
            'users' => [
                'title' => 'Eventos de usuarios',
                'rows' => [
                    ['<code>user_created</code>', 'Cuando se registra un nuevo usuario en el sistema', '"Usuario \'Juan Pérez\' (juan@example.com) registrado"'],
                    ['<code>user_updated</code>', 'Cuando se modifica el perfil de un usuario', '"Usuario \'Juan Pérez\' actualizado: Email cambiado"'],
                    ['<code>user_deleted</code>', 'Cuando se elimina una cuenta de usuario', '"Usuario \'Juan Pérez\' (juan@example.com) eliminado por superadmin@example.com"'],
                    ['<code>user_login</code>', 'Cada vez que un usuario inicia sesión', '"Inicio de sesión: usuario@example.com desde IP 192.168.1.100"'],
                    ['<code>user_logout</code>', 'Cuando un usuario cierra sesión manualmente', '"Cierre de sesión: usuario@example.com"'],
                ]
            ],
            'admins' => [
                'title' => 'Eventos de administradores',
                'rows' => [
                    ['<code>admin_created</code>', 'Cuando se crea una nueva cuenta de administrador', '"Administrador \'María López\' (maria@admin.com) creado por superadmin@example.com"'],
                    ['<code>admin_updated</code>', 'Cuando se modifica el perfil de un administrador', '"Administrador \'María López\' actualizado: Rol cambiado a Superadministrador"'],
                    ['<code>admin_deleted</code>', 'Cuando se elimina una cuenta de administrador', '"Administrador \'María López\' eliminado por superadmin@example.com"'],
                    ['<code>admin_login</code>', 'Cada vez que un administrador accede al panel', '"Inicio de sesión admin: admin@example.com desde IP 192.168.1.50"'],
                ]
            ],
            'ticket_types' => [
                'title' => 'Eventos de tipos de tickets',
                'rows' => [
                    ['<code>type_created</code>', 'Cuando se crea un nuevo tipo de ticket', '"Tipo \'Problema de Red\' creado por superadmin@example.com"'],
                    ['<code>type_updated</code>', 'Cuando se modifica un tipo de ticket existente', '"Tipo \'Bug\' actualizado: Descripción modificada"'],
                    ['<code>type_deleted</code>', 'Cuando se elimina un tipo de ticket', '"Tipo \'Problema de Red\' eliminado por superadmin@example.com"'],
                ]
            ],
            'note' => '<strong>Nota:</strong> todos estos eventos se registran <strong>automáticamente</strong> por el sistema. no requieren ninguna acción manual para ser guardados.',
        ],
        'filtering' => [
            'title' => 'Cómo filtrar y buscar eventos',
            'intro' => 'El historial puede contener miles de eventos. la herramienta principal para encontrar información es la <strong>búsqueda global</strong> en la tabla.',
            'strategies_title' => 'Estrategias de búsqueda',
            'pro_tip' => '<strong>Consejo pro:</strong> la barra de búsqueda global es "inteligente". puedes escribir cualquier término que aparezca en la fila para encontrarlo.',
            'by_type' => [
                'title' => '1. Cómo filtrar por tipo de evento',
                'goal' => '<strong>Objetivo:</strong> ver todas las acciones de un tipo específico (ej. creación de tickets).',
                'method' => [
                    '1' => 'Ve a la caja de búsqueda ("search:") arriba a la derecha de la tabla.',
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
                'title' => '2. Cómo filtrar por usuario',
                'goal' => '<strong>Objetivo:</strong> rastrear las acciones de una persona específica.',
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
                'title' => '3. Cómo filtrar por fecha o contenido',
                'goal' => '<strong>Objetivo:</strong> encontrar eventos de un día específico o sobre un tema concreto.',
                'dates_title' => '<strong>Para fechas:</strong>',
                'dates_list' => [
                    'Escribe la fecha en formato <code>YYYY-MM-DD</code> o partes de ella.',
                    '<em>Nota: La búsqueda es textual, así que debe coincidir con el formato mostrado en pantalla.</em>',
                ],
                'content_title' => '<strong>Para contenido (descripción):</strong>',
                'content_list' => [
                    'Escribe palabras clave específicas como "cerrado", "asignado", o el número de un ticket (ej: "Ticket #45").',
                ]
            ],
        ],
        'analysis' => [
            'title' => 'Analizar la información',
            'intro' => 'Una vez que has filtrado los eventos, es momento de analizar la información. aquí algunas estrategias:',
            'patterns_title' => 'Patrones a identificar',
            'cards' => [
                'productivity' => [
                    'title' => 'Análisis de productividad',
                    'what' => '<strong>Qué buscar:</strong>',
                    'list' => [
                        'Número de tickets procesados por administrador',
                        'Tiempo promedio entre creación y primera respuesta',
                        'Cantidad de asignaciones y reasignaciones',
                        'Horarios de mayor actividad',
                    ],
                    'how' => '<strong>Cómo:</strong> busca <code>ticket_updated</code> o <code>comment_added</code> y observa los nombres de usuario.'
                ],
                'anomalies' => [
                    'title' => 'Detección de anomalías',
                    'what' => '<strong>Qué buscar:</strong>',
                    'list' => [
                        'Múltiples inicios de sesión fallidos',
                        'Accesos fuera del horario habitual',
                        'Cambios masivos en poco tiempo',
                        'Eliminaciones inusuales',
                    ],
                    'how' => '<strong>Cómo:</strong> busca eventos de <code>login</code>, <code>deleted</code>, y ordena por fecha/hora'
                ],
                'tracking' => [
                    'title' => 'Seguimiento de tickets',
                    'what' => '<strong>Qué buscar:</strong>',
                    'list' => [
                        'Ciclo de vida completo de un ticket',
                        'Todos los cambios realizados',
                        'Quiénes intervinieron',
                        'Tiempos de resolución',
                    ],
                    'how' => '<strong>Cómo:</strong> usa la búsqueda global escribiendo el ID del ticket (ej: "#123")'
                ],
                'audit' => [
                    'title' => 'Auditoría de cambios',
                    'what' => '<strong>Qué buscar:</strong>',
                    'list' => [
                        'Quién modificó configuraciones críticas',
                        'Cambios en tipos de tickets',
                        'Creación/eliminación de administradores',
                        'Modificaciones de permisos',
                    ],
                    'how' => '<strong>Cómo:</strong> busca <code>admin_created</code>, <code>type_updated</code>, etc.'
                ]
            ],
            'dates_title' => 'Interpretación de fechas y horas',
            'dates_card' => [
                'format' => '<strong>Formato de fecha:</strong> dd/mm/yyyy hh:mm (ejemplo: 09/02/2026 14:35)',
                'elements' => '<strong>Elementos importantes:</strong>',
                'list' => [
                    '<strong>Secuencia temporal:</strong> Ordena por fecha para ver el orden cronológico de eventos',
                    '<strong>Intervalos:</strong> Nota el tiempo entre eventos relacionados (ej: creación y primera respuesta de un ticket)',
                    '<strong>Patrones horarios:</strong> Identifica picos de actividad en ciertas horas',
                    '<strong>Consistencia:</strong> Detecta acciones simultáneas o muy rápidas que puedan ser sospechosas',
                ],
                'important' => '<strong>Importante:</strong> las fechas y horas están en el huso horario del servidor. asegúrate de tener esto en cuenta al analizar eventos.',
            ]
        ],
        'use_cases' => [
            'title' => 'Casos de uso prácticos',
            'intro' => 'Aquí algunos escenarios reales donde el historial de eventos es fundamental:',
            'cases' => [
                '1' => [
                    'title' => 'Caso 1: "un ticket desapareció o se modificó sin autorización"',
                    'situation' => '<strong>Situación:</strong> un usuario reporta que su ticket fue cerrado o modificado sin que nadie le avisara.',
                    'solution_title' => '<strong>Solución:</strong>',
                    'steps' => [
                        'Obtén el ID del ticket (ej: #123)',
                        'En la búsqueda rápida global, escribe "#123"',
                        'Revisa todos los eventos relacionados: creación, actualizaciones, asignaciones',
                        'Identifica quién hizo el cambio y cuándo',
                        'Verifica si fue un error humano o un problema técnico',
                    ],
                    'result' => '<strong>Resultado:</strong> trazabilidad completa de quién, cuándo y cómo se modificó el ticket.',
                ],
                '2' => [
                    'title' => 'Caso 2: "revisar el rendimiento de un administrador"',
                    'situation' => '<strong>Situación:</strong> necesitas evaluar cuánto trabajo ha realizado un administrador en el último mes.',
                    'solution_title' => '<strong>Solución:</strong>',
                    'steps' => [
                        'Escribe el <strong>email del administrador</strong> en la caja de búsqueda.',
                        'La tabla mostrará solo sus acciones.',
                        'Observa las acciones de tipo <code>ticket_updated</code> o <code>comment_added</code>.',
                        'Revisa tickets asignados y resueltos por él.',
                    ],
                    'result' => '<strong>Resultado:</strong> visión general del trabajo realizado por ese usuario.',
                ],
                '3' => [
                    'title' => 'Caso 3: "detectar un posible acceso no autorizado"',
                    'situation' => '<strong>Situación:</strong> sospechas que alguien accedió a una cuenta sin autorización.',
                    'solution_title' => '<strong>Solución:</strong>',
                    'steps' => [
                        'Busca la palabra clave <strong>"login"</strong> en la caja de búsqueda.',
                        'Luego, refina añadiendo el nombre o email del usuario sospechoso.',
                        'Revisa las fechas y horas para encontrar accesos inusuales (madrugada, fines de semana no laborales).',
                    ],
                    'result' => '<strong>Resultado:</strong> identificación de accesos sospechosos para tomar medidas.',
                ],
                '4' => [
                    'title' => 'Caso 4: "¿quién eliminó un tipo de ticket importante?"',
                    'situation' => '<strong>Situación:</strong> un tipo de ticket que se usaba frecuentemente ha desaparecido.',
                     'solution_title' => '<strong>Solución:</strong>',
                    'steps' => [
                        'Busca la palabra clave <strong>"deleted"</strong> o <strong>"type_deleted"</strong>.',
                        'Busca el nombre del tipo en las descripciones si lo recuerdas.',
                        'Identifica quién realizó la eliminación.',
                        'Contacta al responsable para confirmar si fue intencional.',
                    ],
                    'result' => '<strong>Resultado:</strong> responsable identificado y posibilidad de restaurar si fue un error.',
                ],
                '5' => [
                    'title' => 'Caso 5: "auditoría de cumplimiento normativo"',
                    'situation' => '<strong>Situación:</strong> una auditoría externa requiere demostrar trazabilidad de cambios.',
                     'solution_title' => '<strong>Solución:</strong>',
                    'steps' => [
                        'Define el período de auditoría.',
                        'Busca la fecha de inicio (ej: "2026-01-01") para situarte en el tiempo.',
                        'Toma capturas de pantalla o copia los datos relevantes de la tabla.',
                        'Presenta evidencias de quién autorizó cambios críticos.',
                    ],
                    'result' => '<strong>Resultado:</strong> documentación básica para cumplir con requisitos de auditoría.',
                ]
            ]
        ],
        'best_practices' => [
            'title' => 'Buenas prácticas',
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
                'title' => 'Errores comunes',
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
            'title' => 'Limitaciones y consideraciones',
            'aspects_title' => 'Aspectos a tener en cuenta',
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