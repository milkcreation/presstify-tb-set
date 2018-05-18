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
use tiFy\Apps\AppsServiceProvider;
use tiFy\Plugins\AdminUi\AdminUi;

final class TbSet extends AppController
{
    /**
     * CONSTRUCTEUR
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->appAddAction('tify_app_register');
    }

    /**
     * Déclaration d'application connexes
     *
     * @param AppsServiceProvider $app Classe de rappel du controleur de fournisseur de services.
     *
     * @return void
     */
    public function tify_app_register($app)
    {
        $app->setApp(
            AdminUi::class,
            [
                'admin_bar_menu_logo' => [
                    [
                        'id'    => 'tb-logo',
                        'title' => '<span class="tigreblanc-logo" style="font-size:35px;"></span>',
                        'href'  => 'http://www.tigreblanc.fr',
                        'meta'  => [
                            'title'  => __('A propos de Tigre Blanc', 'tify'),
                            'target' => '_blank',
                        ],
                    ],
                    [
                        'id'     => 'tb-logo-site',
                        'parent' => 'tb-logo',
                        'title'  => __('Site Officiel de Tigre Blanc', 'tify'),
                        'href'   => 'http://www.tigreblanc.fr',
                    ],
                    [
                        'id'     => 'tb-logo-external',
                        'parent' => 'tb-logo',
                        'group'  => true,
                        'meta'   => [
                            'class' => 'ab-sub-secondary',
                        ],
                    ],
                    [
                        'id'     => 'tb-logo-facebook',
                        'parent' => 'tb-logo-external',
                        'title'  => __('Page Facebook', 'tify'),
                        'href'   => 'http://www.facebook.com/tigreblancdouai',
                        'meta'   => [
                            'target' => '_blank',
                        ],
                    ],
                    [
                        'id'     => 'tb-logo-twitter',
                        'parent' => 'tb-logo-external',
                        'title'  => __('Compte Twitter', 'tify'),
                        'href'   => 'https://twitter.com/TigreBlancDouai',
                        'meta'   => [
                            'target' => '_blank',
                        ],
                    ],
                    [
                        'id'     => 'tb-logo-mailing',
                        'parent' => 'tb-logo',
                        'group'  => true,
                        'meta'   => [
                            'class' => 'ab-sub-primary',
                        ],
                    ],
                    [
                        'id'     => 'tb-logo-mailing-contact',
                        'parent' => 'tb-logo-mailing',
                        'title'  => __('Contact l\'agence', 'tify'),
                        'href'   => 'mailto:contact@tigreblanc.fr',
                    ],
                    [
                        'id'     => 'tb-logo-mailing-support',
                        'parent' => 'tb-logo-mailing',
                        'title'  => __('Support Technique', 'tify'),
                        'href'   => 'mailto:support@tigreblanc.fr',
                    ],
                ],
                'admin_footer_text'   => sprintf(
                    __('Merci de faire de %s le partenaire de votre communication digitale', 'tify'),
                    "<a class=\"tigreblanc-logo\" href=\"http://www.tigreblanc.fr\" style=\"font-size:40px; vertical-align:middle; display:inline-block;\" target=\"_blank\"></a>"
                )
            ]
        );
    }

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
        \wp_register_style(
            'tiFyPluginTbSet',
            $this->appUrl() . '/assets/fonts/tb/styles.css',
            current_time('timestamp')
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
            \wp_enqueue_style('tiFyPluginTbSet');
        endif;
    }

    /**
     * Mise en file des scripts dans l'interface administrateur.
     *
     * @return void
     */
    public function admin_enqueue_scripts()
    {
        \wp_enqueue_style('tiFyPluginTbSet');
    }
}
