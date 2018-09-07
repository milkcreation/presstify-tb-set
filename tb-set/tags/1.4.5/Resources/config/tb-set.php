<?php

/**
 * Exemple de configuration.
 */

return [
    /**
     * Mise en file automatique des scripts de l'interface d'administration.
     */
    'admin_enqueue_scripts' => true,

    /**
     * Mise en file automatique des scripts de l'interface utilisateur.
     * {@internal Ajouter "import 'presstify-plugins/tb-set/Resources/assets/font/styles.css';" à votre feuille de style global}
     */
    'wp_enqueue_scripts' => true
];