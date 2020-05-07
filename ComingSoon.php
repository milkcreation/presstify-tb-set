<?php declare(strict_types=1);

namespace tiFy\Plugins\TbSet;

use tiFy\Plugins\TbSet\Contracts\TbSet;
use tiFy\Plugins\TbSet\Metabox\ComingSoonMetabox;
use tiFy\Support\Proxy\Metabox;

class ComingSoon
{
    /**
     * Instance du gestionnaire du plugin.
     * @var TbSet
     */
    protected $manager;

    /**
     * CONSTRUCTEUR.
     *
     * @param TbSet $manager Instance du gestionnaire du plugin.
     *
     * @return void
     */
    public function __construct(TbSet $manager)
    {
        $this->manager = $manager;

        add_action('init', function () {
            if ($config = config('tb-set.coming-soon', true)) {
                $defaults = [
                    'admin'   => true,
                    'offline' => 'off',
                ];

                config([
                    'tb-set.coming-soon' => is_array($config) ? array_merge($defaults, $config) : $defaults
                ]);

                if ($admin = config('tb-set.coming-soon.admin')) {
                    $defaults = [
                        'name' => 'coming_soon',
                        'value' => get_option('coming_soon') ? : config('tb-set.coming-soon.offline', 'off')
                    ];

                    $attrs = is_array($admin) ? array_merge($defaults, $admin) : $defaults;

                    Metabox::add('tbSetComingSoon', array_merge($attrs, [
                        'driver' => (new ComingSoonMetabox())->setTbSet($this->manager)
                    ]))->setScreen('tify_options@options')->setContext('tab');
                }
            }
        });

        add_action('template_redirect', function () {
            $offline = get_option('coming_soon') ? : config('tb-set.coming-soon.offline', 'off');

            if (($offline === 'on') && !is_user_logged_in()) {
                wp_die(
                    __('Ce site est actuellement en cours de construction.', 'tify'),
                    __('Site en construction', 'tify'),
                    500
                );
            }
        }, 0);
    }
}