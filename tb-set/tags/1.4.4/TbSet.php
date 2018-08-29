<?php

/**
 * @name TbSet
 * @desc Extension PresstiFy de jeu de fonctionnalités associées aux sites TigreBlanc.
 * @author Jordy Manner <jordy@milkcreation.fr>
 * @package presstify-plugins/tb-set
 * @namespace \tiFy\Plugins\TbSet
 * @version 1.4.4
 */

namespace tiFy\Plugins\TbSet;

use tiFy\App\Dependency\AbstractAppDependency;

/**
 * Class TbSet
 * @package tiFy\Plugins\TbSet
 *
 * Activation :
 * ----------------------------------------------------------------------------------------------------
 * Dans config/app.php ajouter \tiFy\Plugins\TbSet\TbSet à la liste des fournisseurs de services
 *     chargés automatiquement par l'application.
 * ex.
 * <?php
 * ...
 * use tiFy\Plugins\TbSet\TbSet;
 * ...
 *
 * return [
 *      ...
 *      'providers' => [
 *          ...
 *          TbSet::class
 *          ...
 *      ]
 * ];
 *
 * Configuration :
 * ----------------------------------------------------------------------------------------------------
 * Dans le dossier de config, créer le fichier social.php
 * @see /vendor/presstify-plugins/social/Resources/config/social.php Exemple de configuration
 */
final class TbSet extends AbstractAppDependency
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $adminui = array_merge(
            config('admin-ui'),
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
        config(['admin-ui' => $adminui]);

        $this->app->appAddAction('init', [$this, 'init']);
        $this->app->appAddAction('wp_enqueue_scripts', [$this, 'wp_enqueue_scripts']);
        $this->app->appAddAction('admin_enqueue_scripts', [$this, 'admin_enqueue_scripts']);
    }

    /**
     * Initialisation globale de Wordpress.
     *
     * @return null
     */
    public function init()
    {
        \wp_register_style(
            'tiFyTbSet',
            class_info($this)->getUrl() . '/Resources/dist/font/styles.css',
            current_time('timestamp')
        );
    }

    /**
     * Mise en file des scripts dans l'interface administrateur.
     *
     * @return null
     */
    public function admin_enqueue_scripts()
    {
        if (config('tb-set.admin_enqueue_scripts', true)) :
            \wp_enqueue_style('tiFyTbSet');
        endif;
    }

    /**
     * Mise en file des scripts dans l'interface utilisateur.
     *
     * @return null
     */
    public function wp_enqueue_scripts()
    {
        if (config('tb-set.wp_enqueue_scripts', true)) :
            \wp_enqueue_style('tiFyTbSet');
        endif;
    }
}
