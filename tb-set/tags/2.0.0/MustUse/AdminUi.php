<?php

namespace tiFy\Plugins\TbSet\MustUse;

use tiFy\App\Traits\App as TraitsApp;

class AdminUi
{
    use TraitsApp;

    /**
     * CONSTRUCTEUR.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->appAddAction('tify_plugins_register');
    }

    /**
     * Déclaration de composants.
     *
     * @return void
     */
    public function tify_plugins_register()
    {
        Plugins::register(
            'AdminUi',
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
}