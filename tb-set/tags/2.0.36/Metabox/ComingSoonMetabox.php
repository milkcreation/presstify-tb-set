<?php declare(strict_types=1);

namespace tiFy\Plugins\TbSet\Metabox;

use tiFy\Plugins\TbSet\Contracts\TbSet;
use tiFy\Contracts\Metabox\MetaboxDriver as MetaboxDriverContract;
use tiFy\Metabox\MetaboxDriver;

class ComingSoonMetabox extends MetaboxDriver
{
    /**
     * Instance du gestionnaire de l'extension TbSet.
     * @var TbSet|null
     */
    protected $tbSet;

    /**
     * @inheritDoc
     */
    protected $alias = 'coming-soon';

    /**
     * @inheritDoc
     */
    public function boot(): void
    {
        parent::boot();

        $this->set('viewer.directory', $this->tbSet->resources('/views/admin/metabox/' . $this->alias()));
    }

    /**
     * @inheritDoc
     */
    public function defaults(): array
    {
        return array_merge(parent::defaults(), [
            'title' =>  __('Accès au site', 'tify')
        ]);
    }

    /**
     * Définition du gestionnaire de l'extension TbSet.
     *
     * @param TbSet $tb_set
     *
     * @return $this
     */
    public function setTbSet(TbSet $tb_set): MetaboxDriverContract
    {
        $this->tbSet = $tb_set;

        return $this;
    }
}