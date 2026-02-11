<?php
// filepath: src/app/Http/Traits/ValidatesLocale.php

namespace App\Http;

use Illuminate\Http\Request;

/**
 * Valida y gestiona el locale de las requests
 */
trait ValidatesLocale
{
    /**
     * Obtiene y valida el locale desde header o query
     * 
     * @param Request $request
     * @param string $default Locale por defecto
     * @return string
     */
    protected function getValidatedLocale(Request $request, string $default = 'es'): string
    {
        $allowedLocales = ['es', 'en'];
        
        // Intentar obtener del header X-Locale primero
        $locale = $request->header('X-Locale') 
            ?? $request->query('locale')
            ?? $default;

        return in_array($locale, $allowedLocales) ? $locale : $default;
    }

    /**
     * Determina el guard del usuario autenticado
     * 
     * @return string 'user' o 'admin'
     */
    protected function getAuthGuard(): string
    {
        // Aquí necesitamos saber cómo diferencias user de admin
        // Opción 1: Revisar la clase del usuario
        $user = auth('api')->user();
        
        if ($user instanceof \App\Models\Admin) {
            return 'admin';
        }
        
        return 'user';
    }
}

