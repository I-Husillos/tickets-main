<?php

return [
    'faq' => [
        'help' => 'Ayuda',
        'intoduction_title' => 'Introducción',
        'notifications' => 'Notificaciones',
        'frequent_questions' => 'Preguntas frecuentes',
        'user' => [
            'tickets' => 'Tickets',
            'profile' => 'Mi Perfil',
        ],
        'admin' => [
            'users' => 'Usuarios',
            'event_history' => 'Historial de eventos',
            'tickets' => 'Gestión de Tickets',
            'users_and_staff' => 'Usuarios y Staff',
            
            'what_is_admin' => '¿Cuál es mi rol como administrador?',
            'what_is_admin_description' => 'Como administrador, eres responsable de gestionar todo el sistema: revisar y procesar tickets de usuarios, investigar problemas, implementar soluciones, comunicarte con usuarios, crear y gestionar otras cuentas de usuario, monitorear la actividad del sistema, mantener logs de auditoría, y garantizar que todo funcione correctamente. Es un rol de gran responsabilidad pero también de gran poder.',
            
            'tickets_management' => '¿Cómo gestiono tickets efectivamente?',
            'tickets_management_description' => 'Revisa nuevos tickets diariamente sin falta. Evalúa si tienes suficiente información - si no, cambia a "En Revisión" e inmediatamente comenta pidiendo detalles. Asigna prioridad correctamente. Cambia de estado regularmente comunicando al usuario. Documenta tus acciones en comentarios para que el usuario y otros admins entiendan qué sucede. Cuando resuelvas, sé específico sobre qué hiciste. Pide confirmación antes de cerrar. Nunca abandones un ticket sin explicación.',
            
            'admin_roles' => '¿Cuáles son los tipos de administrador?',
            'admin_roles_description' => 'Existen dos niveles: Administrador Normal (gestiona tickets, interactúa con usuarios, pero no puede cambiar configuración global ni crear otros administradores) y Superadministrador (acceso completo a todo el sistema, puede crear usuarios y admins, cambiar configuración, ver toda la auditoría). Elige el rol correcto para cada persona según responsabilidad.',
            
            'security' => '¿Cómo aseguro la integridad del sistema?',
            'security_description' => 'Usa contraseñas fuertes. Nunca compartas credenciales. Revisa regularmente el historial de eventos para actividad sospechosa. Mantén los permisos correctos - no des más acceso del necesario. Documenta cambios importantes. Usa el sistema de auditoría para rastrear quién hizo qué. Si sospechas compromiso de seguridad, notifica inmediatamente al superadministrador. Sigue las políticas de privacidad y cumplimiento de tu organización.',
            
            'when_to_escalate' => '¿Cuándo debo escalar un problema?',
            'when_to_escalate_description' => 'Escala cuando: el usuario sigue sin satisfecho después de varias intentos, el problema es técnico y requiere conocimiento específico, es una característica solicitada que requiere aprobación, afecta múltiples usuarios o es crítico, o involucra seguridad. Escala a un Superadministrador o al equipo técnico apropiado con contexto completo.',
            
            'cannot_do_as_admin' => '¿Qué NO puedo hacer como administrador?',
            'cannot_do_as_admin_description' => 'Como Administrador Normal: no puedes eliminar usuarios (si puedes suspenderlos), no puedes cambiar configuración global del sistema, no puedes crear otros administradores, no puedes ver todo el historial (solo lo relacionado con tus acciones y tus tickets), y no puedes cambiar tipos de tickets. Como Superadministrador, tienes todo el poder, pero úsalo responsablemente - el sistema rastrea tus acciones.',
        ],
    ],
];
