<?php

/**
 * @name TbSet
 * @desc Jeu de fonctionnalités associées aux sites TigreBlanc
 * @author Jordy Manner <jordy@milkcreation.fr>
 * @package presstify-plugins/tb-set
 * @namespace \tiFy\Plugins\TbSet
 * @version 1.1.0
 */

namespace tiFy\Plugins\TbSet;

use tiFy\App\Plugin;
use tiFy\Plugins;
use tiFy\Core\ScriptLoader\ScriptLoader as tFyScriptLoader;

class TbSet extends Plugin
{
    /**
     * CONSTRUCTEUR.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->appAddAction('init');
        $this->appAddAction('theme_before_enqueue_scripts');
        $this->appAddAction('admin_enqueue_scripts');
    }

    /**
     * Initialisation globale.
     *
     * @return void
     */
    public function init()
    {
        tFyScriptLoader::register_style(
            'TbSetPluginFont',
            [
                'src' => $this->appUrl() . '/assets/fonts/tb/styles.css',
            ]
        );
    }

    /**
     * Mise en file des scripts dans l'interface utilisateur.
     *
     * @return void
     */
    public function theme_before_enqueue_scripts()
    {
        if ($this->appConfig('wp_enqueue_style', true)) :
            \wp_enqueue_style('TbSetPluginFont');
        endif;
    }

    /**
     * Mise en file des scripts dans l'interface administrateur.
     *
     * @return void
     */
    final public function admin_enqueue_scripts()
    {
        \wp_enqueue_style('TbSetPluginFont');
    }
}
