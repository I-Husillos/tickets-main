<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{

    public function switchLanguage($targetLocale)
    {
        Log::info("Idioma recibido en switchLanguage() antes de procesar: " . $targetLocale);

        

        $allowedLocales = ['es', 'en'];

        Log::info("Idiomas permitidos: " . $allowedLocales[0] . ", " . $allowedLocales[1]);

        Session::put('locale', $targetLocale);
        session()->save();
        Log::warning("Idioma actualizado en sesión y Laravel: " . Session::get('locale'));


        App::setLocale($targetLocale);
        

        // Obtenemos la URL anterior y reemplazamos el prefijo
        $previousUrl = url()->previous(); 
        $currentLocale = app()->getLocale();

        Log::warning("URL anterior: " . $previousUrl);
        Log::warning("Idioma actual: " . $currentLocale);



        $newUrl = str_replace("/$currentLocale", "/$targetLocale", $previousUrl);

    

        return redirect($newUrl);
    }
    
}

