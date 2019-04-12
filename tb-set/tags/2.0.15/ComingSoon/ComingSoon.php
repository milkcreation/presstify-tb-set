<?php

namespace tiFy\Plugins\TbSet\ComingSoon;

use tiFy\Contracts\Metabox\MetaboxManager;

class ComingSoon
{
    /**
     * CONSTRUCTEUR.
     *
     * @return void
     */
    public function __construct()
    {
        add_action('init', function () {
            if ($config = config('tb-set.coming-soon', true)) :
                $defaults = [
                    'admin'   => true,
                    'offline' => 'off'
                ];
                config()->set(
                    'tb-set.coming-soon',
                    is_array($config)
                        ? array_merge($defaults, $config)
                        : $defaults
                );

                if (config('tb-set.coming-soon.admin')) :
                    if ($offline = get_option('tbset_comingsoon_offline')):
                        config()->set(
                            'tb-set.coming-soon.offline',
                            $offline
                        );
                    endif;


                    /** @var MetaboxManager $metabox */
                    $metabox = app('metabox');
                    $metabox->add(
                        'tbSetComing-soon',
                        'tify_options@options',
                        [
                            'content' => AdminOptions::class
                        ]
                    );
                endif;
            endif;
        });

        add_action('template_redirect', function () {
            if ((config('tb-set.coming-soon.offline', 'off') === 'on') && !is_user_logged_in()) :
                wp_die(
                    __('Ce site est actuellement en cours de construction.', 'tify'),
                    __('Site en construction', 'tify'),
                    500
                );
            endif;
        }, 0);
    }
}