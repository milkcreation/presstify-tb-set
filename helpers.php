<?php

use Illuminate\Support\Arr;

if (!function_exists('contact_infos')) :
    /**
     * Récupération de la liste des informations de contact ou d'un attributs particulier.
     *
     * @param null|string $key Nom de qualification de l'attribut à récupérer.
     * @param mixed $default Valeur de retour par défaut.
     *
     * @return array|string
     */
    function contact_infos($key = null, $default = null)
    {
        if (!$contact_infos = get_option('contact_infos')) :
            return $default;
        elseif (is_null($key)) :
            return $contact_infos;
        else :
            return Arr::get($contact_infos, $key, $default);
        endif;
    }
endif;