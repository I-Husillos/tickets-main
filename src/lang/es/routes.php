<?php

return [
        'home' => '/',
        'login' => 'iniciar-sesion',
        'user' => 'usuario',
        'register' => 'registrarse',
        'user.logout' => 'cerrar-sesion',

        'user.tickets.search' => 'usuario/tickets/buscar',

        'user.show.profile' => 'usuario/mostrar-perfil',
        
        'user.dashboard' => 'usuario/panel-control',

        'user.tickets.index' => 'usuario/tickets/lista',
        'user.tickets.create' => 'usuario/tickets/crear',
        'user.tickets.edit' => 'usuario/tickets/editar/{ticket}',
        'user.tickets.update' => 'usuario/tickets/actualizar/{ticket}',
        'user.tickets.store' => 'usuario/tickets/almacenar',
        'user.tickets.show' => 'usuario/tickets/{ticket}',
        'user.tickets.comment' => 'usuario/tickets/agregar-comentario/{ticket}',
        'user.tickets.validate' => 'usuario/tickets/validar/{ticket}',
        'user.tickets.destroy' => 'usuario/tickets/eliminar/{ticket}',
        'user.ticket.comment.delete' => 'usuario/tickets/eliminar-comentario/{comment}',
        'user.ticket.comment.edit' => 'usuario/tickets/editar-comentario/{comment}',
        'user.ticket.comment.update' => 'usuario/tickets/actualizar-comentario/{comment}',

        'user.notifications' => 'usuario/notificaciones',
        'user.notifications.read' => 'usuario/notificaciones/marcar-leida/{notification}',
        'user.notifications.unread' => 'usuario/notificaciones/marcar-no-leida/{notification}',
        'user.notifications.show' => 'usuario/notificaciones/mostrar/{notification}',

        // Help usuario
        'user.help.index' => 'ayuda/usuario',
        'user.help.profile' => 'ayuda/usuario/perfil',
        'user.help.faq' => 'ayuda/usuario/preguntas-frecuentes',
        'user.help.tickets' => 'ayuda/usuario/tickets',
        'user.help.notifications' => 'ayuda/usuario/notificaciones',

        //administrador
        'admin.redirect' => 'administrador',
        'admin.login' => 'administrador/iniciar-sesion',
        'admin.logout' => 'administrador/cerrar-sesion',
        '/' => 'panel-control',
        'admin.manage.dashboard' => 'administrador/panel-control',
        'admin.show.profile' => 'administrador/perfil',

        'admin.api.token' => 'admin/api/token',


        // Tickets
        'admin.ajax.tickets' => 'administrador/tickets/ajax',
        'admin.show.assigned.tickets' => 'administrador/tickets/asignados',
        'admin.tickets.update_status' => 'administrador/tickets/actualizar-estado/{ticket}',
        'admin.tickets.close' => 'administrador/tickets/cerrar/{ticket}',
        'admin.tickets.reopen' => 'administrador/tickets/reabrir/{ticket}',
        'admin.ajax.assigned_tickets' => 'administrador/tickets/asignados/ajax',
        'admin.tickets.assign' => 'administrador/tickets/asignar/{ticket}',
        'admin.manage.tickets' => 'administrador/tickets/lista',
        'admin.view.ticket' => 'administrador/tickets/{ticket}',


        // Users
        'admin.ajax.users' => 'administrador/usuarios/ajax',
        'admin.users.update' => 'administrador/usuarios/actualizar/{user}',
        'admin.dashboard.list.users' => 'administrador/usuarios/lista',
        'admin.filter.users' => 'administrador/usuarios/filtrar',
        'admin.users.add_dashboard' => 'administrador/usuarios/dashboard',
        'admin.users.create' => 'administrador/usuarios/crear',
        'admin.users.store' => 'administrador/usuarios/guardar',
        'admin.users.edit' => 'administrador/usuarios/editar/{user}',
        'admin.users.destroy' => 'administrador/usuarios/eliminar/{user}',
        'admin.users.confirm_delete' => 'administrador/usuarios/confirmar-eliminar/{user}',


        // Comments
        'admin.ajax.ticket_comments' => 'administrador/tickets/{ticket}/comentarios/json',
        'admin.comments.add' => 'administrador/comentarios/agregar/{ticket}',
        'admin.comments.delete' => 'administrador/comentarios/eliminar/{comment}',
        'admin.comments.view' => 'administrador/comentarios/ver/{ticket}',


        // Admins
        'admin.ajax.admins' => 'administrador/administradores/ajax',
        'admin.dashboard.list.admins' => 'administrador/administradores/lista',
        'admin.filter.admins' => 'administrador/administradores/filtrar',
        'admin.admins.list' => 'administrador/administradores/lista',
        'admin.admins.create' => 'administrador/administradores/crear',
        'admin.admins.edit' => 'administrador/administradores/editar/{admin}',
        'admin.admins.update' => 'administrador/administradores/actualizar/{admin}',
        'admin.admins.confirm_delete' => 'administrador/administradores/confirmar-eliminar/{admin}',
        'admin.admins.destroy' => 'administrador/administradores/eliminar/{admin}',


        // Types
        'admin.ajax.types' => 'administrador/tipos/ajax',
        'admin.types.index' => 'administrador/tipos',
        'admin.types.create' => 'administrador/tipos/crear',
        'admin.types.edit' => 'administrador/tipos/editar/{type}',
        'admin.types.store' => 'administrador/tipos/guardar',
        'admin.types.confirm_delete' => 'administrador/tipos/confirmar-eliminar/{type}',
        'admin.types.update' => 'administrador/tipos/actualizar/{type}',
        'admin.types.destroy' => 'administrador/tipos/eliminar/{type}',


        // Notifications
        'admin.ajax.notifications' => 'administrador/notificaciones/ajax',
        'admin.notifications' => 'administrador/notificaciones',
        'admin.notifications.read' => 'administrador/notificaciones/marcar-leida/{notification}',
        'admin.notifications.markAllAsRead' => 'administrador/notificaciones/marcar-todas-leidas',
        'admin.notifications.unread' => 'administrador/notificaciones/marcar-no-leida/{notification}',
        'admin.notifications.show' => 'administrador/notificaciones/mostrar/{notification}',


        // History
        'admin.ajax.events' => 'administrador/historial/eventos/ajax',
        'admin.history.events' => 'administrador/historial/eventos',

        // Help administrador
        'admin.help.index' => 'ayuda/administrador',
        'admin.help.faq' => 'ayuda/administrador/preguntas-frecuentes',
        'admin.help.users' => 'ayuda/administrador/usuarios',
        'admin.help.tickets' => 'ayuda/administrador/tickets',
        'admin.help.notifications' => 'ayuda/administrador/notificaciones',
        'admin.help.events' => 'ayuda/administrador/eventos',

    ];



        // 'add.comment' => 'agregar-comentario',
        // 'delete.comment' => 'eliminar-comentario',
        // 'view.comments' => 'comentarios',
        
        // 'dashboard.list.users' => 'usuarios',
        // 'dashboard.add' => 'agregar-tablero',
        // 'users.create' => 'crear',
        // 'users.store' => 'guardar',
        // 'users.edit' => 'editar/{user}',
        // 'users.update' => 'actualizar/{user}',
        // 'users.confirmDelete' => 'confirmar-eliminacion/{user}',
        // 'users.destroy' => 'eliminar/{user}',
        
        // 'dashboard.list.admins' => 'administradores',
        // 'admins.create' => 'crear',
        // 'admins.store' => 'guardar',
        // 'admins.edit' => 'editar/{admin}',
        // 'admins.update' => 'actualizar/{admin}',
        // 'admins.confirmDelete' => 'confirmar-eliminacion/{admin}',
        // 'admins.destroy' => 'eliminar/{admin}',
        
        // 'types.index' => 'tipos',
        // 'types.create' => 'crear',
        // 'types.store' => 'guardar',
        // 'types.edit' => 'editar/{type}',
        // 'types.update' => 'actualizar/{type}',
        // 'types.destroy' => 'eliminar/{type}',
        // 'types.confirmDelete' => 'confirmar-eliminacion/{type}',
        
        // 'notifications' => 'notificaciones',
        // 'notifications.read' => 'notificaciones/{id}/marcar-leida',
        
        // 'history.events' => 'historial/eventos',




//     'user' => 'usuario',
//     'login' => 'iniciar-sesion',
//     'register' => 'registrarse',
//     'logout' => 'cerrar-sesion',
//     'user'=>[
//         'tickets' =>[
//             'index' => 'tickets',
//             'create' => 'crear',
//             'show' => 'mostrar',
//         ]
//     ],
//     'user.tickets.index' => 'tickets',
//     'user.tickets.create' => 'tickets/crear',
//     'user.tickets.show' => 'tickets/{ticket}',
//     'add_comment' => 'agregar-comentario',
//     'validate_ticket' => 'validar-ticket',
//     'notifications' => 'notificaciones',
//     'read_notification' => 'marcar-leida',
//     'index' => 'inicio',
//     'change_language' => 'cambiar-idioma',
//     'admin' => 'administrador',
//     'dashboard' => 'panel-de-control',
//     'update_status' => 'actualizar-estado',
//     'update' => 'actualizar',
//     'list' => 'listar',
//     'close' => 'cerrar',
//     'reopen' => 'reabrir',
//     'assign' => 'asignar',
//     'assigned' => 'asignados',
//     'users' => 'listado-de-usuarios',
//     'admins' => 'listado-de-administradores',
//     'create' => 'crear',
//     'edit' => 'editar',
//     'confirm_delete' => 'confirmar-eliminacion',
//     'destroy' => 'eliminar',
//     'types' => 'tipos',
//     'comment' => 'comentario',
//     'comments' => 'comentarios',
//     'read' => 'leida',
