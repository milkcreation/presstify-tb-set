<?php declare(strict_types=1);

namespace tiFy\Plugins\TbSet\Metaboxes;

use tiFy\Plugins\TbSet\AbstractMetaboxDriver;

class ComingSoonMetabox extends AbstractMetaboxDriver
{
    /**
     * @inheritDoc
     */
    protected $alias = 'coming-soon';

    /**
     * @inheritDoc
     */
    public function defaults(): array
    {
        return array_merge(parent::defaults(), [
            'title' =>  __('Accès au site', 'tify')
        ]);
    }
}