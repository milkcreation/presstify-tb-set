<?php

/**
 * Exemple de configuration.
 */

return [
    /**
     * Mise en file automatique des scripts de l'interface d'administration.
     * {@internal Chargement avec webpack: "import 'presstify-plugins/tb-set/Resources/assets/index.js';"}
     */
    'admin_enqueue_scripts' => true,

    /**
     * Mise en file automatique des scripts de l'interface utilisateur.
     * {@internal Chargement avec webpack: "import 'presstify-plugins/tb-set/Resources/assets/index.js';"}
     */
    'wp_enqueue_scripts' => true
];