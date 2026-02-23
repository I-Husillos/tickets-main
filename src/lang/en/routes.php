<?php

return [
        'home' => '/',
        'user' => 'user',
        'login' => 'login',
        'register' => 'register',
        'user.logout' => 'logout',

        'user.show.profile' => 'user/profile',

        'user.tickets.search' => 'user/tickets/search',

        'user.dashboard' => 'user/dashboard',

        'user.tickets.index' => 'user/tickets/list',
        'user.tickets.create' => 'user/tickets/create',
        'user.tickets.edit' => 'user/tickets/edit/{ticket}',
        'user.tickets.update' => 'user/tickets/update/{ticket}',
        'user.tickets.store' => 'user/tickets/store',
        'user.tickets.show' => 'user/tickets/{ticket}',
        'user.tickets.comment' => 'user/tickets/add-comment/{ticket}',
        'user.tickets.validate' => 'user/tickets/validate/{ticket}',
        'user.tickets.destroy' => 'user/tickets/destroy/{ticket}',
        'user.ticket.comment.delete' => 'user/tickets/delete-comment/{comment}',
        'user.ticket.comment.edit' => 'user/tickets/edit-comment/{comment}',
        'user.ticket.comment.update' => 'user/tickets/update-comment/{comment}',

        'user.notifications' => 'user/notifications',
        'user.notifications.read' => 'user/notifications/mark-read/{notification}',
        'user.notifications.unread' => 'user/notifications/mark-unread/{notification}',
        'admin.notifications.unread' => 'admin/notifications/mark-unread/{notification}',
        'user.notifications.show' => 'user/notifications/show/{notification}',

        // Help usuario
        'user.help.index' => 'help/user',
        'user.help.profile' => 'help/user/profile',
        'user.help.faq' => 'help/user/frequently-asked-questions',
        'user.help.tickets' => 'help/user/tickets',
        'user.help.notifications' => 'help/user/notifications',


        // Administrator
        'admin.redirect' => 'admin',
        'admin.login' => 'admin/login',
        'admin.logout' => 'admin/logout',
        '/' => 'dashboard',
        'admin.manage.dashboard' => 'admin/dashboard',
        'admin.show.profile' => 'admin/profile',

        'admin.api.token' => 'admin/api/token',

        // Tickets
        'admin.tickets.view' => 'admin/tickets/view/{ticket}',
        'admin.show.assigned.tickets' => 'admin/tickets/assigned',
        'admin.tickets.update_status' => 'admin/tickets/update-status/{ticket}',
        'admin.tickets.close' => 'admin/tickets/close/{ticket}',
        'admin.tickets.reopen' => 'admin/tickets/reopen/{ticket}',
        'admin.ajax.assigned_tickets' => 'admin/tickets/assigned/ajax',
        'admin.tickets.assign' => 'admin/tickets/assign/{ticket}',
        'admin.manage.tickets' => 'admin/tickets/list',
        'admin.view.ticket' => 'admin/tickets/{ticket}',

        // Users
        'admin.ajax.users' => 'admin/users/ajax',
        'admin.users.update' => 'admin/users/update/{user}',
        'admin.dashboard.list.users' => 'admin/users/list',
        'admin.filter.users' => 'admin/users/filter',
        'admin.users.add_dashboard' => 'admin/users/dashboard',
        'admin.users.create' => 'admin/users/create',
        'admin.users.store' => 'admin/users/store',
        'admin.users.edit' => 'admin/users/edit/{user}',
        'admin.users.destroy' => 'admin/users/destroy/{user}',
        'admin.users.confirm_delete' => 'admin/users/confirm-delete/{user}',

        // Comments
        'admin.ajax.ticket_comments' => 'admin/tickets/{ticket}/comments/json',
        'admin.comments.add' => 'admin/comments/add/{ticket}',
        'admin.comments.delete' => 'admin/comments/delete/{comment}',
        'admin.comments.view' => 'admin/comments/view/{ticket}',

        // Admins
        'admin.ajax.admins' => 'admin/admins/ajax',
        'admin.dashboard.list.admins' => 'admin/admins/list',
        'admin.filter.admins' => 'admin/admins/filter',
        'admin.admins.create' => 'admin/admins/create',
        'admin.admins.edit' => 'admin/admins/edit/{admin}',
        'admin.admins.update' => 'admin/admins/update/{admin}',
        'admin.admins.confirm_delete' => 'admin/admins/confirm-delete/{admin}',
        'admin.admins.destroy' => 'admin/admins/destroy/{admin}',

        // Types
        'admin.ajax.types' => 'admin/types/ajax',
        'admin.types.index' => 'admin/types',
        'admin.types.create' => 'admin/types/create',
        'admin.types.edit' => 'admin/types/edit/{type}',
        'admin.types.store' => 'admin/types/store',
        'admin.types.confirm_delete' => 'admin/types/confirm-delete/{type}',
        'admin.types.update' => 'admin/types/update/{type}',
        'admin.types.destroy' => 'admin/types/destroy/{type}',

        // Notifications
        'admin.ajax.notifications' => 'admin/notifications/ajax',
        'admin.notifications' => 'admin/notifications',
        'admin.notifications.read' => 'admin/notifications/mark-read/{notification}',
        'admin.notifications.markAllAsRead' => 'admin/notifications/mark-all-as-read',
        'admin.notifications.show' => 'admin/notifications/show/{notification}',

        // History
        'admin.ajax.events' => 'admin/history/events/ajax',
        'admin.history.events' => 'admin/history/events',

        // Help administrador
        'admin.help.index' => 'help/admin',
        'admin.help.faq' => 'help/admin/frequently-asked-questions',
        'admin.help.users' => 'help/admin/users',
        'admin.help.tickets' => 'help/admin/tickets',
        'admin.help.notifications' => 'help/admin/notifications',
        'admin.help.events' => 'help/admin/events',

        // Projects
        'admin.projects.index' => 'admin/projects',
        'admin.projects.create' => 'admin/projects/create',
        'admin.projects.store' => 'admin/projects/store',
        'admin.projects.edit' => 'admin/projects/edit/{project}',
        'admin.projects.update' => 'admin/projects/update/{project}',
        'admin.projects.confirm_delete' => 'admin/projects/confirm-delete/{project}',
        'admin.projects.destroy' => 'admin/projects/destroy/{project}',

        // Tags
        'admin.tags.search' => 'admin/tags/search',

        // Admin own tickets (agenda)
        'admin.my.tickets' => 'admin/my-tickets',
        'admin.my.tickets.create' => 'admin/my-tickets/create',
        'admin.my.tickets.store' => 'admin/my-tickets/store',


];



        // 'admin.login' => 'login',
        // 'logout' => 'logout',
        // '/' => 'dashboard',
        // 'show.assigned.tickets' => 'assigned',
        
        // 'manage.tickets' => 'tickets',
        // 'view.ticket' => 'view/{ticket}',
        // 'update.ticket' => 'update-status',
        // 'close.ticket' => 'close',
        // 'reopen.ticket' => 'reopen',
        // 'assign.ticket' => 'assign',
        
        // 'add.comment' => 'add-comment',
        // 'delete.comment' => 'delete-comment',
        // 'view.comments' => 'comments',
        
        // 'dashboard.list.users' => 'users',
        // 'dashboard.add' => 'add-dashboard',
        // 'users.create' => 'create',
        // 'users.store' => 'store',
        // 'users.edit' => 'edit/{user}',
        // 'users.update' => 'update/{user}',
        // 'users.confirmDelete' => 'confirm-delete/{user}',
        // 'users.destroy' => 'delete/{user}',
        
        // 'dashboard.list.admins' => 'admins',
        // 'admins.create' => 'create',
        // 'admins.store' => 'store',
        // 'admins.edit' => 'edit/{admin}',
        // 'admins.update' => 'update/{admin}',
        // 'admins.confirmDelete' => 'confirm-delete/{admin}',
        // 'admins.destroy' => 'delete/{admin}',
        
        // 'types.index' => 'types',
        // 'types.create' => 'create',
        // 'types.store' => 'store',
        // 'types.edit' => 'edit/{type}',
        // 'types.update' => 'update/{type}',
        // 'types.destroy' => 'delete/{type}',
        // 'types.confirmDelete' => 'confirm-delete/{type}',
        
        // 'notifications' => 'notifications',
        // 'notifications.read' => 'notifications/{id}/mark-read',
        
        // 'history.events' => 'history/events',




//     'user' => 'user',
//     'login' => 'login',
//     'register' => 'register',
//     'logout' => 'logout',
//     'tickets' => 'tickets',
//     'create_ticket' => 'create-ticket',
//     'show_ticket'  => 'show-ticket',
//     'add_comment' => 'add-comment',
//     'validate_ticket' => 'validate-ticket',
//     'notifications'  => 'notifications',
//     'read_notification' => 'mark-as-read',
//     'index' => 'index',
//     'change_language'  => 'change-language',
//     'admin' => 'admin',
//     'dashboard' => 'dashboard',
//     'update_status' => 'update-status',
//     'update' => 'update',
//     'list' => 'list',
//     'close' => 'close',
//     'reopen' => 'reopen',
//     'assign' => 'assign',
//     'assigned' => 'assigned',
//     'users' => 'list-of-users',
//     'admins'  => 'list-of-admins',
//     'create' => 'create',
//     'edit' => 'edit',
//     'confirm_delete' => 'confirm-delete',
//     'destroy' => 'destroy',
//     'types' => 'types',
//     'comment' => 'comment',
//     'comments' => 'comments',
//     'read' => 'read',



// return [
//     "admin" => [
//       "dashboard" => [
//         "users"=>[
//           "index"
//           "edit"=>"{userid}/",
//           "delete"=>"{userid}",
//         ]
//       ],
//     ],
//   ];
  
  