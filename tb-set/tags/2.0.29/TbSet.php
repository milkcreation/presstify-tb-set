<?php declare(strict_types=1);

namespace tiFy\Plugins\TbSet;

use App\App;
use WP_Admin_Bar;

/**
 * @desc Extension PresstiFy de jeux de fonctionnalités des sites TigreBlanc.
 * @author Jordy Manner <jordy@milkcreation.fr>
 * @package tiFy\Plugins\TbSet
 * @version 2.0.29
 *
 * USAGE :
 * Activation
 * ---------------------------------------------------------------------------------------------------------------------
 * Dans config/app.php ajouter \tiFy\Plugins\TbSet\TbSetServiceProvider à la liste des fournisseurs de services.
 * ex.
 * <?php
 * ...
 * use tiFy\Plugins\TbSet\TbSetServiceProvider;
 * ...
 *
 * return [
 *      ...
 *      'providers' => [
 *          ...
 *          TbSetServiceProvider::class
 *          ...
 *      ]
 * ];
 *
 * Configuration
 * ---------------------------------------------------------------------------------------------------------------------
 * Dans le dossier de config, créer le fichier tb-set.php
 * @see /vendor/presstify-plugins/tb-set/Resources/config/tb-set.php
 */
class TbSet
{
    /**
     * Instance de l'application
     * @var App
     */
    protected $app;

    /**
     * CONSTRUCTEUR.
     *
     * @param App $app Instance de l'application.
     *
     * @return void
     */
    public function __construct(App $app)
    {
        $this->app = $app;

        // Balises de site.
        $this->app->theme([
            'tag.meta.author'   => 'TigreBlanc Digital',
            'tag.meta.designer' => 'TigreBlanc'
        ]);

        // Personnalisation du logo de la barre d'administration et des sous entrées de menu.
        add_action('admin_bar_menu', function (WP_Admin_Bar $wp_admin_bar) {
            $admin_bar_menu_logo = [
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
            ];

            $wp_admin_bar->remove_menu('wp-logo');

            foreach ($admin_bar_menu_logo as $node) {
                if (!empty($node['group'])) {
                    $wp_admin_bar->add_group($node);
                } else {
                    $wp_admin_bar->add_menu($node);
                }
            }
        }, 11);

        // Mise en file des scripts de l'interface d'administration.
        add_action('admin_enqueue_scripts', function () {
            if (config('tb-set.admin_enqueue_scripts', true)) {
                wp_enqueue_style('TbSet');
            }
        });

        // Personnalisation du pied de page de l'interface d'administration.
        add_filter('admin_footer_text', function ($text = '') {
            return sprintf(
                __('Merci de faire de %s le partenaire de votre communication digitale', 'tify'),
                "<a class=\"tigreblanc-logo\" 
                    href=\"http://www.tigreblanc.fr\" 
                    title=\"Tigre Blanc | Agence de communication, agence web à Lille 🐯\"
                    style=\"font-size:40px; 
                    vertical-align:middle; 
                    display:inline-block;\" 
                    target=\"_blank\"
                    >
                </a>"
            );
        }, 999999);

        // Initialisation de Wordpress.
        add_action('init', function () {
            // Déclaration des scripts.
            wp_register_style(
                'TbSet',
                class_info($this)->getUrl() . '/Resources/assets/css/styles.css',
                current_time('timestamp')
            );
        });

        // Url du logo de l'interface de connection de Wordpress.
        add_filter('login_headerurl', function () {
            return home_url();
        });

        // Intitlulé du lien de l'interface de connection de Wordpress.
        add_filter('login_headertext', function () {
            return get_bloginfo('name') . ' | ' . get_bloginfo('description');
        });

        // Mise en file des scripts de l'interface utilisateur.
        add_action('wp_enqueue_scripts', function () {
            if (config('tb-set.wp_enqueue_scripts', true)) {
                wp_enqueue_style('TbSet');
            }
        });

        //Ajout du code google analytics dans le wp_head
        add_action('wp_head', function () {
            if ($ua = config('tb-set.ua-code')) {
                echo view()->setDirectory(__DIR__ . '/Resources/views/ua-code')->render('ua-code', compact('ua'));
            }
        }, 999999);
    }
}
