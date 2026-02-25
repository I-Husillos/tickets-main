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
        'admin.redirect' => 'admin',
        'admin.login' => 'admin/iniciar-sesion',
        'admin.logout' => 'admin/cerrar-sesion',
        '/' => 'panel-control',
        'admin.manage.dashboard' => 'admin/panel-control',
        'admin.show.profile' => 'admin/perfil',

        'admin.api.token' => 'admin/api/token',


        // Tickets
        'admin.ajax.tickets' => 'admin/tickets/ajax',
        'admin.show.assigned.tickets' => 'admin/tickets/asignados',
        'admin.tickets.update_status' => 'admin/tickets/actualizar-estado/{ticket}',
        'admin.tickets.close' => 'admin/tickets/cerrar/{ticket}',
        'admin.tickets.reopen' => 'admin/tickets/reabrir/{ticket}',
        'admin.ajax.assigned_tickets' => 'admin/tickets/asignados/ajax',
        'admin.tickets.assign' => 'admin/tickets/asignar/{ticket}',
        'admin.manage.tickets' => 'admin/tickets/lista',
        'admin.view.ticket' => 'admin/tickets/{ticket}',


        // Users
        'admin.ajax.users' => 'admin/usuarios/ajax',
        'admin.users.update' => 'admin/usuarios/actualizar/{user}',
        'admin.dashboard.list.users' => 'admin/usuarios/lista',
        'admin.filter.users' => 'admin/usuarios/filtrar',
        'admin.users.add_dashboard' => 'admin/usuarios/dashboard',
        'admin.users.create' => 'admin/usuarios/crear',
        'admin.users.store' => 'admin/usuarios/guardar',
        'admin.users.edit' => 'admin/usuarios/editar/{user}',
        'admin.users.destroy' => 'admin/usuarios/eliminar/{user}',
        'admin.users.confirm_delete' => 'admin/usuarios/confirmar-eliminar/{user}',


        // Comments
        'admin.ajax.ticket_comments' => 'admin/tickets/{ticket}/comentarios/json',
        'admin.comments.add' => 'admin/comentarios/agregar/{ticket}',
        'admin.comments.delete' => 'admin/comentarios/eliminar/{comment}',
        'admin.comments.view' => 'admin/comentarios/ver/{ticket}',


        // Admins
        'admin.ajax.admins' => 'admin/administradores/ajax',
        'admin.dashboard.list.admins' => 'admin/administradores/lista',
        'admin.filter.admins' => 'admin/administradores/filtrar',
        'admin.admins.list' => 'admin/administradores/lista',
        'admin.admins.create' => 'admin/administradores/crear',
        'admin.admins.edit' => 'admin/administradores/editar/{admin}',
        'admin.admins.update' => 'admin/administradores/actualizar/{admin}',
        'admin.admins.confirm_delete' => 'admin/administradores/confirmar-eliminar/{admin}',
        'admin.admins.destroy' => 'admin/administradores/eliminar/{admin}',


        // Types
        'admin.ajax.types' => 'admin/tipos/ajax',
        'admin.types.index' => 'admin/tipos',
        'admin.types.create' => 'admin/tipos/crear',
        'admin.types.edit' => 'admin/tipos/editar/{type}',
        'admin.types.store' => 'admin/tipos/guardar',
        'admin.types.confirm_delete' => 'admin/tipos/confirmar-eliminar/{type}',
        'admin.types.update' => 'admin/tipos/actualizar/{type}',
        'admin.types.destroy' => 'admin/tipos/eliminar/{type}',


        // Notifications
        'admin.ajax.notifications' => 'admin/notificaciones/ajax',
        'admin.notifications' => 'admin/notificaciones',
        'admin.notifications.read' => 'admin/notificaciones/marcar-leida/{notification}',
        'admin.notifications.markAllAsRead' => 'admin/notificaciones/marcar-todas-leidas',
        'admin.notifications.unread' => 'admin/notificaciones/marcar-no-leida/{notification}',
        'admin.notifications.show' => 'admin/notificaciones/mostrar/{notification}',


        // History
        'admin.ajax.events' => 'admin/historial/eventos/ajax',
        'admin.history.events' => 'admin/historial/eventos',

        // Help administrador
        'admin.help.index' => 'ayuda/admin',
        'admin.help.faq' => 'ayuda/admin/preguntas-frecuentes',
        'admin.help.users' => 'ayuda/admin/usuarios',
        'admin.help.tickets' => 'ayuda/admin/tickets',
        'admin.help.notifications' => 'ayuda/admin/notificaciones',
        'admin.help.events' => 'ayuda/admin/eventos',

        // Projects
        'admin.projects.index' => 'admin/proyectos',
        'admin.projects.create' => 'admin/proyectos/crear',
        'admin.projects.store' => 'admin/proyectos/guardar',
        'admin.projects.edit' => 'admin/proyectos/editar/{project}',
        'admin.projects.update' => 'admin/proyectos/actualizar/{project}',
        'admin.projects.confirm_delete' => 'admin/proyectos/confirmar-eliminar/{project}',
        'admin.projects.destroy' => 'admin/proyectos/eliminar/{project}',

        // Tags
        'admin.tags.search' => 'admin/etiquetas/buscar',

        // Admin own tickets (agenda)
        'admin.my.tickets' => 'admin/mis-tickets',
        'admin.my.tickets.create' => 'admin/mis-tickets/crear',
        'admin.my.tickets.store' => 'admin/mis-tickets/guardar',


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
