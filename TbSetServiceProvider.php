<?php

namespace tiFy\Plugins\TbSet;

use tiFy\App\Container\AppServiceProvider;
use tiFy\Plugins\TbSet\ComingSoon\ComingSoon;

class TbSetServiceProvider extends AppServiceProvider
{
    /**
     * Liste des noms de qualification des services fournis.
     * {@internal Permet le chargement différé des services qualifié.}
     * @var string[]
     */
    protected $provides = [
        'tb-set',
        'tb-set.coming-soon'
    ];

    /**
     * @inheritdoc
     */
    public function boot()
    {
        add_action('after_setup_theme', function () {
            $this->getContainer()->get('tb-set');
            $this->getContainer()->get('tb-set.coming-soon');
        });
    }

    /**
     * @inheritdoc
     */
    public function register()
    {
        $this->getContainer()->share('tb-set', function () {
            return new TbSet();
        });

        $this->getContainer()->share('tb-set.coming-soon', function () {
            return new ComingSoon();
        });
    }
}