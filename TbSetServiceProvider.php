<?php declare(strict_types=1);

namespace tiFy\Plugins\TbSet;

use tiFy\Container\ServiceProvider;

class TbSetServiceProvider extends ServiceProvider
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
     * @inheritDoc
     */
    public function boot(): void
    {
        add_action('after_setup_theme', function () {
            $this->getContainer()->get('tb-set.coming-soon');
            $this->getContainer()->get('tb-set.contact-infos');
        });
    }

    /**
     * @inheritDoc
     */
    public function register(): void
    {
        $this->getContainer()->share('tb-set', function () {
            return new TbSet($this->getContainer()->get('app'));
        });

        $this->getContainer()->share('tb-set.coming-soon', function () {
            return new ComingSoon($this->getContainer()->get('tb-set'));
        });

        $this->getContainer()->share('tb-set.contact-infos', function () {
            return new ContactInfos($this->getContainer()->get('tb-set'));
        });
    }
}