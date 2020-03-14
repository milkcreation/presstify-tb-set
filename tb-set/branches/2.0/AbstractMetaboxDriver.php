<?php declare(strict_types=1);

namespace tiFy\Plugins\TbSet;

use tiFy\Contracts\Metabox\MetaboxDriver as MetaboxDriverContract;
use tiFy\Metabox\MetaboxDriver;

abstract class AbstractMetaboxDriver extends MetaboxDriver
{
    /**
     * @inheritDoc
     */
    public function parse(): MetaboxDriverContract
    {
        $this->set('viewer.directory', __DIR__ . '/Resources/views/metaboxes/' . $this->alias());

        parent::parse();

        return $this;
    }
}