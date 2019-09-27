<?php declare(strict_types=1);

namespace tiFy\Plugins\TbSet;

use tiFy\Container\ServiceProvider;
use tiFy\Plugins\TbSet\{
    Metaboxes\ComingSoon as ComingSoonMetabox,
    Metaboxes\ContactInfos as ContactInfosMetabox
};
use tiFy\Support\Proxy\Metabox;

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
            $this->getContainer()->get('tb-set');
            $this->getContainer()->get('tb-set.coming-soon');

            Metabox::registerDriver('tb-set.coming-soon', new ComingSoonMetabox());
            Metabox::registerDriver('tb-set.contact-infos', new ContactInfosMetabox());
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
            return new ComingSoon();
        });
    }
}