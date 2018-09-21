<?php

/**
 * Exemple de configuration.
 */

return [
    /**
     * Mise en file automatique des scripts de l'interface d'administration.
     * {@internal Ajouter "import 'presstify-plugins/tb-set/Resources/assets/index.js';" à votre feuille de style admin}
     */
    'admin_enqueue_scripts' => true,

    /**
     * Mise en file automatique des scripts de l'interface utilisateur.
     * {@internal Ajouter "import 'presstify-plugins/tb-set/Resources/assets/index.js';" à votre feuille de style global}
     */
    'wp_enqueue_scripts' => true
];