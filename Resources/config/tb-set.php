<?php

/**
 * Exemple de configuration.
 */

return [
    /**
     * Mise en file automatique des scripts de l'interface d'administration.
     * {@internal Chargement avec webpack: "import 'presstify-plugins/tb-set/Resources/assets/index.js';"}
     * @var boolean
     */
    'admin_enqueue_scripts' => true,

    /**
     * Mise en file automatique des scripts de l'interface utilisateur.
     * {@internal Chargement avec webpack: "import 'presstify-plugins/tb-set/Resources/assets/index.js';"}
     * @var boolean
     */
    'wp_enqueue_scripts' => true,

    /**
     * Activation du message de site en contruction.
     * @var boolean|array
     */
    'coming-soon' => [
        'offline' => 'off',
        'admin'   => true
    ],

    /**
     * Code Google Analytics
     */
    'ua_code' => ''
];