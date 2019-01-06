<?php

namespace tiFy\Plugins\TbSet;

use tiFy\App\Container\AppServiceProvider;
use tiFy\Plugins\TbSet\TbSet;
use tiFy\Plugins\TbSet\ComingSoon\ComingSoon;

class TbSetServiceProvider extends AppServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->app->singleton(
            'tb-set',
            function () {
                return new TbSet();
            }
        )->build();

        $this->app->singleton(
            'tb-set.coming-soon',
            function () {
                return new ComingSoon();
            }
        )->build();
    }
}