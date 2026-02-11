<?php
namespace App\Helpers;

class BreadcrumbHelper
{
    // public static function generate()
    // {
    //     $currentRouteName = request()->route()->getName(); // Obtener la ruta actual
    //     $locale = request()->segment(1); // Obtener el idioma desde la URL
    //     $routes = trans('routes', [], $locale); // Cargar traducciones en el idioma correcto

    //     // Iniciar breadcrumbs con "Inicio"
    //     $breadcrumbs = [['name' => __('global.home'), 'url' => route('home', ['locale' => $locale])]];

    //     // Si existe una traducción para la ruta actual, generarla
    //     if (isset($routes[$currentRouteName])) {
    //         $segments = explode('/', $routes[$currentRouteName]); // Dividir la ruta en partes

    //         $urlAccumulator = route('home', ['locale' => $locale]); // Comenzar desde la página de inicio
    //         foreach ($segments as $segment) {
    //             // Limpiar parámetros como {ticket} o {user}
    //             $segmentClean = preg_replace('/\{.*?\}/', '', $segment);

    //             if (!empty($segmentClean)) {
    //                 $urlAccumulator .= '/' . $segment;
    //                 $breadcrumbs[] = [
    //                     'name' => ucfirst(str_replace('-', ' ', __($segmentClean))), // Traducción del segmento
    //                     'url' => $urlAccumulator
    //                 ];
    //             }
    //         }
    //     }

    //     return $breadcrumbs;
    // }
}
