<?php

return [
    'meta_title' => 'Documentación - Gestión de Usuarios',
    'header_title' => 'Gestión de Usuarios y Administradores',
    'header_subtitle' => 'Guía completa para administrar cuentas de usuarios y administradores del sistema',

    // Índice
    'index_title' => 'En esta guía aprenderás:',
    'index_items' => [
        'users' => 'Gestión de Usuarios Normales',
        'admins' => 'Gestión de Administradores (solo superadmin)',
        'permissions' => 'Diferencias de permisos',
        'practices' => 'Buenas prácticas',
    ],

    // Sección Usuarios
    'users' => [
        'title' => 'Gestión de Usuarios Normales',
        'intro' => 'Los usuarios normales son las personas que pueden crear tickets y consultar el estado de sus solicitudes. Como administrador, puedes gestionar sus cuentas desde el panel de administración.',
        'access_title' => 'Cómo acceder',
        'access_intro' => 'Para acceder a la gestión de usuarios:',
        'access_steps' => [
            '1' => 'Desde el menú lateral izquierdo, busca la sección <strong>"Administrar todos los usuarios"</strong>',
            '2' => 'Haz clic en <strong>"Administrar usuarios"</strong>',
            '3' => 'Se abrirá la pantalla principal con la lista de todos los usuarios registrados',
        ],
        'warning_super' => 'Importante: Esta funcionalidad solo está disponible para superadministradores. Los administradores normales no pueden gestionar usuarios.',
        
        // Tabla de usuarios
        'list_title' => 'La Pantalla de Lista de Usuarios',
        'list_intro' => 'Cuando accedes a esta sección, verás una tabla completa con todos los usuarios del sistema. Puedes ordenar las filas haciendo clic en los encabezados de las columnas.',
        'table_cols_title' => 'Columnas de la tabla',
        'table_head' => ['Columna', 'Qué muestra', 'Para qué sirve'],
        'table_rows' => [
            'id' => ['col' => 'ID', 'show' => 'Identificador único del usuario', 'use' => 'Referencia técnica del usuario en el sistema'],
            'name' => ['col' => 'Nombre', 'show' => 'Nombre completo del usuario', 'use' => 'Identificar visualmente al usuario'],
            'email' => ['col' => 'Email', 'show' => 'Correo electrónico de acceso', 'use' => 'Contacto y credencial de inicio de sesión'],
            'date' => ['col' => 'Fecha de Creación', 'show' => 'Cuándo se registró el usuario', 'use' => 'Saber la antigüedad de la cuenta'],
            'actions' => ['col' => 'Acciones', 'show' => 'Botones de gestión', 'use' => 'Editar o eliminar el usuario'],
        ],

        // Herramientas
        'tools_title' => 'Herramientas de la Tabla',
        'search_title' => 'Búsqueda',
        'search_intro' => 'En la esquina superior derecha encontrarás un campo de búsqueda.',
        'search_how' => 'Cómo usarlo:',
        'search_list' => [
            '1' => 'Escribe el nombre o email del usuario que buscas',
            '2' => 'La tabla filtra automáticamente mientras escribes',
            '3' => 'Borra el texto para ver todos los usuarios nuevamente',
        ],
        'search_ex' => 'Ejemplo: Escribe "maría" para encontrar a María González o maria@example.com',
        'pagination_title' => 'Paginación y Registros por Página',
        'pagination_records' => 'Selector "Mostrar [número] registros":',
        'pagination_records_list' => [
            '1' => 'Ubicado en la esquina superior izquierda',
            '2' => 'Opciones: 10, 25, 50 o 100 usuarios por página',
            '3' => 'Por defecto muestra 10',
        ],
        'pagination_controls' => 'Controles de paginación:',
        'pagination_controls_list' => [
            '1' => 'En la parte inferior de la tabla',
            '2' => 'Botones: "Anterior", números de página, "Siguiente"',
            '3' => 'Indicador: "Mostrando 1 a 10 de 45 registros"',
        ],
    ],

    // Crear Usuario
    'create' => [
        'title' => 'Crear Nuevo Usuario',
        'img_alt' => 'Botón para crear un usuario.',
        'step1' => 'Paso 1: Acceder al formulario de creación',
        'step1_text' => 'En la pantalla de lista de usuarios, en la parte superior derecha, encontrarás un botón verde. Haz clic en él para abrir el formulario de creación.',
        'step2' => 'Paso 2: Rellenar el formulario',
        'step2_intro' => 'El formulario de creación de usuario contiene los siguientes campos:',
        'fields' => [
            'name' => ['label' => 'Nombre completo', 'ph' => 'Ej: Juan Pérez García', 'note' => 'El nombre que verá el usuario en su perfil y que verás tú en la lista.'],
            'email' => ['label' => 'Correo electrónico', 'ph' => 'Ej: juan.perez@empresa.com', 'note' => 'Será su nombre de usuario para iniciar sesión. Debe ser único en el sistema.'],
            'pass' => ['label' => 'Contraseña', 'ph' => 'Mínimo 8 caracteres', 'note' => 'Debe tener al menos 8 caracteres. El usuario podrá cambiarla después.'],
            'confirm' => ['label' => 'Confirmar contraseña', 'ph' => 'Repite la contraseña', 'note' => 'Escribe la misma contraseña para confirmar que no hay errores.'],
        ],
        'required_note' => 'Los campos marcados con * son obligatorios. El formulario no se enviará si faltan.',
        'step3' => 'Paso 3: Guardar el usuario',
        'step3_intro' => 'Una vez completado el formulario correctamente:',
        'step3_list' => [
            '1' => 'Revisa que todos los datos sean correctos',
            '2' => 'Haz clic en el botón verde <strong>"Crear Usuario"</strong> al final del formulario',
            '3' => 'El sistema validará los datos automáticamente',
        ],
        'success_title' => 'Si todo es correcto',
        'success_msg' => 'Usuario creado exitosamente',
        'success_desc' => 'Serás redirigido a la lista de usuarios y el nuevo usuario aparecerá en la tabla.',
        'error_title' => 'Si hay errores',
        'error_intro' => 'El sistema mostrará mensajes de error específicos debajo de cada campo con problema:',
        'error_list' => [
            '1' => '<strong>"El campo nombre es obligatorio"</strong> - Falta rellenar el nombre',
            '2' => '<strong>"El email ya está registrado"</strong> - Ese correo ya existe en el sistema',
            '3' => '<strong>"Las contraseñas no coinciden"</strong> - La contraseña y confirmación son diferentes',
            '4' => '<strong>"La contraseña debe tener al menos 8 caracteres"<strong> - Contraseña muy corta',
        ],
        'error_fix' => 'Corrige los errores indicados y vuelve a hacer clic en "Crear Usuario".',
    ],

    // Editar Usuario
    'edit' => [
        'title' => 'Editar Usuario Existente',
        'img_alt' => 'Sección de botones de acción para usuarios, editar (amarillo) y eliminar (rojo).',
        'when_title' => 'Cuándo editar un usuario',
        'when_list' => [
            '1' => 'El usuario cambió de nombre (por ejemplo, por matrimonio)',
            '2' => 'El correo electrónico ya no es válido y necesita actualizarse',
            '3' => 'El usuario olvidó su contraseña y necesitas restablecerla',
            '4' => 'Hay errores tipográficos en los datos del usuario',
        ],
        'step1' => 'Paso 1: Localizar el usuario',
        'step1_list' => [
            '1' => 'En la lista de usuarios, busca al usuario que quieres editar',
            '2' => 'En la columna "Acciones", verás dos botones',
            '3' => 'Haz clic en el botón <strong>amarillo con icono de lápiz</strong> (Editar)',
        ],
        'step2' => 'Paso 2: Modificar los datos',
        'step2_intro' => 'Se abrirá un formulario pre-rellenado con los datos actuales del usuario. Puedes modificar:',
        'table_head' => ['Campo', '¿Puedes cambiarlo?', 'Consideraciones'],
        'fields' => [
            'name' => 'Sin restricciones',
            'email' => 'Debe ser único (no usado por otro usuario)',
            'pass' => 'Déjala en blanco si NO quieres cambiarla. Rellénala solo si quieres establecer una nueva.',
            'confirm' => 'Solo si cambias la contraseña',
        ],
        'pass_warning' => 'Importante sobre la contraseña: Si dejas los campos de contraseña en blanco, la contraseña actual del usuario NO se modificará. Solo rellena estos campos si quieres cambiarla.',
        'step3' => 'Paso 3: Guardar los cambios',
        'step3_list' => [
            '1' => 'Revisa que todos los cambios sean correctos',
            '2' => 'Haz clic en el botón "Actualizar Usuario"',
            '3' => 'Si todo es correcto, verás un mensaje de éxito y serás redirigido a la lista',
        ],
        'success_msg' => 'Usuario actualizado correctamente',
    ],

    // Eliminar Usuario
    'delete' => [
        'title' => 'Eliminar Usuario',
        'warning' => '¡PRECAUCIÓN! Eliminar un usuario es una acción permanente e irreversible. Todos los datos del usuario se perderán.',
        'when_title' => 'Cuándo eliminar un usuario',
        'when_list' => [
            '1' => 'El usuario ha dejado la organización y ya no necesita acceso',
            '2' => 'Se creó una cuenta de prueba que ya no se necesita',
            '3' => 'Se detectó una cuenta duplicada por error',
            '4' => 'El usuario lo solicita expresamente (derecho al olvido)',
        ],
        'note' => 'Nota: Al eliminar un usuario, todos sus tickets permanecerán en el sistema pero quedarán huérfanos (sin propietario visible). Esto es intencional para mantener el historial.',
        'step1' => 'Paso 1: Solicitar confirmación',
        'step1_text' => 'En la lista de usuarios, localiza al usuario y haz clic en el botón <strong>rojo con icono de papelera</strong> en la columna Acciones.',
        'step2' => 'Paso 2: Pantalla de confirmación',
        'step2_text' => 'Se abrirá una nueva pantalla con un mensaje de advertencia claro.',
        'img_alt' => 'Modal de confirmación de eliminación de usuario.',
        'step3' => 'Paso 3: Confirmar o cancelar',
        'step3_list' => [
            '1' => 'Si haces clic en "Cancelar": Volverás a la lista sin eliminar nada',
            '2' => 'Si haces clic en "Sí, eliminar usuario": El usuario será eliminado permanentemente',
        ],
        'success_msg' => 'Usuario eliminado correctamente',
    ],

    // Administradores
    'admins' => [
        'title' => 'Gestión de Administradores (Solo Superadministrador)',
        'restricted' => 'Acceso restringido: Solo los superadministradores pueden acceder a esta funcionalidad. Los administradores normales no verán esta opción en el menú.',
        'intro' => 'Los administradores son usuarios con permisos especiales que pueden gestionar tickets, usuarios, y el sistema en general. La gestión de administradores funciona de forma similar a la de usuarios, pero con diferencias clave.',
        'access' => 'Cómo acceder',
        'access_steps' => [
            '1' => 'Desde el menú lateral izquierdo, busca la sección <strong>"Administrar todos los usuarios"</strong>',
            '2' => 'Haz clic en <strong>"Administrar admins"</strong>',
            '3' => 'Se abrirá la pantalla con la lista de administradores',
        ],
        'img_alt' => 'Ejemplo de tabla de administradores.',
        'diff_title' => 'Diferencias con la Gestión de Usuarios',
        'diff_head' => ['Característica', 'Usuarios Normales', 'Administradores'],
        'diff_rows' => [
            'access' => ['name' => 'Acceso al sistema', 'user' => 'Panel de usuario (/user)', 'admin' => 'Panel de administración (/admin)'],
            'create' => ['name' => 'Pueden crear tickets', 'user' => 'Sí', 'admin' => 'No'],
            'manage' => ['name' => 'Pueden gestionar tickets', 'user' => 'No', 'admin' => 'Sí'],
            'field' => ['name' => 'Campo adicional', 'user' => 'Ninguno', 'admin' => 'Checkbox "¿Es superadministrador?"'],
            'qty' => ['name' => 'Cantidad recomendada', 'user' => 'Ilimitada', 'admin' => 'Limitada (solo soporte)'],
        ],
        'super_title' => 'Campo Especial: "¿Es Superadministrador?"',
        'super_text' => 'Al crear o editar un administrador, verás un campo adicional que NO existe para usuarios normales:',
        'super_img_alt' => 'Opción de "¿Es superadministrador?" en el formulario de administrador.',
        'no_super_title' => 'Si NO marcas la casilla',
        'no_super_text' => 'El administrador será "normal" y podrá:',
        'no_super_list' => ['Ver tickets asignados a él', 'Comentar en tickets', 'Cambiar estados', 'Ver notificaciones', 'Ver historial'],
        'yes_super_title' => 'Si SÍ marcas la casilla',
        'yes_super_text' => 'El administrador será "super" y podrá hacer TODO lo anterior, más:',
        'yes_super_list' => ['Crear/editar/eliminar usuarios', 'Crear/editar/eliminar administradores', 'Gestionar tipos de tickets', 'Ver TODOS los tickets', 'Sin restricciones'],
        'super_warning' => 'Consejo de seguridad: Solo asigna el rol de superadministrador a personas de máxima confianza. Demasiados superadministradores pueden comprometer la seguridad.',
        'process_title' => 'Proceso Completo de Gestión',
        'process_intro' => 'La gestión de administradores sigue exactamente los mismos pasos que la gestión de usuarios:',
        'op_create' => 'Crear Administrador',
        'op_create_steps' => [
            'btn' => 'Haz clic en el botón verde <strong>"Crear Nuevo Administrador"</strong>',
            'fill' => 'Rellena el formulario: Nombre, Email, Contraseña y <strong>Casilla Superadmin</strong>',
            'save' => 'Haz clic en <strong>"Crear Administrador"</strong>',
        ],
        'op_edit' => 'Editar Administrador',
        'op_edit_steps' => [
            'locate' => 'Localiza al administrador y haz clic en "Editar"',
            'mod' => 'Modifica campos y <strong>cambia estado superadmin</strong> si es necesario',
            'save' => 'Haz clic en <strong>"Actualizar Administrador"</strong>',
            'note' => 'Puedes convertir un admin normal en superadmin (o viceversa) en cualquier momento.',
        ],
        'op_delete' => 'Eliminar Administrador',
        'op_delete_steps' => [
            'locate' => 'Haz clic en el botón rojo "Eliminar"',
            'confirm' => 'Confirma con <strong>"Sí, eliminar administrador"</strong>',
            'warn' => 'ADVERTENCIA: No puedes eliminar tu propia cuenta mientras estés conectado ni el último superadmin.',
        ],
    ],

    // Permisos
    'permissions' => [
        'title' => 'Matriz de Permisos',
        'intro' => 'Esta tabla resume qué puede hacer cada tipo de cuenta en el sistema:',
        'head' => ['Acción', 'Usuario Normal', 'Admin Normal', 'Superadmin'],
        'rows' => [
            'create_own' => 'Crear tickets propios',
            'view_all' => 'Ver todos los tickets',
            'comment' => 'Comentar en tickets',
            'change_status' => 'Cambiar estado de tickets',
            'assign' => 'Asignar tickets',
            'notify' => 'Ver notificaciones',
            'history' => 'Ver historial de eventos',
            'manage_users' => 'Gestionar usuarios',
            'manage_admins' => 'Gestionar administradores',
            'manage_types' => 'Gestionar tipos de tickets',
        ],
        'badges' => [
            'assigned_only' => 'Solo asignados',
            'own_only' => 'Solo propios',
            'all' => 'Todos',
        ],
    ],

    // Buenas Prácticas
    'practices' => [
        'title' => 'Buenas Prácticas',
        'do_title' => 'Recomendaciones',
        'do_list' => [
            '1' => 'Usa emails corporativos para administradores, no personales',
            '2' => 'Establece contraseñas fuertes (8+ caracteres, letras, números, símbolos)',
            '3' => 'Limita los superadministradores a 2-3 personas de confianza',
            '4' => 'Documenta los cambios importantes (quién creó/eliminó qué cuenta)',
            '5' => 'Revisa periódicamente la lista de usuarios para detectar cuentas inactivas',
            '6' => 'Nombra claramente a los usuarios (nombre completo, no apodos)',
        ],
        'dont_title' => 'Evita Estos Errores',
        'dont_list' => [
            '1' => 'No crees usuarios de prueba en el sistema de producción',
            '2' => 'No uses contraseñas simples como "12345678" o "password"',
            '3' => 'No des permisos de superadmin a todos los administradores',
            '4' => 'No elimines usuarios sin confirmar con tu equipo primero',
            '5' => 'No compartas credenciales entre múltiples personas',
            '6' => 'No ignores los emails duplicados al crear cuentas',
        ],
        'tip_title' => 'Consejo',
        'tip_desc' => 'Mantén actualizada una lista externa (documento o hoja de cálculo) con todos los administradores activos, sus roles, y la fecha en que fueron creados. Esto te ayudará en auditorías de seguridad.',
    ],
];