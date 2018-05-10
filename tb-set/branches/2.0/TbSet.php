<?php

/**
 * @name TbSet
 * @desc Extension PresstiFy de jeu de fonctionnalités associées aux sites TigreBlanc.
 * @author Jordy Manner <jordy@milkcreation.fr>
 * @package presstify-plugins/tb-set
 * @namespace \tiFy\Plugins\TbSet
 * @version 2.0.0
 */

namespace tiFy\Plugins\TbSet;

use tiFy\Apps\AppController;
use tiFy\ScriptLoader\ScriptLoader as tFyScriptLoader;

class TbSet extends AppController
{
    /**
     * Initialisation du controleur.
     *
     * @return void
     */
    public function appBoot()
    {
        $this->appAddAction('init');
        $this->appAddAction('theme_before_enqueue_scripts');
        $this->appAddAction('admin_enqueue_scripts');
    }

    /**
     * Initialisation globale de Wordpress.
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
