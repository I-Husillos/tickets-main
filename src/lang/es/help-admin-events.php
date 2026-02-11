<?php

return [
    'title_page' => 'Documentación - Historial de Eventos',
    'header' => [
        'title' => 'Historial de Eventos',
        'subtitle' => 'Sistema de auditoría y seguimiento de actividades del sistema',
    ],
    'index' => [
        'title' => 'En esta guía aprenderás:',
        'items' => [
            'what_is' => 'Qué es el Historial de Eventos',
            'access' => 'Cómo acceder al historial',
            'interface' => 'Entender la interfaz',
            'types' => 'Tipos de eventos registrados',
            'filter' => 'Filtrar y buscar eventos',
            'analyze' => 'Analizar la información',
            'cases' => 'Casos de uso prácticos',
        ],
    ],
    'section_what_is' => [
        'title' => '¿Qué es el Historial de Eventos?',
        'description' => 'El Historial de Eventos es un <strong>sistema de auditoría automática</strong> que registra todas las acciones importantes realizadas en la plataforma de gestión de tickets.',
        'function_title' => 'Función Principal',
        'function_desc' => 'Proporciona una <strong>trazabilidad completa</strong> de:',
        'function_items' => [
            'who' => '<strong>Quién</strong> realizó una acción (usuario o administrador)',
            'what' => '<strong>Qué</strong> acción se realizó (crear, editar, eliminar, asignar, etc.)',
            'when' => '<strong>Cuándo</strong> se realizó (fecha y hora exacta)',
            'about' => '<strong>Sobre qué</strong> se realizó la acción (tickets, usuarios, tipos, etc.)',
        ],
        'purpose_title' => '¿Para qué sirve?',
        'cards' => [
            'security' => [
                'title' => 'Seguridad',
                'items' => [
                    'Detectar actividades sospechosas',
                    'Identificar accesos no autorizados',
                    'Rastrear cambios no deseados',
                    'Responsabilizar acciones específicas',
                ],
            ],
            'audit' => [
                'title' => 'Auditoría',
                'items' => [
                    'Cumplir con requisitos de auditoría',
                    'Generar informes de actividad',
                    'Revisar el historial de cambios',
                    'Documentar el flujo de trabajo',
                ],
            ],
            'troubleshooting' => [
                'title' => 'Resolución de Problemas',
                'items' => [
                    'Identificar cuándo empezó un problema',
                    'Ver qué cambios precedieron un error',
                    'Reconstruir secuencias de eventos',
                    'Entender el contexto de incidencias',
                ],
            ],
            'analysis' => [
                'title' => 'Análisis',
                'items' => [
                    'Analizar patrones de uso',
                    'Medir la productividad del equipo',
                    'Identificar cuellos de botella',
                    'Optimizar procesos',
                ],
            ],
        ],
    ],
    'section_access' => [
        'title' => 'Acceso al Historial de Eventos',
        'restricted_msg' => '<strong>Acceso Restringido:</strong> Solo los <strong>Superadministradores</strong> pueden acceder al Historial de Eventos. Los administradores normales no tienen permisos para ver esta sección.',
        'how_to_title' => 'Cómo acceder',
        'steps' => [
            '1' => '<strong>Paso 1:</strong> Inicia sesión como Superadministrador',
            '2' => '<strong>Paso 2:</strong> En el menú lateral izquierdo, localiza la sección <strong>"Administración"</strong>',
            '3' => '<strong>Paso 3:</strong> Haz clic en <strong>"Administración"</strong> para expandir el submenú',
            '4' => '<strong>Paso 4:</strong> Selecciona <strong>"Historial de Eventos"</strong>',
        ],
        'route_info' => '<strong>Ruta:</strong> Panel de Administración → Administración → Historial de Eventos',
    ],
    'section_interface' => [
        'title' => 'La Interfaz del Historial',
        'intro' => 'La pantalla de Historial de Eventos presenta una interfaz simplificada centrada en la tabla de datos:',
        'table_title' => 'Tabla de Eventos',
        'table_desc' => 'La tabla muestra todos los eventos registrados en el sistema, ordenados cronológicamente:',
        'table' => [
            'headers' => [
                'column' => 'Columna',
                'shows' => 'Qué muestra',
                'extra' => 'Información adicional',
            ],
            'rows' => [
                'type' => [
                    'name' => '<strong>Tipo de Evento</strong>',
                    'desc' => 'La acción que se realizó',
                    'extra' => 'Ej: "ticket_created", "user_login"',
                ],
                'description' => [
                    'name' => '<strong>Descripción</strong>',
                    'desc' => 'Detalles específicos del evento',
                    'extra' => 'Describe qué cambió (ej: "Ticket #123 created by Juan")',
                ],
                'user' => [
                    'name' => '<strong>Usuario</strong>',
                    'desc' => 'Quién realizó la acción',
                    'extra' => 'Nombre del responsable',
                ],
                'date' => [
                    'name' => '<strong>Fecha</strong>',
                    'desc' => 'Cuándo ocurrió el evento',
                    'extra' => 'Formato: dd/mm/yyyy HH:mm',
                ],
            ],
        ],
        'note' => '<strong>Nota:</strong> Los nombres de los tipos de evento se muestran en su formato técnico (ej: <code>ticket_created</code>) para mayor precisión en las búsquedas.',
        'features_title' => 'Funcionalidades de la Tabla',
        'features' => [
            'search' => [
                'title' => 'Búsqueda Global',
                'content' => [
                    '<strong>Ubicación:</strong> Esquina superior derecha de la tabla ("Search:")',
                    '<strong>Función:</strong> Filtra dinámicamente los resultados mostrando solo los eventos que contengan el texto ingresado en <strong>cualquiera de sus columnas</strong>.',
                    '<strong>Ejemplo:</strong> Escribe "admin" para ver acciones realizadas PÓR admins o SOBRE admins.',
                ],
            ],
            'sort' => [
                'title' => 'Ordenación',
                'content' => [
                    '<strong>Cómo usarla:</strong> Haz clic en cualquier encabezado de columna',
                    '<strong>Primer clic:</strong> Ordena ascendente (A→Z, más antiguo→más reciente)',
                    '<strong>Segundo clic:</strong> Ordena descendente (Z→A, más reciente→más antiguo)',
                ],
            ],
            'pagination' => [
                'title' => 'Paginación',
                'content' => [
                    '<strong>Registros por página:</strong> Selector en la esquina superior izquierda',
                    '<strong>Opciones:</strong> 10, 25, 50 o 100 eventos por página',
                    '<strong>Navegación:</strong> Botones "Anterior/Siguiente" en la parte inferior',
                ],
            ],
            'order' => [
                'title' => 'Orden y Visualización',
                'content' => [
                    '<strong>Orden por defecto:</strong> Cronológico inverso (lo más reciente primero).',
                    '<strong>Consejo:</strong> Usa la paginación para navegar por el historial antiguo.',
                ],
            ],
        ],
    ],
    'section_types' => [
        'title' => 'Tipos de Eventos Registrados',
        'intro' => 'El sistema registra automáticamente los siguientes tipos de eventos:',
        'tickets_title' => 'Eventos de Tickets',
        'table_headers' => [
            'event' => 'Evento',
            'when' => 'Cuándo se registra',
            'example' => 'Ejemplo de Descripción',
        ],
        'tickets_rows' => [
            'created' => ['code' => 'ticket_created', 'when' => 'Cuando un usuario crea un nuevo ticket', 'example' => '"Ticket #45 creado por usuario@example.com con título \'Error de acceso\'"'],
            'updated' => ['code' => 'ticket_updated', 'when' => 'Cuando se modifica cualquier campo de un ticket (título, descripción, estado, prioridad, tipo)', 'example' => '"Ticket #45 actualizado: Estado cambiado de \'Nuevo\' a \'En Proceso\'"'],
            'assigned' => ['code' => 'ticket_assigned', 'when' => 'Cuando un administrador asigna un ticket a otro administrador', 'example' => '"Ticket #45 asignado a admin@example.com por superadmin@example.com"'],
            'closed' => ['code' => 'ticket_closed', 'when' => 'Cuando se marca un ticket como cerrado', 'example' => '"Ticket #45 cerrado por admin@example.com"'],
            'commented' => ['code' => 'comment_added', 'when' => 'Cuando se añade un comentario a un ticket', 'example' => '"Comentario añadido al Ticket #45 por admin@example.com"'],
        ],
        'users_title' => 'Eventos de Usuarios',
        'users_rows' => [
            'created' => ['code' => 'user_created', 'when' => 'Cuando se registra un nuevo usuario en el sistema', 'example' => '"Usuario \'Juan Pérez\' (juan@example.com) registrado"'],
            'updated' => ['code' => 'user_updated', 'when' => 'Cuando se modifica el perfil de un usuario', 'example' => '"Usuario \'Juan Pérez\' actualizado: Email cambiado"'],
            'deleted' => ['code' => 'user_deleted', 'when' => 'Cuando se elimina una cuenta de usuario', 'example' => '"Usuario \'Juan Pérez\' (juan@example.com) eliminado por superadmin@example.com"'],
            'login' => ['code' => 'user_login', 'when' => 'Cada vez que un usuario inicia sesión', 'example' => '"Inicio de sesión: usuario@example.com desde IP 192.168.1.100"'],
            'logout' => ['code' => 'user_logout', 'when' => 'Cuando un usuario cierra sesión manualmente', 'example' => '"Cierre de sesión: usuario@example.com"'],
        ],
        'admins_title' => 'Eventos de Administradores',
        'admins_rows' => [
            'created' => ['code' => 'admin_created', 'when' => 'Cuando se crea una nueva cuenta de administrador', 'example' => '"Administrador \'María López\' (maria@admin.com) creado por superadmin@example.com"'],
            'updated' => ['code' => 'admin_updated', 'when' => 'Cuando se modifica el perfil de un administrador', 'example' => '"Administrador \'María López\' actualizado: Rol cambiado a Superadministrador"'],
            'deleted' => ['code' => 'admin_deleted', 'when' => 'Cuando se elimina una cuenta de administrador', 'example' => '"Administrador \'María López\' eliminado por superadmin@example.com"'],
            'login' => ['code' => 'admin_login', 'when' => 'Cada vez que un administrador accede al panel', 'example' => '"Inicio de sesión admin: admin@example.com desde IP 192.168.1.50"'],
        ],
        'types_title' => 'Eventos de Tipos de Tickets',
        'types_rows' => [
            'created' => ['code' => 'type_created', 'when' => 'Cuando se crea un nuevo tipo de ticket', 'example' => '"Tipo \'Problema de Red\' creado por superadmin@example.com"'],
            'updated' => ['code' => 'type_updated', 'when' => 'Cuando se modifica un tipo de ticket existente', 'example' => '"Tipo \'Bug\' actualizado: Descripción modificada"'],
            'deleted' => ['code' => 'type_deleted', 'when' => 'Cuando se elimina un tipo de ticket', 'example' => '"Tipo \'Problema de Red\' eliminado por superadmin@example.com"'],
        ],
        'note' => '<strong>Nota:</strong> Todos estos eventos se registran <strong>automáticamente</strong> por el sistema. No requieren ninguna acción manual para ser guardados.',
    ],
    'section_filter' => [
        'title' => 'Cómo Filtrar y Buscar Eventos',
        'intro' => 'El historial puede contener miles de eventos. La herramienta principal para encontrar información es la <strong>Búsqueda Global</strong> en la tabla.',
        'strategies_title' => 'Estrategias de Búsqueda',
        'pro_tip' => '<strong>Consejo Pro:</strong> La barra de búsqueda global es "inteligente". Puedes escribir cualquier término que aparezca en la fila para encontrarlo.',
        'filter_type' => [
            'title' => '1. Cómo filtrar por Tipo de Evento',
            'goal' => '<strong>Objetivo:</strong> Ver todas las acciones de un tipo específico (ej. Creación de Tickets).',
            'method' => '<strong>Método:</strong>',
            'steps' => [
                '1' => 'Ve a la caja de búsqueda ("Search:") arriba a la derecha de la tabla.',
                '2' => 'Escribe el código del evento (ej: <code>ticket_created</code>).',
                '3' => 'La tabla mostrará solo las filas que contengan ese texto.',
            ],
            'useful_terms' => '<strong>Términos útiles para buscar:</strong>',
            'terms_list' => [
                '<code>ticket_</code>: Muestra todo lo relacionado con tickets.',
                '<code>user_</code>: Muestra acciones sobre usuarios.',
                '<code>login</code>: Muestra accesos al sistema.',
                '<code>comment</code>: Muestra comentarios añadidos.',
            ],
        ],
        'filter_user' => [
            'title' => '2. Cómo filtrar por Usuario',
            'goal' => '<strong>Objetivo:</strong> Rastrear las acciones de una persona específica.',
            'method' => '<strong>Método:</strong>',
            'steps' => [
                '1' => 'Escribe el <strong>nombre</strong> o <strong>email</strong> del usuario en la caja de búsqueda.',
                '2' => 'El sistema filtrará automáticamente.',
            ],
            'examples' => '<strong>Ejemplos:</strong>',
            'examples_list' => [
                'Escribe "admin@example.com" para ver su historial completo.',
                'Escribe "Juan" para ver acciones de cualquier usuario llamado Juan.',
            ],
        ],
        'filter_date' => [
            'title' => '3. Cómo filtrar por Fecha o Contenido',
            'goal' => '<strong>Objetivo:</strong> Encontrar eventos de un día específico o sobre un tema concreto.',
            'for_dates' => '<strong>Para fechas:</strong>',
            'dates_list' => [
                'Escribe la fecha en formato <code>YYYY-MM-DD</code> o partes de ella.',
                '<em>Nota: La búsqueda es textual, así que debe coincidir con el formato mostrado en pantalla.</em>',
            ],
            'for_content' => '<strong>Para contenido (Descripción):</strong>',
            'content_list' => [
                'Escribe palabras clave específicas como "cerrado", "asignado", o el número de un ticket (ej: "Ticket #45").',
            ],
        ],
    ],
    'section_analyze' => [
        'title' => 'Analizar la Información',
        'intro' => 'Una vez que has filtrado los eventos, es momento de analizar la información. Aquí algunas estrategias:',
        'patterns_title' => 'Patrones a Identificar',
        'cards' => [
            'productivity' => [
                'title' => 'Análisis de Productividad',
                'what' => '<strong>Qué buscar:</strong>',
                'items' => [
                    'Número de tickets procesados por administrador',
                    'Tiempo promedio entre creación y primera respuesta',
                    'Cantidad de asignaciones y reasignaciones',
                    'Horarios de mayor actividad',
                ],
                'how' => '<strong>Cómo:</strong> Busca <code>ticket_updated</code> o <code>comment_added</code> y observa los nombres de usuario.',
            ],
            'anomalies' => [
                'title' => 'Detección de Anomalías',
                'what' => '<strong>Qué buscar:</strong>',
                'items' => [
                    'Múltiples inicios de sesión fallidos',
                    'Accesos fuera del horario habitual',
                    'Cambios masivos en poco tiempo',
                    'Eliminaciones inusuales',
                ],
                'how' => '<strong>Cómo:</strong> Busca eventos de <code>login</code>, <code>deleted</code>, y ordena por fecha/hora',
            ],
            'tracking' => [
                'title' => 'Seguimiento de Tickets',
                'what' => '<strong>Qué buscar:</strong>',
                'items' => [
                    'Ciclo de vida completo de un ticket',
                    'Todos los cambios realizados',
                    'Quiénes intervinieron',
                    'Tiempos de resolución',
                ],
                'how' => '<strong>Cómo:</strong> Usa la búsqueda global escribiendo el ID del ticket (ej: "#123")',
            ],
            'audit' => [
                'title' => 'Auditoría de Cambios',
                'what' => '<strong>Qué buscar:</strong>',
                'items' => [
                    'Quién modificó configuraciones críticas',
                    'Cambios en tipos de tickets',
                    'Creación/eliminación de administradores',
                    'Modificaciones de permisos',
                ],
                'how' => '<strong>Cómo:</strong> Busca <code>admin_created</code>, <code>type_updated</code>, etc.',
            ],
        ],
        'dates_title' => 'Interpretación de Fechas y Horas',
        'date_format' => '<strong>Formato de fecha:</strong> dd/mm/yyyy HH:mm (ejemplo: 09/02/2026 14:35)',
        'important_elements' => '<strong>Elementos importantes:</strong>',
        'elements_list' => [
            '<strong>Secuencia temporal:</strong> Ordena por fecha para ver el orden cronológico de eventos',
            '<strong>Intervalos:</strong> Nota el tiempo entre eventos relacionados (ej: creación y primera respuesta de un ticket)',
            '<strong>Patrones horarios:</strong> Identifica picos de actividad en ciertas horas',
            '<strong>Consistencia:</strong> Detecta acciones simultáneas o muy rápidas que puedan ser sospechosas',
        ],
        'timezone_note' => '<strong>Importante:</strong> Las fechas y horas están en el huso horario del servidor. Asegúrate de tener esto en cuenta al analizar eventos.',
    ],
    'section_cases' => [
        'title' => 'Casos de Uso Prácticos',
        'intro' => 'Aquí algunos escenarios reales donde el Historial de Eventos es fundamental:',
        'cases_list' => [
            '1' => [
                'title' => 'Caso 1: "Un ticket desapareció o se modificó sin autorización"',
                'situation' => '<strong>Situación:</strong> Un usuario reporta que su ticket fue cerrado o modificado sin que nadie le avisara.',
                'solution' => '<strong>Solución:</strong>',
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
                'solution' => '<strong>Solución:</strong>',
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
                'solution' => '<strong>Solución:</strong>',
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
                'solution' => '<strong>Solución:</strong>',
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
                'solution' => '<strong>Solución:</strong>',
                'steps' => [
                    'Define el período de auditoría.',
                    'Busca la fecha de inicio (ej: "2026-01-01") para situarte en el tiempo.',
                    'Toma capturas de pantalla o copia los datos relevantes de la tabla.',
                    'Presenta evidencias de quién autorizó cambios críticos.',
                ],
                'result' => '<strong>Resultado:</strong> Documentación básica para cumplir con requisitos de auditoría.',
            ],
        ],
    ],
    'section_practices' => [
        'title' => 'Buenas Prácticas',
        'recommendations_title' => 'Recomendaciones',
        'recommendations_list' => [
            'Revisa el historial regularmente (semanalmente) para detectar anomalías temprano',
            'Usa filtros combinados para búsquedas más precisas',
            'Documenta eventos críticos fuera del sistema si es necesario',
            'Capacita al equipo sobre la importancia de la trazabilidad',
            'Establece políticas claras sobre quién puede realizar acciones críticas',
        ],
        'errors_title' => 'Errores Comunes',
        'errors_list' => [
            '<strong>No revisar el historial:</strong> Perder oportunidades de detectar problemas',
            '<strong>Confiar solo en la memoria:</strong> El historial es la fuente de verdad',
            '<strong>No combinar filtros:</strong> Obtener demasiados resultados irrelevantes',
            '<strong>Ignorar patrones:</strong> No analizar tendencias puede ocultar problemas mayores',
            '<strong>No documentar hallazgos:</strong> Perder evidencias para futuras referencias',
        ],
    ],
    'section_limitations' => [
        'title' => 'Limitaciones y Consideraciones',
        'alert_title' => 'Aspectos a Tener en Cuenta',
        'items' => [
            '<strong>Solo Superadministradores:</strong> Los administradores normales no pueden acceder a esta funcionalidad',
            '<strong>No editable:</strong> Los eventos registrados no se pueden modificar ni eliminar (garantiza integridad)',
            '<strong>Almacenamiento:</strong> Con el tiempo, la tabla crecerá. Considera políticas de retención de datos',
            '<strong>Rendimiento:</strong> Con muchos miles de eventos, las búsquedas pueden volverse más lentas',
            '<strong>Privacidad:</strong> El historial puede contener información sensible. Accede solo cuando sea necesario',
        ],
    ],
];

