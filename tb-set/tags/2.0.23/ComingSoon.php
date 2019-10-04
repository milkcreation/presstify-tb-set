<?php declare(strict_types=1);

namespace tiFy\Plugins\TbSet;

use tiFy\Support\Proxy\Metabox;

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
            if ($config = config('tb-set.coming-soon', true)) {
                $defaults = [
                    'admin'   => true,
                    'offline' => 'off',
                ];
                config([
                    'tb-set.coming-soon' => is_array($config) ? array_merge($defaults, $config) : $defaults
                ]);

                if (config('tb-set.coming-soon.admin')) {
                    if ($offline = get_option('tbset_comingsoon_offline')) {
                        config([
                            'tb-set.coming-soon.offline' => $offline
                        ]);
                    }

                    Metabox::add('tbSetComingSoon', 'tb-set.coming-soon')
                        ->setScreen('tify_options@options')
                        ->setContext('tab');
                }
            }
        });

        add_action('template_redirect', function () {
            if ((config('tb-set.coming-soon.offline', 'off') === 'on') && !is_user_logged_in()) {
                wp_die(
                    __('Ce site est actuellement en cours de construction.', 'tify'),
                    __('Site en construction', 'tify'),
                    500
                );
            }
        }, 0);
    }
}