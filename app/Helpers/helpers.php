<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('saludar')) {

    function saludar($nombre = 'Usuario')
    {
        return "Hola {$nombre}";
    }
}

if (!function_exists('moneda')) {

    function moneda($valor)
    {
        return '$' . number_format($valor, 0, ',', '.');
    }
}

if (!function_exists('telefono_whatsapp')) {

    function telefono_whatsapp($numero)
    {
        return preg_replace('/[^0-9]/', '', $numero);
    }
}

if (!function_exists('wa_link')) {

    function wa_link($numero, $mensaje = '')
    {
        $numero = preg_replace('/[^0-9]/', '', $numero);

        return "https://wa.me/{$numero}?text=" . urlencode($mensaje);
    }
}

if (!function_exists('current_user')) {
    function current_user()
    {
        return auth()->user();
    }

    function active_user()
    {
        return auth()->user();
    }

    
}

if (!function_exists('___')) {

    function ___($key, $default = null, $replace = [], $locale = null)
    {
        $translation = __($key, $replace, $locale);

        return $translation === $key
            ? ($default ?? $key)
            : $translation;
    }
}